<?php
require_once 'configuration.php';

/**
 * uhc locations information
 */
//$sql = "SELECT * FROM organisationunit WHERE type LIKE 'Upazila Health Complex' AND coordinates NOT LIKE 'null' ORDER BY organisationunit.type";
//$result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
//$uhc_location_count = mysql_num_rows($result);
//$usc_location_result = $result;

//echo "<pre>";
//print_r(mysql_fetch_assoc($usc_location_result));

//while ($location = mysql_fetch_assoc($result)) {
//    $uhc_location[name] = $location[name];
//    $uhc_location[latitude] = $location[latitude];
//    $uhc_location[longitude] = $location[longitude];
//}

/**
 * uhc Sadar locations information
 */
$sql = "SELECT * FROM organisationunit WHERE type LIKE 'Upazila Health Complex (Sadar)' AND coordinates NOT LIKE 'null' ORDER BY organisationunit.type";
$result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
$uhc_location_count = mysql_num_rows($result);

while ($location = mysql_fetch_assoc($result)) {
    $uhc_sadar_location[name] = $location[name];
    $uhc_sadar_location[latitude] = $location[latitude];
    $uhc_sadar_location[longitude] = $location[longitude];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Point Layers</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Leafletjs CDN css link -->
        <!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" /> -->
        <link rel="stylesheet" href="library/leafletjs/leaflet.css" />
        <!-- Font Awesome local -->
        <link rel="stylesheet" href="library/font-awesome/css/font-awesome.min.css">
        <!-- <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="library/leaflet.awesome-markers/leaflet.awesome-markers.css">


        <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.ie.css" />
        <![endif]-->
    </head>
    <body>
        <div id="map" style="width: 600px; height: 700px"></div>

        <!-- Leafletjs CDN js link -->
        <!-- <script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script> -->
        <script src="library/leafletjs/leaflet.js"></script>
        <script src="library/leaflet.awesome-markers/leaflet.awesome-markers.js"></script>

        <script>

            // create map marker
            var redHospitalMarker = L.AwesomeMarkers.icon({icon: 'hospital', color: 'red'});
            var greenHospitalMarker = L.AwesomeMarkers.icon({icon: 'hospital', color: 'green'});
            var blueHospitalMarker = L.AwesomeMarkers.icon({icon: 'hospital', color: 'blue'});
            var redMarker = L.AwesomeMarkers.icon({icon: 'spinner', color: 'red', spin: true});
            var homeMarker = L.AwesomeMarkers.icon({icon: 'home', color: 'darkblue'});
            var shoppingCartMarker = L.AwesomeMarkers.icon({icon: 'shopping-cart', color: 'green'});
            var rocketMarker = L.AwesomeMarkers.icon({icon: 'rocket', color: 'cadetblue'});

            // create layer groups
            var khilgaonRegion = new L.layerGroup();
            var all_UHC = new L.layerGroup();
            var all_UHC_sadar = new L.layerGroup();
            var all_USC = new L.layerGroup();
            
            var twenty_bed_hospital = new L.layerGroup();

            <?php
            /**
             * 20 bed hospital
             */
            $type = "20 Beded Hospital";
            $sql = "SELECT * FROM organisationunit WHERE type LIKE '$type' AND coordinates NOT LIKE 'null' ORDER BY type";
            $result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
            $twenty_bed_hospital_location_marker = "blueHospitalMarker";
            
            while ($location = mysql_fetch_assoc($result)) {
            	$lat= (double) $location[latitude];
            	$long= (double) $location[longitude];
                echo "L.marker([$lat, $long], {icon: $twenty_bed_hospital_location_marker}).addTo(twenty_bed_hospital).bindPopup(\"$location[name]\"); ";            	
            }
            /**
             * 
             * upazilla locations
             * 
             * */
            $sql = "SELECT * FROM organisationunit WHERE type LIKE 'Upazila Health Complex' AND coordinates NOT LIKE 'null' ORDER BY organisationunit.type";
            $result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
            $uhc_location_marker = "redHospitalMarker";
            
            while ($location = mysql_fetch_assoc($result)) {
            	$lat= (double) $location[latitude];
            	$long= (double) $location[longitude];
                echo "L.marker([$lat, $long], {icon: $uhc_location_marker}).addTo(all_UHC).bindPopup(\"$location[name]\"); ";            	
            }

            /**
             * 
             * upazilla sadar locations
             * 
             * */
            $sql = "SELECT * FROM organisationunit WHERE type LIKE 'Upazila Health Complex (Sadar)' AND coordinates NOT LIKE 'null' ORDER BY type";
            $result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
            $uhc_sadar_location_marker = "greenHospitalMarker";
            
            while ($location = mysql_fetch_assoc($result)) {
            	$lat= (double) $location[latitude];
            	$long= (double) $location[longitude];
                echo "L.marker([$lat, $long], {icon: $uhc_sadar_location_marker}).addTo(all_UHC_sadar).bindPopup(\"$location[name]\"); ";            	
            }
            
            ?>

            var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/bd92fa43571c4092bfc457e9c839d54f/{styleId}/256/{z}/{x}/{y}.png',
                    cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade';
            var minimal = L.tileLayer(cloudmadeUrl, {styleId: 997, attribution: cloudmadeAttribution}),
            midnight = L.tileLayer(cloudmadeUrl, {styleId: 1, attribution: cloudmadeAttribution});

            var map = L.map('map', {
                center: new L.LatLng(23.75092, 90.4253),
                zoom: 7,
                layers: [minimal, all_UHC]
            });

            var baseMaps = {
                "Minimal": minimal,
                "Night View": midnight
            };

            var overlayMaps = {
                "all_UHC_sadar": all_UHC_sadar,
                "all_UHC": all_UHC,
                "twenty_bed_hospital": twenty_bed_hospital
            };
            L.control.layers(baseMaps, overlayMaps).addTo(map);

            var popup = L.popup();

            function onMapClick(e) {
                popup
                        .setLatLng(e.latlng)
                        .setContent("You clicked the map at " + e.latlng.toString())
                        .openOn(map);
            }
            map.on('click', onMapClick);

        </script>
    </body>
</html>

