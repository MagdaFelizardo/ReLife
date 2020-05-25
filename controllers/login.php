<?php

require("models/users.php");

$userModel = new User();


if(isset($_POST["login"])) {

    $data = $userModel->login($_POST);

    if($_SESSION["user_id"] === '107' ){
        header("HTTP/1.1 403 Forbidden");
        $not_this_email = true;
        session_destroy();
        require("views/login.php");
        die();
    }

    if(isset($_SESSION["user_id"]) && $_GET["source"] === "login" ){
        header("Location: /");
        exit();
    }elseif(isset($_SESSION["user_id"]) && $_GET["source"] === "formdon"){
        header("Location: /formdon/");
        exit();
    }else{
        $message = "login falhou";
    }

}

require("views/login.php");
