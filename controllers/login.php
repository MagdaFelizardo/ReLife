<?php

require("models/users.php");

$userModel = new User();

if(isset($_POST["login"])) {

    $data = $userModel->login($_POST);

    if(isset($_SESSION["user_id"])){
        header("Location: /");
        exit();
    }else{
        header("HTTP/1.1 401 Unauthorized");
        require("views/login-failed.php");
        die();
    }
}

require("views/login.php");
