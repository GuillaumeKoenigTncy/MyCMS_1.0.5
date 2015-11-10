<?php

$fkey = simplexml_load_file ('../config/config.xml');
$oui = $fkey->amis;

$verif = strcmp ("oui",$oui);

$from = $_REQUEST['from'];

if ($verif == 0){

$key = $_REQUEST['key'];
$incpt = $_REQUEST['cpt'];

$sxml = simplexml_load_file('../xmlfriends/amis.xml');
$cpt = $sxml->cpt;
$cpt = $cpt +1;
$sxml->cpt = $cpt;
$sxml->asXML('../xmlfriends/amis.xml');

$texte = '<?xml version="1.0"?><amis></amis>';

$f = fopen("../xmlfriends/inwait/".$cpt.".xml", "w");
fputs($f, $texte );
fclose($f);

$sxml = simplexml_load_file("../xmlfriends/inwait/".$cpt.".xml");
$sxml->addChild("url",$from);
$sxml->addChild("key",$key);
$sxml->addChild("cpt",$incpt);
$sxml->addChild("date",date("d-m-Y"));
$sxml->asXML("../xmlfriends/inwait/".$cpt.".xml");

echo $from;

header("location:".$from."/friends/ackadd.php?incpt=".$incpt."&cpt=".$cpt);

}else{
	$sxml = simplexml_load_file('../xmlfriends/amis.xml');
	$cpt = $sxml->cpt;
	unlink("../xmlfriends/outwait/".$cpt.".xml");
	header("location:".$from."/friends/noadd.php");
}

?>