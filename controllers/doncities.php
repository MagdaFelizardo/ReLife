<?php
require("./models/donations.php");

$donationModel= new Donation();

//numeraçao dos links das paginas de doaçoes - LINKS
$pageone = 1;
$page_number = urlencode($pageone);

$doncities = $donationModel->getListByCity($url_parts[2]);

require("./views/doncities.php");
