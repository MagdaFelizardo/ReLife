<?php
require("./models/donations.php");

$donationModel= new Donation();

$donusers = $donationModel->getListByUsers($_SESSION["user_id"]);

require("./views/mydon.php");



