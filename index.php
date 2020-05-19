<?php
session_start();
setlocale(LC_ALL, "pt_PT.UTF-8");

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

//define base_path
// define("BASE_PATH", dirname($_SERVER["SCRIPT_NAME"]) . "/");
define("BASE_PATH", "http://localhost");

// print_r($url_parts);
// exit;

// url_parts[1] = controllers (donations / homepage / etc)
// url_parts[2] = ID, aççao, etc


// controller default
$controller = "homepage";

// white list de controllers
$controllers = ["homepage", "donations", "dontags", "doncities", 
                "donusers", "searchitem", "register", "login", "logout", "myprofile", "myprofiledit", "changepass"];


//redirecciona para o controller que é suposto
if(isset($url_parts[1]) && in_array($url_parts[1], $controllers) ) {
    $controller = $url_parts[1];
}

require("./controllers/".$controller.".php");