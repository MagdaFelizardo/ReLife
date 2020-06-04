<?php
require("./models/donations.php");
require("./models/users.php");

$donationModel= new Donation();
$userModel= new User();

$user = $userModel->getUser($_SESSION["user_id"]);

$categories = $donationModel->getCategories();

if(isset($_POST["sendon"])) {

    $rows = $donationModel->giveDonation($_POST);

    if($rows > 0){
        $thank_you = true;

    }else{
        $complete_all_fields = true; 
    }


}


require("./views/formdon.php");
