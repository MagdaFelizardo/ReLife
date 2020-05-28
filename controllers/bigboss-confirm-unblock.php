<?php
require("./models/bigboss.php");

$bossModel= new Boss();

$blocked_user = $bossModel->getBlockedUser($url_parts[2]);

require("./views/bigboss-confirm-unblock.php");