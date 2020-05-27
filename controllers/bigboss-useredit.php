<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$user = $bossModel->getUser($url_parts[2]);

$cities = $bossModel->cityChoice();

if(isset($_POST["update-profile"]) && isset($_SESSION["admin"])) {

    $rowcount = $bossModel->updateUser($_POST);

    if($rowcount > 0){
        header("Location: /bigboss-activeusers/ ");
        exit();
    }else{
        $message = "edição falhou";
    }
}


require("./views/bigboss-useredit.php");