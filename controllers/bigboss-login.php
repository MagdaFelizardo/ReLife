<?php

require("models/bigboss.php");

$bossModel = new Boss();


if(isset($_POST["login"])) {

    $data = $bossModel->login($_POST);

    if($_SESSION["user_id"] === '107' ){
        echo 'entrou aqui';
        exit();
    }else{
        header("HTTP/1.1 403 Forbidden");
        echo 'Não tem permissões para aceder';
        die();
    }

}

require("views/bigboss-login.php");