<html>
<head>
	<title>Relief System</title>
	
	<style type="text/css">
		#map { height: 100%; }
	</style>

	 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	  

	
</head>
<body>
	<div style="height:90%">
		<div id="map"></div>
	</div>
	
</body>

<script type="text/javascript">
 
 // rughimire@gmail.com

// KTM 27.7076762, 85.3148882

var map = L.map('map').setView([27.700588, 85.311894], 16);
		var baseballIcon = L.icon({
			iconUrl: 'rescue.png',
			iconSize: [32, 37],
			iconAnchor: [16, 37],
			popupAnchor: [0, -28]
		});


		L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
			maxZoom: 21,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'examples.map-i875mjb7'
		}).addTo(map);


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



var rescue = {
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
            "id": 51
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
            "id": 51
        },
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.322697, 27.711794
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": 51
        },
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.313697, 27.704794
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": 51
        },
         {
            "geometry": {
                "type": "Point",
                "coordinates": [
                  85.313799, 27.704898
                ]
            },
            "type": "Feature",
            "district": "Kathamndu",
            "vdc": "Jitpur Phadi",
            "ward":"5",            
            "properties": {
                "popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
            },
            "id": 51
        }
         
    ]
};



	L.geoJson([rescue], {

		style: function (feature) {
			return feature.properties && feature.properties.style;
		},

		onEachFeature: onEachFeature,

		pointToLayer: function (feature, latlng) {
			return L.circleMarker(latlng, {
				radius: 8,
				fillColor: "#ff7800",
				color: "#000",
				weight: 1,
				opacity: 1,
				fillOpacity: 0.8
			});
		}
	}).addTo(map);


		


	</script>

</html>