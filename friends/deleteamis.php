<?php

$nofile = $_REQUEST['file'];

$sxml = simplexml_load_file("../xmlfriends/amis/$nofile.xml");

$url = $sxml->url;

$fkey = simplexml_load_file("../xmlfriends/clerecu.xml");
$furl = simplexml_load_file("../xmlfriends/siteenamis.xml");

$verif = false;
$i = 0;

while($verif == false){
	$un1 = $fkey->cle[$i]->attributes()->id; 
	if ($un1 == $nofile){
		
		$verif = true;
	}else{
		$i++;
	}
}

if ($verif){
	unset($fkey->cle[$i]);
	unset($furl->site[$i]);
}

$fkey->asXML("../xmlfriends/clerecu.xml");
$furl->asXML("../xmlfriends/siteenamis.xml");

$dest = "../xmlfriends/amis/$nofile.xml";

unlink($dest);

header("location:".$url."/admin/index.php?page=gestionamis");

?> 