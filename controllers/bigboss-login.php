<?php

require("models/bigboss.php");

$bossModel = new Boss();


if(isset($_POST["login"])) {

    $data = $bossModel->login($_POST);

    if(isset($_SESSION["admin"])){
        header("Location: /bigboss-pendingdons/");
        exit();
    }else{
        header("HTTP/1.1 403 Forbidden");
        $unauthorized = true;
    }

}

require("views/bigboss-login.php");