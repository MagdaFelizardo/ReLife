<?php

require("models/users.php");

$userModel = new User();

$cities = $userModel->cityChoice();

$user = $userModel->getUser($_SESSION["user_id"]);

if(isset($_POST["update-profile"])) {

    $rowcount = $userModel->updateUser($_POST);

    if($rowcount > 0){
        header("Location: /myprofile/ ");
        exit();
    }else{
        $message = "edição falhou";
    }
}

require("views/myprofiledit.php");