<?php
require("./models/donations.php");

$donationModel= new Donation();

//numeraçao dos links das paginas de doaçoes - LINKS
$page_number = 1;


$doncities = $donationModel->getListByCity($url_parts[2]);

require("./views/doncities.php");
