<?php
require("./models/donations.php");

$donationModel= new Donation();

$items = $donationModel->searchItem($_GET['search']);

require("./views/searchitem.php");

