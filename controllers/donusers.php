<?php
require("./models/donations.php");

$donationModel= new Donation();

if( !is_numeric($url_parts[2])) {
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};

$donusers = $donationModel->getListByUsers($url_parts[2]);

if( empty($donusers) ) {
    header("HTTP/1.1 404 Not Found");
    die("Erro 404: Tópico inexistente");
}
else{
    require("./views/donusers.php");
}