<?php

$file = $_REQUEST['file'];

$sxml = simplexml_load_file("../../xmlfriends/outwait/$file");

$cpt = $sxml->cpt;
$url = $sxml->url;

unlink("../../xmlfriends/outwait/$file");

header("location:".$url."/friends/inwaitdelete.php?file=".$cpt);

?> 