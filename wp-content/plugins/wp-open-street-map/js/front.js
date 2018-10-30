jQuery(document).ready(function(){

	jQuery('.wp_osm').each(function(){

		var map = new OpenLayers.Map({
		      div: jQuery(this).get(0),
		      projection: new OpenLayers.Projection('EPSG:900913'),
		      'displayProjection': new OpenLayers.Projection('EPSG:4326')
		});
		map.addLayer(new OpenLayers.Layer.OSM("New Layer"));

		var lonLat = new OpenLayers.LonLat( jQuery(this).attr('data-lon'), jQuery(this).attr('data-lat') );
		          
	    zoom = jQuery(this).attr('data-zoom');

	    var layerStyle = OpenLayers.Util.extend({}, OpenLayers.Feature.Vector.style['default']);

    	var pointLayer = new OpenLayers.Layer.Vector("Layer Name", {style: layerStyle});

    	map.addLayer(pointLayer);

    	//marker styles
	    var markerStyle = OpenLayers.Util.extend({}, layerStyle);	    
	    markerStyle.pointRadius = 18;
	    markerStyle.fillOpacity = 1;

	    map.setCenter (lonLat, zoom);

	    jQuery(this).find('.marker').each(function(){

	    	//on ajoute le marker avec l'icone
	    	var lon = jQuery(this).attr('data-lon');
	    	var lat = jQuery(this).attr('data-lat');
			var myPoint = new OpenLayers.Geometry.Point(lon, lat);

			var icon_url = jQuery(this).attr('data-icon');
			var currentmarkerStyle = OpenLayers.Util.extend({}, markerStyle);	  
		    currentmarkerStyle.externalGraphic = icon_url;
			var myPointFeature = new OpenLayers.Feature.Vector(myPoint, null, currentmarkerStyle);

			myPointFeature.attributes = {
				name: jQuery(this).attr('data-name'),
				description: jQuery(this).attr('data-description'),
				wikiPage: "http://www.windsorpubliclibrary.com/?page_id=45"
			};
			pointLayer.addFeatures( [ myPointFeature ] );

	    });

	    selectControl = new OpenLayers.Control.SelectFeature( pointLayer );
		map.addControl(selectControl);
		selectControl.activate();

	    pointLayer.events.on({
		    'featureselected': onFeatureSelect,
		    'featureunselected': onFeatureUnselect
		});

		function onFeatureSelect(clickInfo) {
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

	});

});