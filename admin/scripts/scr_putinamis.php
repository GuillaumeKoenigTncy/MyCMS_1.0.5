<?php

$file = $_REQUEST['file'];

$sxml = simplexml_load_file("../../xmlfriends/inwait/$file");

$url = $sxml->url;
$cpt = $sxml->cpt;
$key = $sxml->key;

$fkey = simplexml_load_file("../../xmlfriends/clerecu.xml");
$furl = simplexml_load_file("../../xmlfriends/siteenamis.xml");

$no = substr($file,0,strpos($file,".")); 
$balise = "fileno".$no;

$in1 = $fkey->addChild("cle",$key);
$in2 = $furl->addChild("site",$url);

$in1->addAttribute('id', $no);
$in2->addAttribute('id', $no);

$fkey->asXML("../../xmlfriends/clerecu.xml");
$furl->asXML("../../xmlfriends/siteenamis.xml");

$sxml->asXML("../../xmlfriends/inwait/$file");

$cible = "../../xmlfriends/inwait/$file";
$dest = "../../xmlfriends/amis/$file";
rename ($cible,$dest);

$fkey = simplexml_load_file ('../../config/config.xml');
$key = $fkey->kpublic;

header("location:".$url."/friends/putinamis.php?file=$cpt&key=$key");

?> 