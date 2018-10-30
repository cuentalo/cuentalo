<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<h2>Add/edit a WP Open Street Map</h2>

<form action="" method="post" class="form_wp_osm">

	<input type="hidden" name="id" value="<?= $map->id ?>" />

	<label for="">Name: </label> <input type="text" name="name" value="<?= $map->name ? $map->name : 'WP OSM' ?>" /><br />

	<label for="">Width: </label> <input type="text" name="width" id="wp_osm_width" value="<?= $map->width ? $map->width : '100%' ?>" /><br />

	<label for="">Height: </label> <input type="text" name="height" id="wp_osm_height" value="<?= $map->height ? $map->height : '500px' ?>" /><br />

	<input type="text" name="zoom" id="wp_osm_zoom" value="<?= $map->zoom ?>" style="display: none" />

	<input type="text" name="latitude" id="wp_osm_latitude" value="<?= $map->latitude ?>" style="display: none" />

	<input type="text" name="longitude" id="wp_osm_longitude" value="<?= $map->longitude ?>" style="display: none" />

	<input type="submit" value="Save map" /> <a href="<?= admin_url('admin.php?page=wp_openstreetmaps'); ?>">Back to maps list</a>

</form>

<div id="wp_osm" style="width: 100%; height: 500px;">
</div>

<script src="//openlayers.org/api/OpenLayers.js"></script>
<script>

	window.onload = function(){

		var map = new OpenLayers.Map({
	      div: jQuery('#wp_osm').get(0),
	      projection: new OpenLayers.Projection('EPSG:900913'),
	      'displayProjection': new OpenLayers.Projection('EPSG:4326')
	    });
	    map.addLayer(new OpenLayers.Layer.OSM("New Layer"));

	    var lonLat = new OpenLayers.LonLat( 5.6805232, 45.1842206 )
	          .transform(
	            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
	            map.getProjectionObject() // to Spherical Mercator Projection
	          );
	          
	    zoom=1;

	    var layerStyle = OpenLayers.Util.extend({}, OpenLayers.Feature.Vector.style['default']);

    	var pointLayer = new OpenLayers.Layer.Vector("Layer Name", {style: layerStyle});

    	map.addLayer(pointLayer);

    	//marker styles
	    var markerStyle = OpenLayers.Util.extend({}, layerStyle);	    
	    markerStyle.pointRadius = 18;
	    markerStyle.fillOpacity = 1;

	    map.setCenter (lonLat, zoom);

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