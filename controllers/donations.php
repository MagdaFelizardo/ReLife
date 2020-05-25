<?php
require("./models/donations.php");

$donationModel= new Donation();

//numeraçao dos links das paginas de doaçoes - LINKS
$pageone = 1;
$page_number = urlencode($pageone);


if(isset($_GET['search'])){

    $items = $donationModel->searchItem($_GET['search']);

    require("./views/searchitem.php");

}else{
    
    //paginaçao no rodapé
    if($_REQUEST["page"] < 2 ){
        $message = "nem penses em andar para trás";
    }
    $page_nr = $_REQUEST["page"]-1;
    $page = urlencode($page_nr);
    $data = $page_nr*10;

    $donations = $donationModel->getList($data);

    require("./views/donations.php");
}
