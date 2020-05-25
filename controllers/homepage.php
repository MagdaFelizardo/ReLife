<?php

// if( !empty($url_parts[1])) {
//     header("HTTP/1.1 400 Bad Request");
//     die("Bad Request");
// };

//numeraçao das paginas de doaçoes
$pageone = 1;
$page_number = urlencode($pageone);

require("views/homepage.php");