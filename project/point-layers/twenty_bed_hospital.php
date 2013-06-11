<?php
require_once 'configuration.php';

$type = "20 Beded Hospital";
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $type;?></title>

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
            var darkblueAmbulanceMarker = L.AwesomeMarkers.icon({icon: 'ambulance', color: 'darkblue'});            

            // create layer groups          
            var twenty_bed_hospital = new L.layerGroup();

            <?php
            /**
             * 20 bed hospital
             */            
            $sql = "SELECT * FROM organisationunit WHERE type LIKE '$type' AND coordinates NOT LIKE 'null' ORDER BY type";
            $result = mysql_query($sql) or die(mysql_error() . "<b>Query:</b><br>$sql<br>");
            $twenty_bed_hospital_location_marker = "darkblueAmbulanceMarker";
            
            while ($location = mysql_fetch_assoc($result)) {
            	$lat= (double) $location[latitude];
            	$long= (double) $location[longitude];
                echo "L.marker([$lat, $long], {icon: $twenty_bed_hospital_location_marker}).addTo(twenty_bed_hospital).bindPopup(\"$location[name]\"); ";            	
            }            
            
            ?>

            var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/bd92fa43571c4092bfc457e9c839d54f/{styleId}/256/{z}/{x}/{y}.png',
                    cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade';
            var minimal = L.tileLayer(cloudmadeUrl, {styleId: 997, attribution: cloudmadeAttribution}),
            midnight = L.tileLayer(cloudmadeUrl, {styleId: 1, attribution: cloudmadeAttribution});

            var map = L.map('map', {
                center: new L.LatLng(23.75092, 90.4253),
                zoom: 7,
                layers: [minimal, twenty_bed_hospital]
            });

            var baseMaps = {
                "Minimal": minimal,
                "Night View": midnight
            };

            var overlayMaps = {
                "<?php echo $type;?>": twenty_bed_hospital
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

