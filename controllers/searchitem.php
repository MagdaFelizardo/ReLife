<?php
require("./models/donations.php");

$donationModel= new Donation();

$search = $_POST['search'];

$items = $donationModel->searchItem( $search );

// print_r($items); exit;

require("./views/searchitem.php");

