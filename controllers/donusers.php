<?php
require("./models/donations.php");

$donationModel= new Donation();

$donusers = $donationModel->getListByUsers($url_parts[2]);

//numeraçao dos links das paginas de doaçoes - LINKS
$pageone = 1;
$page_number = urlencode($pageone);

if( empty($donusers) ) {
    header("HTTP/1.1 404 Not Found");
    die("Erro 404: Tópico inexistente");
}
else{
    //numeraçao das paginas de doaçoes
    if($_REQUEST["page"] < 2 ){
        $message = "nem penses em andar para trás";
    }
    $page_nr = $_REQUEST["page"]-1;
    $page = urlencode($page_nr);
    $data = $page_nr*10;

    $donations = $donationModel->getList($data);

    require("./views/donusers.php");
}