<?php
require("./models/donations.php");

$donationModel= new Donation();

//numeraçao dos links das paginas de doaçoes - LINKS
$page_number = 1;


$dontags = $donationModel->getListByTag($url_parts[2]);

require("./views/dontags.php");
