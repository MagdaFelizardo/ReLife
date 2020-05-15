<?php

if( !empty($url_parts[1])) {
    header("HTTP/1.1 400 Bad Request");
    die("Bad Request");
};

require("views/homepage.php");