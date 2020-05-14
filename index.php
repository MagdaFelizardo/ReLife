<?php
session_start();
setlocale(LC_ALL, "pt_PT.UTF-8");

$url_parts = explode("/", $_SERVER["REQUEST_URI"]);

//define base_path
// define("BASE_PATH", dirname($_SERVER["SCRIPT_NAME"]) . "/");
define("BASE_PATH", "http://localhost");

// print_r($url_parts);

// url_parts[1] = controllers
// url_parts[2] = donations / homepage / etc


// controller default
$controller = "homepage";

// white list de controllers
$controllers = ["homepage", "donations"];


//redirecciona para o controller que é suposto
if(isset($url_parts[1]) && in_array($url_parts[1], $controllers) ) {
    $controller = $url_parts[1];
}

require("./controllers/".$controller.".php");