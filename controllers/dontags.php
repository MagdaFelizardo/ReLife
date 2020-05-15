<?php
require("./models/donations.php");

$donationModel= new Donation();

$dontags = $donationModel->getListByTag($url_parts[2]);

if( empty($dontags) ) {
    header("HTTP/1.1 404 Not Found");
    die("Erro 404: Tópico inexistente");
}
else{
    require("./views/dontags.php");
}