<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE );

session_start();


/**
 * Application basic configuration
 */
$app_name = "DGHS GIS Project";
$site_name = "DGHS GIS";
$copyright = "DGHS";


require_once 'include/db_connection.php';
require_once 'include/functions_generic.php';
require_once 'include/functions_app_specific.php';



?>
