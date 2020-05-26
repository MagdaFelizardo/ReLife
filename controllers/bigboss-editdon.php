<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$results = $bossModel->getDonByDonID($url_parts[2]);

$categories = $bossModel->getCategories();

$pendingdons = $bossModel->getPendingList();




if(isset($_POST["update-donation"]) && isset($_SESSION["admin"])) {

    $rowcount = $bossModel->updateDonation($_POST);

    if($rowcount > 0 && ($_GET["source"]) === "pending"){
        header("Location: /bigboss-pendingdons/");
        exit();
    
    }elseif($rowcount > 0 && ($_GET["source"]) === "active"){
        header("Location: /bigboss-activedons/");
        exit();
    }else{
        $notaccepted = true;
    }

}

require("./views/bigboss-editdon.php");






