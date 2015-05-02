<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> -->
<style type="text/css">
#map { height: 500px;width:100%; }
.mycluster {
	width: 40px;
	height: 40px;
	background-color: greenyellow;
	text-align: center;
	font-size: 24px;
}
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
$(function(){
	//create base layer for map
	var baseLayer = L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
		maxZoom: 21,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'examples.map-i875mjb7'
	});

	//initialize map
	var map = L.map('map',{
		//layers: [baseLayer, heatmapLayer],
		layers: [baseLayer],
		 center: new L.LatLng(27.700588, 85.311894),
		 zoom: 9,
	});
	
	//create map clusters  within radius of 120
	var markers = L.markerClusterGroup({ 
		maxClusterRadius: 120,
			iconCreateFunction: function (cluster) {
				var markers = cluster.getAllChildMarkers();
				var n = 0;
				for (var i = 0; i < markers.length; i++) {
					n += markers[i].number;
				}
				return L.divIcon({ html: n, className: 'mycluster', iconSize: L.point(40, 40) });
			},
			//Disable all of the defaults:
			spiderfyOnMaxZoom: false, showCoverageOnHover: false, zoomToBoundsOnClick: false
	});

	//add marker group to the map
	map.addLayer(markers);

	// lat,long and other details of marker 
	var addressPoints = [
		{lat : 27.707998, lng: 85.312999, popupcontent: {district : "kathmandu", vdc: "vdc1",ward:"ward1"}, deathcount : 2},
		{lat :28.011463,lng: 84.627042,popupcontent:  {district : "kathmand1", vdc: "kathmand1vdc1",ward:"kathmand2ward1"},deathcount :4},
		{lat :27.7667,lng: 85.7000,popupcontent:  {district : "kathmand2", vdc: "kathmand2vdc1",ward:"kathmand2ward1"},deathcount :6},
		{lat :27.905695,lng: 85.118809,popupcontent:  {district : "gorkha", vdc: "gorkhavdc1",ward:"gorkhaward1"},deathcount :8},
		{lat :27.0000,lng: 85.000,popupcontent:  {district : "sindupalchiw", vdc: "sindupalchiwvdc1",ward:"sindupalchiwward1"},deathcount :10},
		{lat :27.00200,lng: 85.00200,popupcontent:  {district : "nuwakot", vdc: "nuwakotvdc1",ward:"nuwakotward1"},deathcount :12}
	]
	
	//add marker to the map layer and bind popup
	for (var i = 0; i < addressPoints.length; i++) {
		var a = addressPoints[i];
		var details = a.popupcontent;
		var marker = L.marker(L.latLng(a.lat, a.lng), { title: a.deathcount });
		var popupContent ="";
	    popupContent += "Distict: <b>"+ details.district+"</b><br>";
	    popupContent += "VDC: <b>"+details.vdc+"</b><br>";
	    popupContent += "Ward No: <b>"+details.ward+"</b><br>";
	    marker.popupContent =  popupContent;
		marker.number = a.deathcount;

		marker.bindPopup(popupContent);
		markers.addLayer(marker);
	}

	//function to remove polygon 
	var shownLayer, polygon;
	var removePolygon = function() {
		if (shownLayer) {
			shownLayer.setOpacity(1);
			shownLayer = null;
		}
		if (polygon) {
			map.removeLayer(polygon);
			polygon = null;
		}
	};

	//mouseover event on markercluster (show/hide the polygon)
	markers.on('clustermouseover', function (a) {
		removePolygon();

		a.layer.setOpacity(0.2);
		shownLayer = a.layer;
		polygon = L.polygon(a.layer.getConvexHull());
		map.addLayer(polygon);
	});
	markers.on('clustermouseout', removePolygon);
	map.on('zoomend', removePolygon);

});
	</script>


