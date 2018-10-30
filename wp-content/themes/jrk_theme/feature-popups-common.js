// Projections
// -----------
var sphericalMercatorProj = new OpenLayers.Projection('EPSG:900913');
var geographicProj = new OpenLayers.Projection('EPSG:4326');

//OpenLayers.Projection.addTransform(sphericalMercatorProj, geographicProj, OpenLayers.Projection.projectInverse);

// Vector layers
// -------------
// Sprinters: layer with different attributes.
var sprintersLayer = new OpenLayers.Layer.Vector('Ubicaciones individuales', {		
	projection: geographicProj,
	styleMap: new OpenLayers.StyleMap({
        externalGraphic: 'http://dev.openlayers.org/examples/img/mobile-loc.png',
        graphicOpacity: 1.0,
        graphicWith: 16,
        graphicHeight: 26,
        graphicYOffset: -26
    }),  
    preFeatureInsert: function(feature){
        feature.geometry.transform(geographicProj, sphericalMercatorProj);
	}	
});
sprintersLayer.addFeatures(getSprintersFeatures());

// Tasmania roads: layer of lines to show its length.
var tasmaniaRoadsLayer = new OpenLayers.Layer.Vector('Tasmania roads (function templates)', {
    projection: geographicProj,
    strategies: [new OpenLayers.Strategy.Fixed()],
    protocol: new OpenLayers.Protocol.HTTP({
        url: 'tasmania/TasmaniaRoads.xml',
        format: new OpenLayers.Format.GML.v2()
    })
});

// Sundials: layer uses Cluster strategy.
var sundialsLayer = new OpenLayers.Layer.Vector('Puntos cercanos (clustered)', {
    projection: geographicProj,       
    strategies: [		
        new OpenLayers.Strategy.Cluster()
    ],
    styleMap: new OpenLayers.StyleMap({
        'default': new OpenLayers.Style({
        externalGraphic: 'http://dev.openlayers.org/examples/img/mobile-loc.png',
        graphicOpacity: 1.0,
        graphicWith: 16,
        graphicHeight: 26,
        graphicYOffset: -26,
			pointRadius: '${radius}',
                fillOpacity: 0.6,
                fillColor: '#ffcc66',
                strokeColor: '#cc6633'
            }, {
                context: {
                    radius: function(feature) {
                        return Math.min(feature.attributes.count, 10) * 1.5 + 2;
                    }
                }
        }),
        'select': {fillColor: '#8aeeef'}
    }),  
	//you look at a clustered feature you see this under the values attribute:
	//values_: Object
  		//features: Array[19]
  		//geometry: ol.geom.Point
  	//
    preFeatureInsert: function(feature){
	//	if ((!feature) || (!feature.get('features')) { 
//			//Es un atributo normal
  //      	feature.geometry.transform(geographicProj, sphericalMercatorProj);
  	//	} else {
		    // is a cluster, so loop through all the underlying features
    		var features = feature; //feature.get('features');
    		for(var i = 0; i < features.length; i++) {
      			// here you'll have access to your normal attributes:
      			features[i].geometry.transform(geographicProj, sphericalMercatorProj);
    		}     
//		}
	}
});
//sundialsLayer.addFeatures(getSprintersFeatures());

// POIs: layer uses BBOX strategy and simulated "fid".
var TextAndFid = OpenLayers.Class(OpenLayers.Format.Text, {
    read: function(text) {
        var features = OpenLayers.Format.Text.prototype.read.call(this, text);
        for (var i = 0, len = features.length; i < len; i++) {
            var feature = features[i];
            feature.fid = feature.attributes.title.replace(/ /g, '_');
        }
        return features;
    }
});

var poisLayer = new OpenLayers.Layer.Vector('POIs (using BBOX)', {
    projection: geographicProj,
    strategies: [new OpenLayers.Strategy.BBOX({resFactor: 1.1})],
    protocol: new OpenLayers.Protocol.HTTP({
        url: 'textfile.txt',
        format: new TextAndFid()
    })
});


// Create map
// ----------
var map = new OpenLayers.Map({
    div: 'map',
    theme: null,
    projection: sphericalMercatorProj,
    displayProjection: geographicProj,
    units: 'm',
    numZoomLevels: 18,
    maxResolution: 156543.0339,
    maxExtent: new OpenLayers.Bounds(
        -20037508.34, -20037508.34, 20037508.34, 20037508.34
    ),
    controls: [
        new OpenLayers.Control.Attribution(),
        new OpenLayers.Control.Navigation(),
        new OpenLayers.Control.PanZoom(),
        new OpenLayers.Control.LayerSwitcher()
    ],
    layers: [
        new OpenLayers.Layer.OSM('OpenStreetMap', null),
        sprintersLayer //,
//		sundialsLayer
    ],
    center: new OpenLayers.LonLat(-75.5218, 10.4342).transform( geographicProj, sphericalMercatorProj ),
    zoom: 13
});
//sundialsLayer.addFeatures(getSprintersFeatures());

// Sprinters features
// ------------------
function getSprintersFeatures() {
	//Tomo la informacion desde la pagina de los mapas
	var desdephp = document.getElementById("desdePHP").innerHTML;
	var features = JSON.parse(desdephp);
	//Esto: para probar la conversion. document.getElementById("desdeJS").innerHTML = features.type;
    var reader = new OpenLayers.Format.GeoJSON();	
    return reader.read(features);
}
