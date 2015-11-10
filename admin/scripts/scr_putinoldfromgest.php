<?php

$file = $_REQUEST['file'];

echo $file;

$cible = "../xmlfriends/amis/$file";
$dest = "../xmlfriends/old/$file";

rename ($cible,$dest);
 
?> 