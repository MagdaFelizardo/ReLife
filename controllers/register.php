<?php

require("models/users.php");

$userModel = new User();

$cities = $userModel->cityChoice();


if(isset($_POST["register"])) {

    $captcha = strtolower(strip_tags(trim($_POST["captcha"])));

    if($captcha === $_SESSION["captcha"]){

        $data = $userModel->register($_POST);

        if(isset($_SESSION["user_id"])){
            header("Location: /");
            exit();
        }else{
            $message = true;
        }

    }else{
        $message_captcha = "captcha_wrong";
    }

}



require("views/register.php");
