<?php

require("models/users.php");

$userModel = new User();

$cities = $userModel->cityChoice();

if(isset($_POST["register"])) {

    $data = $userModel->register($_POST);

    if(isset($_SESSION["user_id"])){
        header("Location: /");
        exit();
    }else{
        $message = true;
    }
}

require("views/register.php");
