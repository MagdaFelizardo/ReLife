<?php
require("./models/donations.php");

$donationModel= new Donation();

$results = $donationModel->getDonByDonID($url_parts[2]);

$categories = $donationModel->getCategories();


if(isset($_POST["update-donation"])) {

    $rowcount = $donationModel->updateDonation($_POST);

    var_dump($rowcount); exit();

    if($rowcount > 0){
        echo'consegui!';
        exit();
    }else{
        echo'cócó!';
        die();
    }
}


require("./views/mydonedit.php");



