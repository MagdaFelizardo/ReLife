<?php

require("models/users.php");

$userModel = new User();


if(isset($_POST["login"])) {

    $captcha = strtolower(strip_tags(trim(str_replace(" ", "", $_POST["captcha"]))));

    if($captcha === $_SESSION["captcha"]){


        $data = $userModel->login($_POST);

        if(isset($_SESSION["user_id"]) && $_GET["source"] === "login" ){
            header("Location: /");
            exit();
        }elseif(isset($_SESSION["user_id"]) && $_GET["source"] === "formdon"){
            header("Location: /formdon/");
            exit();
        }else{
            $message = "login falhou";
        }

    }else{
        $message_captcha = "captcha_wrong";
    }
}


require("views/login.php");
