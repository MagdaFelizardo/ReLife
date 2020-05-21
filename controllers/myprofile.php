<?php

require("models/users.php");

$userModel = new User();

$user = $userModel->getUser($_SESSION["user_id"]);

require("views/myprofile.php");
