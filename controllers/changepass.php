<?php

require("models/users.php");

$userModel = new User();

$user = $userModel->getUser($_SESSION["user_id"]);

if(isset($_POST["changepass"])) {

    $count = $userModel->updatePassword($_POST);

    require("views/changepass-answer.php");
    die();

}

require("views/changepass.php");