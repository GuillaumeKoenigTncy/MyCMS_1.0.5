<?php
session_start();

$valid = $_SESSION['connect'];

if(isset($valid)){
	if(strcmp("ok",$valid) != 0){
		header('location:../../login.php');
	}
}else{
	header('location:../../login.php');
}

$chemin = $_POST['amis']."/xmlfriends/verif.vrf";

$file = $chemin;
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
	header("location:../../xmlfriends/none.php");
}
else {
$sxml = simplexml_load_file('../../xmlfriends/amis.xml');
$cpt = $sxml->cpt;
$cpt = $cpt +1;
$sxml->cpt = $cpt;
$sxml->asXML('../../xmlfriends/amis.xml');

$texte = '<?xml version="1.0"?><amis></amis>';

$f = fopen("../../xmlfriends/outwait/".$cpt.".xml", "w");
fputs($f, $texte );
fclose($f);

$sxml = simplexml_load_file("../../xmlfriends/outwait/".$cpt.".xml");
$sxml->addChild("url",$_POST['amis']);
$sxml->addChild("date",date("d-m-Y"));
$sxml->asXML("../../xmlfriends/outwait/".$cpt.".xml");

$conf = simplexml_load_file ('../../config/config.xml');
$loc = $conf->loc;
$key = $conf->kpublic;

header("location:".$_POST['amis']."/friends/add.php?from=".$loc."&key=".$key."&cpt=".$cpt);
}

 ?> 