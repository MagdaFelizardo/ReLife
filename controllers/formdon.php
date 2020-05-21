<?php
require("./models/donations.php");
require("./models/users.php");

$donationModel= new Donation();
$userModel= new User();

$user = $userModel->getUser($_SESSION["user_id"]);

if(isset($_POST["sendon"])) {

    $data = $donationModel->giveDonation($_POST);

    if($data === false){
        header("HTTP/1.1 401 Unauthorized");
        require("views/formdon-fail.php");
        die();
    }else{
        header("Location: /formdon");
        exit();
    }


}


require("./views/formdon.php");
