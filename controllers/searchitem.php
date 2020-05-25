<?php
require("./models/donations.php");

$donationModel= new Donation();
//numeraçao dos links das paginas de doaçoes - LINKS
$pageone = 1;
$page_number = urlencode($pageone);

$items = $donationModel->searchItem($_GET['search']);


require("./views/searchitem.php");

