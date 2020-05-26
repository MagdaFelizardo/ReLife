<?php
require("./models/donations.php");

$donationModel= new Donation();

$results = $donationModel->getDonByDonID($url_parts[2]);

$categories = $baseModel->getCategories();


require("./views/mydondelete.php");



