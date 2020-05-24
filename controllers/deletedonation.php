<?php
require("./models/donations.php");

$donationModel= new Donation();

$donationDel = $donationModel->deleteDonation($url_parts[2]);

header("Location: /mydon/");