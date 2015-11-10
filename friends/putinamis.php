<?php

$nofile = $_REQUEST['file'];
$key = $_REQUEST['key'];

$sxml = simplexml_load_file("../xmlfriends/outwait/$nofile.xml");
$url = $sxml->url;

$sxml->addChild("key",$key);
$sxml->asXML("../xmlfriends/outwait/$nofile.xml");

$fkey = simplexml_load_file("../xmlfriends/clerecu.xml");
$furl = simplexml_load_file("../xmlfriends/siteenamis.xml");

$balise = "fileno".$nofile;

$in1 = $fkey->addChild("cle",$key);
$in2 = $furl->addChild("site",$url);

$in1->addAttribute('id', $nofile);
$in2->addAttribute('id', $nofile);

$fkey->asXML("../xmlfriends/clerecu.xml");
$furl->asXML("../xmlfriends/siteenamis.xml");

$cible = "../xmlfriends/outwait/$nofile.xml";
$dest = "../xmlfriends/amis/$nofile.xml";
rename ($cible,$dest);

header("location:".$url."/admin/index.php?page=gestionamis");

?>