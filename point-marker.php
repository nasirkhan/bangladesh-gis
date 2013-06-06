<?php
require_once 'configuration.php';

/**
 * Get all the UHC
 */
$sql = "SELECT * FROM organisationunit WHERE featureType LIKE 'point' AND type LIKE 'Upazila Health Complex'";
$result = mysql_query($sql)or die(mysql_error()."<br>Query<br>_____<br>$sql<br>");
$row_count = mysql_num_rows($result);

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
                <!--                <div class="hero-unit">
                                    <h1>Hello, world!</h1>
                                    <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                                    <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
                                </div>-->
                <div class="row-fluid">
                    <div id="map" style="width: 600px; height: 550px"></div>
                    <input class="btn btn-info" type="button" onclick="leadRocket();" value="Load Rocket"/>
                    <input class="btn btn-warning" type="button" onclick="clear_khilgaon();" value="Clear All"/>
                    <input class="btn btn-primary" type="button" onclick="load_khilgaon();" value="Load Khilgaon"/>
                    
                    <!-- Leafletjs CDN js link -->
                    <!-- <script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script> -->
                    <script src="library/leafletjs/leaflet.js"></script>
                    <script src="library/leaflet.awesome-markers/leaflet.awesome-markers.js"></script>
                    
                    <script>

                        // load a map which has the center at the coordinate 23.75092,90.4253
                        var khilgaonRegion = new L.layerGroup();
                        var all_UHC = new L.layerGroup();
                        // var map = L.map('map').setView([23.75092, 90.4253], 13);
                        var map = L.map('map', {
                            center : [23.75092, 90.4253],
                            zoom : 7,
                            layers: [all_UHC]
                        });


                        L.tileLayer('http://{s}.tile.cloudmade.com/bd92fa43571c4092bfc457e9c839d54f/997/256/{z}/{x}/{y}.png', {
                            maxZoom: 18,
                            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
                        }).addTo(map);

                        var hospitalMarker = L.AwesomeMarkers.icon({
                            icon: 'hospital',
                            color: 'red'
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


                        // L.marker([23.75092, 90.4253]).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Thana");

                        // L.marker([23.7518, 90.42458], {icon: shoppingCartMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Taltala Market");

                        // L.marker([23.750635, 90.420871], {icon: homeMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Govt High School");

                        // L.marker([23.750277, 90.422378], {icon: homeMarker}).addTo(khilgaonRegion).bindPopup("<b>Khilgaon Girls' School And College");

                        // L.marker([23.735973, 90.425034], {icon: redMarker}).addTo(khilgaonRegion).bindPopup("<b>Railway Hospital");

                        // L.marker([23.746363, 90.421128], {icon: hospitalMarker}).addTo(khilgaonRegion).bindPopup("<b>Jheel Mosque");

                        // L.marker([23.746579, 90.412545], {icon: shoppingCartMarker}).addTo(khilgaonRegion).bindPopup("<b>Mouchak Market");

                        <?php
                            while($location = mysql_fetch_assoc($result)){
                                $location_name = $location[name];
                                $latitude = $location[latitude];
                                $longitude = $location[longitude];
                                echo "L.marker([$latitude, $longitude], {icon: hospitalMarker}).addTo(all_UHC).bindPopup(\"$location_name\");";
                            }
                        ?>
                        
                        function leadRocket(){
                            L.marker([23.770893, 90.414412], {icon: rocketMarker}).addTo(map).bindPopup("<b>Hatir Jheel");
                        }
                        function clear_khilgaon(){
                            khilgaonRegion.clearLayers();
                        }
                        function load_khilgaon(){
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
                    <!--                    <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                        <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                        <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                    </div>/row
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                        <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                        <div class="span4">
                                            <h2>Heading</h2>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                            <p><a class="btn" href="#">View details &raquo;</a></p>
                                        </div>/span
                                    </div> --> <!--/row-->
                </div><!--/span-->
            </div><!--/row-->

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

</body>
</html>
