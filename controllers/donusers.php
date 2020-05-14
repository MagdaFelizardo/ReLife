<?php
require("./models/donations.php");

$donationModel= new Donation();

$donusers = $donationModel->getListByUsers(   $url_parts[2] );

require("./views/donusers.php");