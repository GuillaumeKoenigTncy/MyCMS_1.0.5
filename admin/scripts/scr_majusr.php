<?php

$conf = $_POST['conf'];
$hidden = $_POST['hidden'];

$pseudo = $_POST['pseudo'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp']; 

if(strcmp(sha1($conf),$hidden) == 0){

$config = simplexml_load_file("../../config/config.xml");

$config->utilisateur->pseudo = $pseudo; 
 
$config->utilisateur->mdp = sha1($mdp);

$config->utilisateur->mail = $mail;

$config->asXML("../../config/config.xml"); // Save 

}

header("location:../index.php?page=utilisateurs");

?>