<?php

$namepage = $_POST['namepage'];

$contenu = $_POST['contenu'];
$titrp = $_POST['titre'];

$xml = simplexml_load_file("../../xml/contenu/$namepage");

$xml->article = $contenu; // Update
$xml->titre = $titrp; // Update

$xml->asXML("../../xml/contenu/$namepage"); // Save 
 
header("location:../index.php?page=modifpage&name=$namepage");


?>