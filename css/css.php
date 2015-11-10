<?php
    session_start();
    header('content-type: text/css');//Permet de déclarer le fichier comme étant du css
	$config = simplexml_load_file ('../config/config.xml');



	
	$theme = simplexml_load_file ('../xml/themes/'.$config->site->theme.'/'. $config->site->theme.'.xml'); // on va chercher dans le fichier config le nom du theme qui est actuelement utilisé
	


	// couleur du body 
	$backcolor=$theme->body->background_color;
	echo("body{ background-color:".$backcolor.";}");

	$backcolor=$theme->well->background_color;
	$color=$theme->well->color;
	$family=$theme->well->font_family;
	$size=$theme->well->font_size;

	echo(".well{ background-color:".$backcolor."; color:".$color."; font-family:".$family.";}");
	

	$color=$theme->h1->color;
	$family=$theme->h1->font_family;
	$size=$theme->h1->font_size;

	echo("h1{ color:".$color."; font-family:".$family.";font-size:".$size.";}");


	$color=$theme->a->color;
	$family=$theme->a->font_family;
	$size=$theme->a->font_size;

	echo("a{ color:".$color."; font-family:".$family.";font-size:".$size.";}");






?>