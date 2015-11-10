<?php

$name=htmlspecialchars($_GET['suppage']);

if(file_exists ("../../xml/contenu/$name")){
	
}
else{
	echo "Erreur, ce fichier n'existe pas";
}

$efface=unlink("../../xml/contenu/$name");

if ($efface==FALSE)
{
	echo "Erreur, Une erreur est survenu lors de la suppression";
}
else{
	echo "Fichier supprimé";
}
header("location:../index.php?page=gestpage");

?> 

