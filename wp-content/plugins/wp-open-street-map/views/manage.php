<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<h2>Manage markers for map "<?= $map->name ?>"</h2>

<form action="<?= admin_url('admin.php?page=wp_openstreetmaps&task=edit'); ?>" method="post" class="form_wp_osm">

	<input type="hidden" name="id" value="<?= $map->id ?>" />

	<label for="">Name: </label> <input type="text" name="name" value="<?= $map->name ? $map->name : 'WP OSM' ?>" /><br />

	<label for="">Width: </label> <input type="text" name="width" id="wp_osm_width" value="<?= $map->width ? $map->width : '100%' ?>" /><br />

	<label for="">Height: </label> <input type="text" name="height" id="wp_osm_height" value="<?= $map->height ? $map->height : '500px' ?>" /><br />

	<input type="text" name="zoom" id="wp_osm_zoom" value="<?= $map->zoom ?>" style="display: none" />

	<input type="text" name="latitude" id="wp_osm_latitude" value="<?= $map->latitude ?>" style="display: none" />

	<input type="text" name="longitude" id="wp_osm_longitude" value="<?= $map->longitude ?>" style="display: none" />

	<input type="submit" value="Save map settings" /> <a href="<?= admin_url('admin.php?page=wp_openstreetmaps'); ?>">Back to maps list</a>

</form>

<form action="" method="post" class="form_wp_osm">

	<strong>Add a new marker</strong>

	<input type="hidden" name="id" value="<?= $marker->id ?>" />
	<input type="hidden" name="id_map" value="<?= $map->id ?>" />
	<input type="hidden" name="action" , value="ecc_save_icon" />
	<?php 
	wp_nonce_field( "ecc_save_icon" );
	$icons = array('marker', 'airport', 'bus', 'market', 'restaurant', 'parking', 'hotel', 'gazstation', 'highway', 'warning'); ?>

	<div class="name_line">
		<label for="">Icon:</label>
		<?php 
		foreach($icons as $icon)
		{ 
			$icon_url = plugins_url( 'images/markers/'.$icon.'.png', dirname(__FILE__) );
			echo '<input type="radio" name="wp_osm_icon" id="wp_osm_icon_'.$icon.'" value="'.$icon_url.'" /><label for="wp_osm_icon_'.$icon.'" class="small_label"><img src="'.$icon_url.'" /></label>';
		}
		?>
		<strong>Need more icons or custom icons? Look at <a href="https://www.info-d-74.com/produit/wp-openstreetmap-plugin-wordpress/" target="_blank">WP OpenStreetMap Pro</a></strong>
	</div>

	<label for="">Name:</label> <input type="text" name="name" id="wp_osm_name" value="<?= $marker->name ?>" /><br />

	<label for="">Description:</label> <textarea name="description" id="wp_osm_description"><?= $marker->description ?></textarea><br />
	<p><strong>Need advanced editor? Look at <a href="https://www.info-d-74.com/produit/wp-openstreetmap-plugin-wordpress/" target="_blank">WP OpenStreetMap Pro</a></strong></p>

	<p><strong>Click on the map where you want to put the marker</strong></p>

</form>

<?php if(isset($_GET['saved'])) : ?>
	<h3>Marker saved!</h3>
<?php endif; ?>
<h3>If you change zoom or position don't forget to save map settings up!</h3>
<div id="wp_osm_container">
	<div id="wp_osm" style="width: <?= $map->width; ?>; height: <?= $map->height; ?>; float: left;">
</div>
</div>
<div id="wp_osm_markers">
	<h2>Markers</h2>
	<form class="form_wp_osm" action="" method="post">
		<div class="markers">
		<?php

		if(sizeof($markers) > 0)
		{
			foreach( $markers as $i => $marker )
			{
				echo '<div class="marker">';
				echo '<img src="'.$marker->icon.'" /> '.$marker->name.'			
					<a href="#" rel="'.$marker->id.'" class="remove" title="Remove marker"><img src="'.plugins_url( 'images/remove.png', dirname(__FILE__) ).'" /></a>
					<div class="marker_edit">
						<input type="hidden" name="icon_coords[]" value="'.$marker->longitude.','.$marker->latitude.'" />'; 
						foreach($icons as $icon)
						{ 
							$time = time();
							$icon_url = plugins_url( 'images/markers/'.$icon.'.png', dirname(__FILE__) );
							echo '<input type="radio" name="icon_url['.$i.']" id="wp_osm_icon_'.$icon.'_'.$time.'" value="'.$icon_url.'" '.($icon_url == $marker->icon ? 'checked' : '').' /><label class="small_label" for="wp_osm_icon_'.$icon.'_'.$time.'"><img src="'.$icon_url.'" /></label>';
						}
						echo '<br /><label>Name: </label><input type="text" name="icon_name[]" value="'.$marker->name.'" /><br />
						<label>Description: </label><textarea name="icon_description[]">'.$marker->description.'</textarea><br />
						<input type="submit" value="Save marker" />
					</div>
				</div>';

			}
		}

		?>
		</div>
		<input type="submit" value="Saves all markers" /> <a href="<?= admin_url('admin.php?page=wp_openstreetmaps'); ?>">Back to maps</a>
	</form>
</div>

<script src="<?= plugins_url('js/OpenLayers/OpenLayers.js', dirname(__FILE__)) ?>"></script>
<script>

	window.onload = function(){

		var marker_click = false;

		var map = new OpenLayers.Map({
	      div: jQuery('#wp_osm').get(0),
	      projection: new OpenLayers.Projection('EPSG:900913'),
	      'displayProjection': new OpenLayers.Projection('EPSG:4326')
	    });
	    map.addLayer(new OpenLayers.Layer.OSM("New Layer"));

	    var lonLat = new OpenLayers.LonLat( <?= $map->longitude; ?>, <?= $map->latitude; ?> );
	          
	    zoom=<?= $map->zoom ?>;

	    var layerStyle = OpenLayers.Util.extend({}, OpenLayers.Feature.Vector.style['default']);

    	var pointLayer = new OpenLayers.Layer.Vector("Layer Name", {style: layerStyle});

    	map.addLayer(pointLayer);

    	//marker styles
	    var markerStyle = OpenLayers.Util.extend({}, layerStyle);	    
	    markerStyle.pointRadius = 18;
	    markerStyle.fillOpacity = 1;

	    map.setCenter (lonLat, zoom);

	    //on ajoute les markers déjà enregistrés
	    jQuery('#wp_osm_markers .markers .marker ').each(function(i){

	    	//on ajoute le marker avec l'icone
	    	var coords = jQuery(this).find('input[name="icon_coords[]"]').val().split(',');
			var myPoint = new OpenLayers.Geometry.Point(coords[0], coords[1]);

			var icon_url = jQuery(this).find('input[name="icon_url['+i+']"]:checked').val();
			var currentmarkerStyle = OpenLayers.Util.extend({}, markerStyle);	  
		    currentmarkerStyle.externalGraphic = icon_url;
			var myPointFeature = new OpenLayers.Feature.Vector(myPoint, null, currentmarkerStyle);

			myPointFeature.attributes = {
				name: jQuery(this).find('input[name="icon_name[]"]').val(),
				description: jQuery(this).find('textarea[name="icon_description[]"]').val(),
				wikiPage: "http://www.windsorpubliclibrary.com/?page_id=45"
			};
			pointLayer.addFeatures( [ myPointFeature ] );

	    });

	    OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {               
			 defaultHandlerOptions: {
			  'single': true,
			  'double': false,
			  'pixelTolerance': 0,
			  'stopSingle': false,
			  'stopDouble': false
			 },

			 initialize: function(options) {
			  this.handlerOptions = OpenLayers.Util.extend(
			   {}, this.defaultHandlerOptions
			  );
			  OpenLayers.Control.prototype.initialize.apply(
			   this, arguments
			  );
			  this.handler = new OpenLayers.Handler.Click(
			   this, {
			    'click': this.trigger
			   }, this.handlerOptions
			  );
			 },

			 trigger: function(e) {
			 	//si on a clické sur la map
			 	if(!marker_click)
			 	{
			 		//on ajoute le marker avec l'icone
					var lonlat = map.getLonLatFromPixel(e.xy);
					coords = new OpenLayers.LonLat(lonlat.lon,lonlat.lat);
					var myPoint = new OpenLayers.Geometry.Point(coords.lon, coords.lat);

					var icon_url = jQuery('input[name="wp_osm_icon"]:checked').val();
					var currentmarkerStyle = OpenLayers.Util.extend({}, markerStyle);	  
		    		currentmarkerStyle.externalGraphic = icon_url;
				    var myPointFeature = new OpenLayers.Feature.Vector(myPoint, null, currentmarkerStyle);

				    myPointFeature.attributes = {
				        name: jQuery('#wp_osm_name').val(),
				        description: jQuery('#wp_osm_description').val(),
				        wikiPage: "http://www.windsorpubliclibrary.com/?page_id=45"
				    };
				    pointLayer.addFeatures( [ myPointFeature ] );

				    //on ajoute le marker à la liste
				    var icons_list = [];
					<?php 
					foreach($icons as $icon)
					{ 
						$time = time();
						$icon_url = plugins_url( 'images/markers/'.$icon.'.png', dirname(__FILE__) );
						echo 'icons_list.push("'.$icon_url.'");';
					}
					?>
					var nb = jQuery('#wp_osm_markers .markers .marker').length;
					var form = '<div class="marker_edit">';
					form += '<input type="hidden" name="icon_coords[]" value="'+coords.lon+','+coords.lat+'" />';
					form += '<label>Icon:</label>';
					for(var i in icons_list)
						form += '<input type="radio" name="icon_url['+nb+']" id="wp_osm_icon_'+i+'_'+nb+'" value="'+icons_list[i]+'" '+(icon_url == icons_list[i] ? 'checked' : '')+' /><label class="small_label" for="wp_osm_icon_'+i+'_'+nb+'"><img src="'+icons_list[i]+'" /></label>';
					form += '<br /><label>Name: </label><input type="text" name="icon_name[]" value="'+jQuery('#wp_osm_name').val()+'" /><br />';
					form += '<label>Description: </label><textarea name="icon_description[]">'+jQuery('#wp_osm_description').val()+'</textarea><br />';
					form += '<input type=\"submit\" value=\"Save marker\" /></div>';
				    jQuery('#wp_osm_markers .markers').append('<div class="marker"><img src="'+icon_url+'" /> '+jQuery('#wp_osm_name').val()+'<a href="#" class="remove"><img src="<?= plugins_url( 'images/remove.png', dirname(__FILE__) ) ?>" /></a>'+form+'</div>');

				    //édition d'un marker
				    jQuery('.marker:last-child > img').click(function(){

			        	jQuery(this).parent().find('.marker_edit').toggle();

			        });

					//suppression d'un marker
			        jQuery('.marker:last-child .remove').click(function(){

			        	jQuery(this).parent().remove();
			        	return false;

			        });
				}

				marker_click = false;

			 }

		});

		selectControl = new OpenLayers.Control.SelectFeature( pointLayer );
		map.addControl(selectControl);
		selectControl.activate();

		pointLayer.events.on({
		    'featureselected': onFeatureSelect,
		    'featureunselected': onFeatureUnselect
		});

		// from http://openlayers.org/dev/examples/ and http://ushahidi.com/
		function onFeatureSelect(clickInfo) {
			marker_click = true;
		    clickedFeature = clickInfo.feature;
		    popup = new OpenLayers.Popup.FramedCloud(
		        "featurePopup",
		        clickedFeature.geometry.getBounds().getCenterLonLat(),
		        new OpenLayers.Size(120,250),
		        clickedFeature.attributes.description,
		        null,
		        true,
		        onPopupClose
		    );
		    clickedFeature.popup = popup;
		    popup.feature = clickedFeature;
		    map.addPopup(popup);
		}
		function onFeatureUnselect(clickInfo) {
		    feature = clickInfo.feature;
		    if (feature.popup) {
		        popup.feature = null;
		        map.removePopup(feature.popup);
		        feature.popup.destroy();
		        feature.popup = null;
		    }
		}
		function hoverFeatureCallback(clickInfo) {

		}
		function onPopupClose(closeInfo) {
		    selectControl.unselect(this.feature);
		}

		var click = new OpenLayers.Control.Click();
        map.addControl(click);
        click.activate();

        //édition d'un marker
        jQuery('.marker > img').click(function(){

        	jQuery(this).parent().find('.marker_edit').toggle();

        });

        //suppression d'un marker
        jQuery('.marker .remove').click(function(){

        	jQuery(this).parent().remove();
        	return false;

        });

        //Mette à jour les coordonnées et le zoom
	    setInterval(function(){ 

	    	var position = map.getCenter();
	    	jQuery('#wp_osm_latitude').val(position.lat);
	    	jQuery('#wp_osm_longitude').val(position.lon);

	    	var zoom = map.getZoom();
	    	jQuery('#wp_osm_zoom').val(zoom);

	    }, 1000);

	    jQuery('#wp_osm_width').change(function(){

	    	jQuery('#wp_osm').width(jQuery(this).val());

	    	//on met à jour la taille de la carte
	    	map.updateSize();

	    });

	    jQuery('#wp_osm_height').change(function(){

	    	jQuery('#wp_osm').height(jQuery(this).val());

	    	//on met à jour la taille de la carte
	    	map.updateSize();

	    });

	};

</script>
