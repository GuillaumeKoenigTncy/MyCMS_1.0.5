 <?php

$contenu = $_POST['contenu'];

$xml = simplexml_load_file("../../xml/fixes/footer.xml");

$xml->contenu = $contenu; // Update

$xml->asXML("../../xml/fixes/footer.xml"); // Save 
 
header("location:../index.php?page=modiffooter");
 

?> 