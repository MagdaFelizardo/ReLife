<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$results = $bossModel->getDonByDonID($url_parts[2]);


if(isset($_POST["update-donphoto"])) {

    $count = $bossModel->updateDonPhoto($_POST);

    if($count > 0 && ($_GET["source"]) === "pending") {   
        header("Location: /bigboss-pendingdons/");
        die();
    }elseif($count > 0 && ($_GET["source"]) === "active"){
        header("Location: /bigboss-activedons/");
        exit();
    }else{
        $message_error = true;  
    }
}


require("./views/bigboss-editphoto.php");