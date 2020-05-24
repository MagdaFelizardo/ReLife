<?php
require("./models/donations.php");

$donationModel= new Donation();

$donusers = $donationModel->getListByUsers($_SESSION["user_id"]);

$donation = $donationModel->getDonation($url_parts[2]);


if( empty($donation) ){
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};

require("./views/mydon.php");



