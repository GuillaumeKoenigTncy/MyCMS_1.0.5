<?php

$titre = $_POST['titre'];
$description = $_POST['description'];

$config = simplexml_load_file('../../config/config.xml');

$config->site->titre = $titre;
$config->site->description= $description;

$config->asXML('../../config/config.xml');

header("location:../base.php?page=config2"); 

?>