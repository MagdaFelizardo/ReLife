<?php
require("./models/donations.php");

$donationModel= new Donation();

$doncities = $donationModel->getListByCity(   $url_parts[2] );

if( empty($doncities) ) {
    header("HTTP/1.1 404 Not Found");
    die("Erro 404: Tópico inexistente");
}
else{
    require("./views/doncities.php");
}