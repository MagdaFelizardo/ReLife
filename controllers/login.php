<?php

require("models/users.php");

$userModel = new User();

if(isset($_POST["login"])) {

    $data = $userModel->login($_POST);

    if(isset($_SESSION["user_id"]) && !isset($url_parts[3])){
        header("Location: /");
        exit();
    }elseif(isset($_SESSION["user_id"]) && isset($url_parts[3]) ){
        header("Location: /formdon/");
        exit();
    }
    else{
        header("HTTP/1.1 401 Unauthorized");
        require("views/login-failed.php");
        die();
    }
}

require("views/login.php");
