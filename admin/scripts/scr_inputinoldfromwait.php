<?php

$file = $_REQUEST['file'];

$sxml = simplexml_load_file("../../xmlfriends/inwait/$file");

$cpt = $sxml->cpt;
$url = $sxml->url;

unlink("../../xmlfriends/inwait/$file");

header("location:".$url."/friends/outwaitdelete.php?file=".$cpt);

?> 