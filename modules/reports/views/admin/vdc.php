<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> -->
	<style type="text/css">
		#map { height: 500px;width:100%; }

	</style>
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1><?php echo $header; ?></h1>
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

    			<?php
    			// foreach ($coordinate as $row) {
    			// 	print_r( $row );
    			// }
    			?>
    			<div id="map"></div>
    		</div><!-- /.col -->
    	</div>
    	<!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script type="text/javascript">
	var map = L.map('map').setView([27.700588, 85.311894], 12);

	

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

		
		// $.post( "test.php", { name: "John", time: "2pm" } )
		// 	.done(function( data ) {
		// 		alert( "Data Loaded: " + data );
		// 	}); 

		if (feature.properties && feature.properties.popupContent) {
			popupContent += feature.properties.popupContent;
		}

		layer.bindPopup(popupContent);
	}

	var rescue = {
		"type": "FeatureCollection",
		"features": [
		<?php 
		
		foreach ($coordinate as $row) {
			echo('{
				"geometry": {
					"type": "Polygon",
					"coordinates": 
					[  '.$row['boundary_coordinate'].' ]
				},
				"type": "Feature",
				"district": "'.$row['district_name_np'].'",
				"vdc": "'.$row['name_np'].'", 
				"properties": {
					"popupContent": "Data Goes here"
				},
				"id": 56
			},');

		} 

		?>
		
		]
	};


/*
	var rescue = {
		"type": "FeatureCollection",
		"features": [
		{
			"geometry": {
				"type": "Point",
				"coordinates": [ 85.312217, 27.700963 ]
			},
			"type": "Feature",
			"district": "Kathamndu",
			"vdc": "Jitpur Phadi",
			"ward":"5",            
			"properties": {
				"popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
			},
			"id": 54
		},
		{
			"geometry": {
				"type": "Point",
				"coordinates": [  85.312697, 27.701794 ]
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
				"type": "Polygon",
				"coordinates": 
				[ [
				[85.316842,27.697752],[85.329201,27.706415],[85.345509,27.703071],
				[85.322335,27.690304],[85.316842,27.697752]
				] ]
			},
			"type": "Feature",
			"district": "Kathamndu",
			"vdc": "Jitpur Phadi",
			"ward":"5",            
			"properties": {
				"popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
			},
			"id": 56
		},
		{
			"geometry": {
				"type": "Polygon",
				"coordinates":
				[[[85.38117218017572, 27.751152038574332], [85.37956237792974, 27.74692726135254], [85.38117218017572, 27.743944168090934], [85.38217163085938, 27.741334915161076], [85.37869262695307, 27.737979888916016], [85.37731933593761, 27.738725662231445], [85.37259674072266, 27.734996795654354], [85.36998748779303, 27.735120773315543], [85.36402893066406, 27.731143951416016], [85.3621597290039, 27.728286743164176], [85.35781097412115, 27.728286743164176], [85.35134887695318, 27.72629737854004], [85.35259246826172, 27.730648040771598], [85.35147094726562, 27.731517791748047], [85.35308837890636, 27.733009338378963], [85.35445404052746, 27.732511520385742], [85.35482788085949, 27.735120773315543], [85.3575668334961, 27.737606048583984], [85.35334014892578, 27.740713119506836], [85.35334014892578, 27.742204666137752], [85.35706329345709, 27.746553421020565], [85.36116790771484, 27.747920989990234], [85.36502075195312, 27.74941253662115], [85.36700439453136, 27.74866676330572], [85.36837768554699, 27.74618148803711], [85.3738403320313, 27.74891471862793], [85.3734741210938, 27.751152038574332], [85.37595367431646, 27.753389358520508], [85.38117218017572, 27.751152038574332]]]
			},
			"type": "Feature",
			"district": "Kathamndu",
			"vdc": "Jitpur Phadi",
			"ward":"5",            
			"properties": {
				"popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
			},
			"id": 64
		},
		{
			"geometry": {
				"type": "Polygon",
				"coordinates":
				[[[85.30226135253906, 27.81254386901867], [85.30462646484386, 27.81130027770996], [85.3069839477539, 27.81055450439453], [85.30735778808588, 27.806329727172965], [85.31133270263683, 27.803346633911133], [85.3120803833009, 27.796636581420955], [85.3143157958985, 27.789800643920955], [85.31729888916016, 27.78669548034668], [85.31680297851568, 27.781227111816463], [85.31269836425776, 27.77861595153803], [85.31269836425776, 27.776628494262695], [85.31282806396496, 27.771533966064453], [85.31058502197277, 27.767433166503906], [85.31121063232422, 27.763206481933707], [85.30810546875011, 27.759479522705192], [85.30512237548828, 27.757987976074276], [85.3048706054687, 27.772029876709098], [85.29878234863281, 27.772279739379883], [85.29990386962902, 27.773521423339787], [85.29866027832037, 27.777622222900334], [85.29990386962902, 27.783214569091797], [85.29641723632818, 27.784208297729492], [85.29492950439464, 27.790174484252987], [85.29232025146484, 27.792161941528377], [85.28710174560558, 27.801111221313533], [85.29319000244152, 27.80421638488781], [85.29393768310553, 27.80869102478033], [85.29977416992188, 27.811922073364258], [85.30226135253906, 27.81254386901867]]]
			},
			"type": "Feature",
			"district": "Kathamndu",
			"vdc": "Jitpur Phadi",
			"ward":"5",            
			"properties": {
				"popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
			},
			"id": 64
		},

		{
			"geometry": {
				"type": "Polygon",
				"coordinates":
				[[[85.28710174560558, 27.801111221313533], [85.29232025146484, 27.792161941528377], [85.29492950439464, 27.790174484252987], [85.29641723632818, 27.784208297729492], [85.29990386962902, 27.783214569091797], [85.29866027832037, 27.777622222900334], [85.29990386962902, 27.773521423339787], [85.29878234863281, 27.772279739379883], [85.2970428466798, 27.7714080810548], [85.29728698730469, 27.769792556762695], [85.29505157470709, 27.76892280578619], [85.29629516601557, 27.76618957519537], [85.2903289794923, 27.76867485046398], [85.28672790527355, 27.767433166503906], [85.27914428710938, 27.76855087280279], [85.27467346191412, 27.767805099487305], [85.26969909667974, 27.76358032226574], [85.26771545410156, 27.763704299926758], [85.26522827148438, 27.76618957519537], [85.26522827148438, 27.770538330078182], [85.26013183593756, 27.771533966064453], [85.26013183593756, 27.77314949035656], [85.25392150878918, 27.773769378662223], [85.25491333007812, 27.77538490295416], [85.25864410400396, 27.779983520507926], [85.26299285888678, 27.77849197387701], [85.26945495605469, 27.78097724914562], [85.28101348876964, 27.79315757751465], [85.28710174560558, 27.801111221313533]]]
			},
			"type": "Feature",
			"district": "Kathamndu",
			"vdc": "Jitpur Phadi",
			"ward": "5",
			"properties": {
				"popupContent": "<br/><b>Items being Demand</b><br><ul><li>test</li><li>test</li></ul><b>Items Supplied</b><br><ul><li>test</li><li>test</li></ul>"
			},
			"id": 64
		}
		]
	};
	
	*/


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


		// L.marker([27.7076762, 85.3148882]	, {icon:logistic } ).addTo(map)
		// 	.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
		
		// var popup = L.popup();

		// function onMapClick(e) {
		// 	popup
		// 		.setLatLng(e.latlng)
		// 		.setContent("You clicked the map at " + e.latlng.toString())
		// 		.openOn(map);
		// }

		// map.on('click', onMapClick);


		</script