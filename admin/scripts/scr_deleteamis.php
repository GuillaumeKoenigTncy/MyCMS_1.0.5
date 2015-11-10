<?php

$file = $_REQUEST['file'];

$sxml = simplexml_load_file("../../xmlfriends/amis/$file");

$url = $sxml->url;
$cpt = $sxml->cpt;
$key = $sxml->key;

$fkey = simplexml_load_file("../../xmlfriends/clerecu.xml");
$furl = simplexml_load_file("../../xmlfriends/siteenamis.xml");

$no = substr($file,0,strpos($file,".")); 

$verif = false;
$i = 0;

while($verif == false){
	$un1 = $fkey->cle[$i]->attributes()->id; 
	if ($un1 == $no){
		$verif = true;
	}else{
		$i++;
	}
}

if ($verif){
	unset($fkey->cle[$i]);
	unset($furl->site[$i]);
}

$fkey->asXML("../../xmlfriends/clerecu.xml");
$furl->asXML("../../xmlfriends/siteenamis.xml");

$dest = "../../xmlfriends/amis/$file";

unlink($dest);

header("location:".$url."/friends/deleteamis.php?file=$cpt");

?> 