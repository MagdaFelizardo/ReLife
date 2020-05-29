<?php 
    
    header("Content-Type: image/png");
    
    $image = imagecreate(200, 80);
    imagecolorallocate($image, 200, 200, 200);
    $black = imagecolorallocate($image, 0, 0, 0);
    $text = "testes";
    imagettftext($image, 30, 0, 60, 45, $black, __DIR__."/../fontes/COMICATE.ttf", $text);
    imagepng($image);

    $_SESSION["captcha"] = $text;
