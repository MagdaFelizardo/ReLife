<?php

require("models/users.php");

$userModel = new User();

$userModel->deleteUser($_SESSION["user_id"]); 

session_destroy();

header("Location: /");

