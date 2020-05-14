<?php
require("./models/donations.php");

$donationModel= new Donation();

if( !is_numeric($url_parts[2])) {
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};

$doncities = $donationModel->getListByCity(   $url_parts[2] );

if( empty($doncities) ) {
    header("HTTP/1.1 404 Not Found");
    die("Erro 404: Tópico inexistente");
}
else{
    require("./views/doncities.php");
}