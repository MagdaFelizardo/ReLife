<?php
require("./models/donations.php");

$donationModel= new Donation();

$results = $donationModel->getDonByDonID($url_parts[2]);

$donusers = $donationModel->getListByUsers($_SESSION["user_id"]);


$donation = $donationModel->getDonation($url_parts[2]);


if( empty($donation) ){
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};



if(isset($_POST["update-donphoto"])) {

    $count = $donationModel->updateDonPhoto($_POST);

    if($count > 0) {   
        $message_success = true;
        require("./views/mydonphotoedit.php");
        die();
    }else{
        $message_error = true;  
        require("./views/mydonphotoedit.php");
        die();
    }
}


require("./views/mydonphotoedit.php");



