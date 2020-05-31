<?php

require("models/users.php");

$userModel = new User();

$cities = $userModel->cityChoice();


if($_SERVER["REQUEST_METHOD"] === "POST['verify']"){
    $email = file_get_contents("php://input");

    $result = $userModel->verifyEmail($email);

    if($result > 0){
        $message1 = "Email já existente";
        echo $message1; 
        exit();
    }else {
        $message2 = "";
        echo $message2; 
        exit();
    }
    
}


if(isset($_POST["register"])) {

    $captcha = strtolower(strip_tags(trim(str_replace(" ", "", $_POST["captcha"]))));

    if($captcha === $_SESSION["captcha"]){

        $data = $userModel->register($_POST);

        if(isset($_SESSION["user_id"])){
            header("Location: /");
            exit();
        }else{
            $message = true;
        }

    }else{
        $message_captcha = "captcha_wrong";
    }

}



require("views/register.php");
