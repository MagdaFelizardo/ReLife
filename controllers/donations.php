<?php
require("./models/donations.php");

$donationModel= new Donation();

if( $url_parts[1] != "donations") {
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};

$donations = $donationModel->getlist();

require("./views/donations.php");