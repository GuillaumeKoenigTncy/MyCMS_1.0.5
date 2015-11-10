 <?php

$contenu = $_POST['contenu'];

$xml = simplexml_load_file("../../xml/fixes/module.xml");

$xml->description = $contenu; // Update

$xml->asXML("../../xml/fixes/module.xml"); // Save 
 
header("location:../index.php?page=modifmodule");

 
?>