<?php

$nofile = $_REQUEST['file'];

$sxml = simplexml_load_file("../xmlfriends/outwait/$nofile.xml");

$url = $sxml->url;

unlink("../xmlfriends/outwait/$nofile.xml");

header("location:".$url."/admin/index.php?page=inwaitamis");

?>