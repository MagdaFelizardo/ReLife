<?php

require("models/users.php");

$userModel = new User();

if(isset($_POST["login"])) {

    $data = $userModel->login($_POST);

    if(isset($_SESSION["user_id"]) && $url_parts[2] === '?source=login' ){
        header("Location: /");
        exit();
    }elseif(isset($_SESSION["user_id"]) && $url_parts[2] === '?source=formdon'){
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
