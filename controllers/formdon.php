<?php
require("./models/donations.php");

$donationModel= new Donation();

$donationModel->getUser($_SESSION["user_id"]);

if(isset($_POST["sendon"])) {

    $data = $donationModel->giveDonation($_POST);

    header("Location: /formdon");
    exit();

    // if($_SESSION["user_id"]){
    //     header("Location: /");
    //     exit();
    // }else{
    //     header("HTTP/1.1 401 Unauthorized");
    //     require("views/register-failed.php");
    //     die();
    // }
}


require("./views/formdon.php");
