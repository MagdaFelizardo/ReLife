<?php
require("./models/donations.php");

$donationModel= new Donation();

$donations = $donationModel->getlist();

require("./views/donations.php");