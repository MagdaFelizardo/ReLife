<?php

require("models/bigboss.php");

$bossModel = new Boss();

if(isset($_POST["login"])) {

    $captcha = strtolower(strip_tags(trim(str_replace(" ", "", $_POST["captcha"]))));

    if($captcha === $_SESSION["captcha"]){

        $data = $bossModel->login($_POST);

        if(isset($_SESSION["admin"])){
            header("Location: /bigboss-pendingdons/");
            exit();
        }else{
            header("HTTP/1.1 403 Forbidden");
            $unauthorized = true;
        }

    }else{
        $message_captcha = "captcha_wrong";
    }

}



require("views/bigboss-login.php");