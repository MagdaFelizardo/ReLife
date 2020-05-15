<?php
require("./models/donations.php");

$donationModel= new Donation();

if(isset($_GET['search'])){

    $items = $donationModel->searchItem( $_GET['search']);

    require("./views/searchitem.php");

}else{
    $donations = $donationModel->getlist();

    require("./views/donations.php");
}
