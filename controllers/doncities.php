<?php
require("./models/donations.php");

$donationModel= new Donation();

$doncities = $donationModel->getListByCity(   $url_parts[2] );

require("./views/doncities.php");