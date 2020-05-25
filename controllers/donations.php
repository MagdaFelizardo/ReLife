<?php
require("./models/donations.php");

$donationModel= new Donation();

//numeraçao dos links das paginas de doaçoes - LINKS
$page_number = 1;


if(isset($_GET['search'])){

    $items = $donationModel->searchItem($_GET['search']);

    require("./views/searchitem.php");

}else{
    
    //paginaçao no rodapé
    if($_GET["page"] < 2 ){
        $disable_back = "não andar para trás";
    }

    
    $page = (int)$_GET["page"] - 1;
    $data = $page * 10;

    $donations = $donationModel->getList($data);

    if(count($donations) < 9){
        $disable_forward = "não andar para a frente";
    }

    require("./views/donations.php");
}
