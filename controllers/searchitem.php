<?php
require("./models/donations.php");

$donationModel= new Donation();
//numeraçao dos links das paginas de doaçoes - LINKS
$page_number = 1;

$items = $donationModel->searchItem($_GET['search']);

require("./views/searchitem.php");

