<?php

$nofile = $_REQUEST['file'];

$sxml = simplexml_load_file("../xmlfriends/inwait/$nofile.xml");

$url = $sxml->url;

unlink("../xmlfriends/inwait/$nofile.xml");

header("location:".$url."/admin/index.php?page=outwaitamis");

?>