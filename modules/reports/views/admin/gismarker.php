<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> -->
<style type="text/css">
	#map { height: 500px;width:100%; }
</style>
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>GIS</h1>
		<div class="breadcrumb" style="top:7px">
            <!-- <span class="label label-status-active">Active Records</span>
            <span class="label label-status-inactive">Inactive Records</span> -->
        </div>
	</section>
	<section class="content">

		<!-- row -->
		<div class="row">
			<div class="col-xs-12 connectedSortable">
				<?php echo displayStatus(); ?>
					<div id="map"></div>
				
			</div><!-- /.col -->
		</div>
		<!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->



<script type="text/javascript">
 // rughimire@gmail.com
$(function(){
	var reliefRequired = {
	    "type": "FeatureCollection",
	    "features": [
	        {
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                     85.312217, 27.700963
	                ]
	            },
	            "type": "Feature",
	            "district": "Kathamndu",
	            "vdc": "Jitpur Phadi",
	            "ward":"5",            
	            "properties": {
	                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
	            },
	            "id": "relief_required1"
	        },
	         {
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                  85.312697, 27.701794
	                ]
	            },
	            "type": "Feature",
	            "district": "Kathamndu",
	            "vdc": "Jitpur Phadi",
	            "ward":"5",            
	            "properties": {
	                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
	            },
	            "id": "relief_required2"
	        }
	         ]
	};
var reliefDone = {
	"type": "FeatureCollection",
	"features": [
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.375697, 27.766794
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
            	"show_on_map": true,
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": "relief-done1"
        },
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.413697, 27.804794
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
            	"show_on_map": true,
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": "relief-done2"
        },
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.614999, 27.905998
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
            	"show_on_map": true,
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": "relief-done3"
        }
	         
    ]
	};

	var organizationInvolved= {
	    "type": "FeatureCollection",
	    "features": [
	        {
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                     84.627042, 28.011463
	                ]
	            },
	            "type": "Feature",
	            "district": "Kathamndu",
	            "vdc": "Jitpur Phadi",
	            "ward":"5",            
	            "properties": {
	                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
	            },
	            "id": "organization-involved1"
	        },
	         {
	            "geometry": {
	                "type": "Point",
	                "coordinates": [
	                  85.7000, 27.7667
	                ]
	            },
	            "type": "Feature",
	            "district": "Kathamndu",
	            "vdc": "Jitpur Phadi",
	            "ward":"5",            
	            "properties": {
	                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
	            },
	            "id": "organization-involved2"
	        }
	         ]
	};

	var baseLayer = L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
		maxZoom: 21,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'examples.map-i875mjb7'
	});

	// var cfg = {
	//   // radius should be small ONLY if scaleRadius is true (or small radius is intended)
	//   // if scaleRadius is false it will be the constant radius used in pixels
	//   "radius": 0.03,
	//   "maxOpacity": .3, 
	//   // scales the radius based on map zoom
	//   "scaleRadius": true, 
	//   // if set to false the heatmap uses the global maximum for colorization
	//   // if activated: uses the data maximum within the current map boundaries 
	//   //   (there will always be a red spot with useLocalExtremas true)
	//   "useLocalExtrema": true,
	//   // which field name in your data represents the latitude - default "lat"
	//   latField: 'lat',
	//   // which field name in your data represents the longitude - default "lng"
	//   lngField: 'lng',
	//   // which field name in your data represents the data value - default "value"
	//   valueField: 'count'
	// };

	// var testData = {
	//   max: 8,
	//   data: [
	//   		{lat: 27.707998, lng:85.312999, count: 3},
 //  			{lat: 28.011463, lng: 84.627042, count: 3},
 //  			{lat: 27.7667, lng: 85.7000, count: 3},
 //  			{lat: 27.905695, lng: 85.118809, count: 2}
 //  		]
	// };

	//var heatmapLayer = new HeatmapOverlay(cfg);
	
	var map = L.map('map',{
		//layers: [baseLayer, heatmapLayer],
		layers: [baseLayer],
		 center: new L.LatLng(27.700588, 85.311894),
		 zoom: 9,
	});
	
	//heatmapLayer.setData(testData);		
	
	function onEachFeature(feature, layer) {
		var popupContent ="";
		popupContent += "Distict: <b>"+feature.district+"</b><br>";
		popupContent += "VDC: <b>"+feature.vdc+"</b><br>";
		popupContent += "Ward No: <b>"+feature.ward+"</b><br>"; 

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}

	L.geoJson([reliefRequired], {

		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {
			return L.circleMarker(latlng, {
				radius: 10,
				fillColor: "red",
				color: "#000",
				weight: 1,
				opacity: .1,
				fillOpacity: 0.8
			});
		}
	}).addTo(map);

	L.geoJson([reliefDone], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {

			var test = L.circleMarker(latlng, {
				radius: 10,
				fillColor: "#ff7800",
				color: "#000",
				weight: 1,
				opacity: .1,
				fillOpacity: 0.8
			});

			return test;
		},
		filter: function(feature, layer) {
	        return feature.properties.show_on_map;
	    }
	}).addTo(map);


	var organizationIcon = L.icon({
	    iconUrl: '<?php echo site_url("assets/images/ac_groups.png");?>',
	    //shadowUrl: '<?php echo site_url("assets/images/ac_groups.png");?>',

	    iconSize:     [30, 30], // size of the icon
	    //shadowSize:   [50, 64], // size of the shadow
	    iconAnchor:   [0, 0], // point of the icon which will correspond to marker's location
	    shadowAnchor: [4, 62],  // the same for the shadow
	    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
	});

	L.geoJson([organizationInvolved], {
		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {

			var test = L.circleMarker(latlng, {
				radius: 10,
				fillColor: "green",
				color: "#000",
				weight: 1,
				opacity: .1,
				fillOpacity: 0.8
			});

			return test;

		}
	}).addTo(map);


// 	var markers = L.markerClusterGroup({ chunkedLoading: true });
		

		
// 	var addressPoints = [
// 	[27.707998, 85.312999, "571"],
// 	[28.011463, 84.627042, "486"],
// 	[27.7667, 85.7000, "807"],
// 	[27.905695, 85.118809, "899"]
// ]
	
// 	for (var i = 0; i < addressPoints.length; i++) {
// 		var a = addressPoints[i];
// 		var title = a[2];
// 		var marker = L.marker(L.latLng(a[0], a[1]), { title: title });
// 		marker.bindPopup(title);
// 		markers.addLayer(marker);
// 	}

// 	map.addLayer(markers);
		
})
	</script>


