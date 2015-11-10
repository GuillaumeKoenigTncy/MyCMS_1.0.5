<?php
    session_start();
    header('content-type: text/css');//Permet de déclarer le fichier comme étant du css


	$config = simplexml_load_file ('../config/config.xml');
    $theme = simplexml_load_file ('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");

	//BACKGROUND WELL + CADRE CENTRE
	$main=" .background{background-color:";
	echo($main);
	$background= $theme->well->background_color;
	echo($background);
		$main="}";
	echo($main);
	
	//affichage de la deuxieme div
	$main=" .fontcolor{background-color:";
	echo($main);
	$fontcolor=$theme->well->color;
	echo($fontcolor);

	$main="}";
	echo($main);
	
	
	//affichage de la troisième div
	$main=" .colortitle{background-color:";
	echo($main);
	$colortitle=$theme->h1->color;
	echo($colortitle);

			$main="}";
	echo($main);
	
	
	// BACKGROUND GENERAL
	$main=" .colorbody{background-color:";
	echo($main);
	$colorbody=$theme->body->background_color;
	echo($colorbody);
	
	$main="}";
	echo($main);
	
		//affichage de la cinquième div
	$main=" .colorlink{background-color:";
	echo($main);
	$colorlink= $theme->a->color;
	echo($colorlink);

	$main="}";
	echo($main);

?>