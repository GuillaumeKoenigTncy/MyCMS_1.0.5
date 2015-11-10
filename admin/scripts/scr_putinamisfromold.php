<?php

$file = $_REQUEST['file'];

echo $file;

$cible = "../xmlfriends/old/$file";
$dest = "../xmlfriends/amis/$file";

rename ($cible,$dest);
 
?> 