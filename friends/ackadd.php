<?php

$incpt = $_REQUEST['incpt'];
$cpt = $_REQUEST['cpt'];

$sxml = simplexml_load_file("../xmlfriends/outwait/$incpt.xml");

$sxml->addChild("cpt",$cpt);

$sxml->asXML("../xmlfriends/outwait/$incpt.xml");

header("location:../admin/index.php?page=outwaitamis");

?>