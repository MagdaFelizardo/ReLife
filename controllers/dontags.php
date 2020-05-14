<?php
require("./models/donations.php");

$donationModel= new Donation();

$dontags = $donationModel->getListByTag(   $url_parts[2] );

require("./views/dontags.php");