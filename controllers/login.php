<?php

require("models/users.php");

$userModel = new User();


if(isset($_POST["login"])) {

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


}

require("views/login.php");
