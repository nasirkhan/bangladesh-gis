<?php
require_once 'configuration.php';

/**
 * Get all the UHC
 */
$sql = "SELECT * FROM organisationunit WHERE featureType LIKE 'point' AND type LIKE 'Upazila Health Complex'";
$result = mysql_query($sql) or die(mysql_error() . "<br>Query<br>_____<br>$sql<br>");
$result_upazila_health_complex = $result;

$sql = "SELECT * FROM organisationunit WHERE featureType LIKE 'point' AND type LIKE 'UH & FWC/FP Clinic/Union Sub Centers'";
$result = mysql_query($sql) or die(mysql_error() . "<br>Query<br>_____<br>$sql<br>");
$result_uh_fwc_usc = $result;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- load styles -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
          <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">

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

        <div class="navbar navbar-inverse navbar-fixed-top" >
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="#" name="top">DGHS GIS</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="#"><i class="icon-home"></i> Home</a></li>
                                <!--                                
                                <li class="divider-vertical"></li>
                                <li class="active"><a href="#"><i class="icon-file"></i> Pages</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="#"><i class="icon-envelope"></i> Messages</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="#"><i class="icon-signal"></i> Stats</a></li>
                                <li class="divider-vertical"></li>
                                <li><a href="#"><i class="icon-lock"></i> Permissions</a></li>
                                <li class="divider-vertical"></li>-->
                            </ul>
                            <ul class="nav pull-right">
                                <li><a href="/signup">Sign Up</a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                                    <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                        <form method="post" action="login" accept-charset="UTF-8">
                                            <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                                            <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                                            <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                                            <label class="string optional" for="user_remember_me"> Remember me</label>
                                            <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">                                            
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                    <!--/.container-fluid -->
                </div>
                <!--/.navbar-inner -->
            </div>
        </div><!-- /navbar -->
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <ul class="nav nav-list">
                        <li class="nav-header">Sidebar</li>
                        <li class="active"><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="nav-header">Sidebar</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="nav-header">Sidebar</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="span9">
                <div class="row-fluid">
                    <div id="map" style="width: 600px; height: 550px"></div>
                    <!-- <input class="btn btn-info" type="button" onclick="leadRocket();" value="Load Rocket"/>
                    <input class="btn btn-warning" type="button" onclick="clear_khilgaon();" value="Clear All"/>
                    <input class="btn btn-primary" type="button" onclick="load_khilgaon();" value="Load Khilgaon"/> -->                    

                    

                </div><!--/row-->
            </div><!--/span-->
            <hr>



        </div><!--/.fluid-container-->

        <footer>
            <p>&copy; Company 2013</p>
        </footer>

        <!-- Load javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function()
            {
                //Handles menu drop down
                $('.dropdown-menu').find('form').click(function(e) {
                    e.stopPropagation();
                });
            });
        </script>
        <script src="library/leafletjs/leaflet.js"></script>
        <script src="library/leaflet.awesome-markers/leaflet.awesome-markers.js"></script>

        <script>
            var hospitalMarker = L.AwesomeMarkers.icon({
                icon: 'hospital',
                color: 'red'
            });
            var redHospitalMarker = L.AwesomeMarkers.icon({
                icon: 'hospital',
                color: 'red'
            });
            var greenHospitalMarker = L.AwesomeMarkers.icon({
                icon: 'hospital',
                color: 'green'
            });
            var redMarker = L.AwesomeMarkers.icon({
                icon: 'spinner',
                color: 'red',
                spin: true
            });
            var homeMarker = L.AwesomeMarkers.icon({
                icon: 'home',
                color: 'darkblue'
            });
            var shoppingCartMarker = L.AwesomeMarkers.icon({
                icon: 'shopping-cart',
                color: 'green'
            });
            var rocketMarker = L.AwesomeMarkers.icon({
                icon: 'rocket',
                color: 'cadetblue'
            });

            // load a map which has the center at the coordinate 23.75092,90.4253
            var khilgaonRegion = new L.layerGroup();
            var all_UHC = new L.layerGroup();
            var all_USC = new L.layerGroup();

            // var map = L.map('map').setView([23.75092, 90.4253], 13);
            var map = L.map('map', {
                center: [23.75092, 90.4253],
                zoom: 7,
                layers: [all_USC]
            });


            L.tileLayer('http://{s}.tile.cloudmade.com/bd92fa43571c4092bfc457e9c839d54f/997/256/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
            }).addTo(map);

            


            // L.marker([23.75092, 90.4253]).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Thana");

            // L.marker([23.7518, 90.42458], {icon: shoppingCartMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Taltala Market");

            // L.marker([23.750635, 90.420871], {icon: homeMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Govt High School");

            // L.marker([23.750277, 90.422378], {icon: homeMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Girls' School And College");

            // L.marker([23.735973, 90.425034], {icon: redMarker}).addTo(khilgaonRegion).bindPopup("<b>Railway Hospital");

            // L.marker([23.746363, 90.421128], {icon: hospitalMarker}).addTo(khilgaonRegion).bindPopup("<b>Jheel Mosque");

            // L.marker([23.746579, 90.412545], {icon: shoppingCartMarker}).addTo(khilgaonRegion).bindPopup("<b>Mouchak Market");

            <?php
            // while ($location = mysql_fetch_assoc($result_upazila_health_complex)) {
            //     $location_name = $location[name];
            //     $latitude = $location[latitude];
            //     $longitude = $location[longitude];
            //     echo "L.marker([$latitude, $longitude], {icon: redHospitalMarker}).addTo(all_UHC).bindPopup(\"$location_name\");";
            // }

            while ($usc_location = mysql_fetch_assoc($result_uh_fwc_usc)) {
                $location_name = $usc_location[name];
                $latitude = $usc_location[latitude];
                $longitude = $usc_location[longitude];
                echo "L.marker([$latitude, $longitude], {icon: greenHospitalMarker}).addTo(all_USC).bindPopup(\"$location_name\");";
            }
            ?>

            function leadRocket() {
                L.marker([23.770893, 90.414412], {icon: rocketMarker}).addTo(map).bindPopup("<b>Hatir Jheel");
            }
            function clear_khilgaon() {
                khilgaonRegion.clearLayers();
            }
            function load_khilgaon() {
                khilgaonRegion.addTo(map);
            }

            var popup = L.popup();
            function onMapClick(e) {
                popup.setLatLng(e.latlng)
                        .setContent("You clicked the map at " + e.latlng.toString())
                        .openOn(map);
            }

            map.on('click', onMapClick);

        </script>

</body>
</html>
