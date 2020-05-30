<?php 
    
    header("Content-Type: image/png");
    
    $image = imagecreate(200, 80);
    imagecolorallocate($image, 200, 200, 200);
    $black = imagecolorallocate($image, 0, 0, 0);
    $bytes = openssl_random_pseudo_bytes(3, $cstrong);
    $text   = bin2hex($bytes);
    imagettftext($image, 30, 0, 30, 45, $black, __DIR__."/../fonts/COMICATE.TTF", $text);
    imagepng($image);

    $_SESSION["captcha"] = $text;


 
