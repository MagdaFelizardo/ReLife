<?php
require("./models/donations.php");

$donationModel= new Donation();

$results = $donationModel->getDonByDonID($url_parts[2]);

$categories = $donationModel->getCategories();

$donusers = $donationModel->getListByUsers($_SESSION["user_id"]);

$donation = $donationModel->getDonation($url_parts[2]);


if( empty($donation) ){
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};


if(isset($_POST["update-donation"])) {

    $rowcount = $donationModel->updateDonation($_POST);

    if($rowcount > 0){
        $message_processing = true;
        require("./views/mydon.php");
        exit();
    }else{
        $notaccepted = true;
        require("./views/mydonedit.php");
        die();
    }
}


require("./views/mydonedit.php");



