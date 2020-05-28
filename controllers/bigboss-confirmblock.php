<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$user = $bossModel->getUser($url_parts[2]);

require("./views/bigboss-confirmblock.php");