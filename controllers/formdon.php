<?php
require("./models/donations.php");
require("./models/users.php");

$donationModel= new Donation();
$userModel= new User();

$user = $userModel->getUser($_SESSION["user_id"]);

$categories = $donationModel->getCategories();

if(isset($_POST["sendon"])) {

    $data = $donationModel->giveDonation($_POST);
    

    if($data === false){
        $message_one = true;

    }else{
        $thank_you = true;
    }


}


require("./views/formdon.php");
