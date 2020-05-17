<?php

require("models/users.php");

$userModel = new User();

$cities = $userModel->cityChoice();

if(isset($_POST["register"])) {

    $data = $userModel->register($_POST);

    if($_SESSION["user_id"]){
        header("Location: /");
        exit();
    }else{
        header("HTTP/1.1 401 Unauthorized");
        require("views/register-failed.php");
        die();
    }
}

require("views/register.php");
