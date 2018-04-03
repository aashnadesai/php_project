<?php

// Error Management - You can turn the error reporting off by Commenting lines 4 and 5 and uncommenting line 6 //
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
error_reporting(0); // Supress Error Reporting


require_once("db-settings.php"); //Require DB connection
require_once("functions.php"); // Declare - Define all functions.
date_default_timezone_set("America/New_York"); //Set time zone to New York.
?>