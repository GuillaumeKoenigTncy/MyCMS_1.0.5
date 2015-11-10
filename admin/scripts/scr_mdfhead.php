 <?php

$contenu = $_POST['contenu'];

$xml = simplexml_load_file("../../xml/fixes/header.xml");

$xml->contenu = $contenu; // Update

$xml->asXML("../../xml/fixes/header.xml"); // Save 
 
header("location:../index.php?page=modifheader");

 
?>