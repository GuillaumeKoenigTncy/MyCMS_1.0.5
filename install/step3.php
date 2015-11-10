<?php
	
	session_start();
	
	$titre = $_SESSION['titre_site'];
	$description = $_SESSION['desc_site'];
	$pseudo = $_SESSION['pseudo'];
	$mail = $_SESSION['mail'];
	$mdp = sha1($_SESSION['mdp']);
	
	$empmod = $_SESSION['group2'];
	$empmen = $_SESSION['group1'];
	$header = $_SESSION['group3'];
	$footer = $_SESSION['group4'];
	
	//print_r($_SESSION);
	
	if (isset($_POST['submit2'])){
	
		if(!(file_exists('../config')) && !(file_exists('../xml'))){
		
			if(!(mkdir("../config", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>config</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xml", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>xml</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xml/contenu", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>contenu</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xml/menu", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>menu</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xml/fixes", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>fixe</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xml/themes", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>themes</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xmlfriends", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
				}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>xml amis</strong> créé avec succès !</p></div>'; 
			}

			if(!(mkdir("../xmlfriends/amis", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
				}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>amis</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xmlfriends/inwait", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
				}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>amis entrants</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../xmlfriends/outwait", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
				}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>amis sortants</strong> créé avec succès !</p></div>'; 
			}
			
			if(!(mkdir("../upload", 0755))){
				echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
				}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>upload</strong> créé avec succès !</p></div>'; 
			}

			/* AMIS amis*/
			
			$ord_file = fopen('../xmlfriends/news.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
				}
			
			$contenu_base = 
'<?xml version="1.0"?>
<news>
	<cpt>0</cpt>
</news>'			
;

			
			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xmlfriends/amis.xml", 0644);
			
			/* AMIS amis*/
			
			$ord_file = fopen('../xmlfriends/amis.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
				}
			
			$contenu_base = 
'<?xml version="1.0"?>
<amis>
	<cpt>0</cpt>
</amis>'			
;

			
			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xmlfriends/amis.xml", 0644);
			
			/* AMIS clerecu*/
			
			$ord_file = fopen('../xmlfriends/clerecu.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
				}
			
			$contenu_base = 
'<?xml version="1.0"?>
<cles>
</cles>'			
;
			
			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xmlfriends/clerecu.xml", 0644);
			
			/* AMIS siteenamis*/
			
			$ord_file = fopen('../xmlfriends/siteenamis.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
				}
			
			$contenu_base = 
'<?xml version="1.0"?>
<url>
</url>'			
;
			
			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xmlfriends/siteenamis.xml", 0644);
			
			/* Menu Ordre */
			
			$ord_file = fopen('../xml/menu/menuOrdre.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0" ?>
<items>
	<item>home.xml</item>
</items>'			
;

			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xml/menu/menuOrdre.xml", 0644);
			
			/* Menu home */
			
			$ord_file = fopen('../xml/menu/home.xml', 'w');
			
			if($ord_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0" encoding="ISO-8859-1"?>
<menu>
	<nom>Accueil</nom>
	<lien>index.php?page=default</lien>
	<page>default</page>
	<type>Interne</type>
</menu>'			
;

			fputs($ord_file, $contenu_base);
			
			fclose($ord_file);
			
			chmod("../xml/menu/home.xml", 0644);
			
			/* Page de défaut */
			
			$def_file = fopen('../xml/contenu/default.xml', 'w');
			
			if($def_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0"?>
<contenu>
	<article>Merci d\'avoir utilisé MyCMS !</article>
	<titre>Page par défaut</titre>
</contenu>
'			
;

			fputs($def_file, $contenu_base);
			
			fclose($def_file);
			
			chmod("../xml/contenu/default.xml", 0644);
			
			/* Mémo */
			
			$memo_file = fopen('../xml/note.xml', 'w');
			
			if($memo_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0"?>
<contenu>
	<memo>Une note ...</memo>
</contenu>
'			
;

			fputs($memo_file, $contenu_base);
			
			fclose($memo_file);
			
			chmod("../xml/note", 0644);
			
			/* Fixes FOOTER */
			
			$fixf_file = fopen('../xml/fixes/footer.xml', 'w');
			
			if($fixf_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0"?>
<footer>
	<contenu> Pied de page </contenu>
</footer>
'			
			;

			fputs($fixf_file, $contenu_base);
			
			fclose($fixf_file);
			
			
			chmod("../xml/fixes/footer.xml", 0644);
			
			/* Fixes HEADER */
			
			$fixf_file = fopen('../xml/fixes/header.xml', 'w');
			
			if($fixf_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0"?>
<header>
	<contenu> Haut de page </contenu>
</header>
'			
			;

			fputs($fixf_file, $contenu_base);
			
			fclose($fixf_file);
			
			chmod("../xml/fixes/header.xml", 0644);
			
			/* Fixes MODULE */
			
			$fixf_file = fopen('../xml/fixes/module.xml', 'w');
			
			if($fixf_file == false){
				echo "<p>Fichier non créé !</p>";
			}
			
			$contenu_base = 
'<?xml version="1.0"?>
<module>
	<description> Module </description>
</module>
'			
			;

			fputs($fixf_file, $contenu_base);
			
			fclose($fixf_file);
			
			chmod("../xml/fixes/module.xml", 0644);
			
			/* Config */
			
			$conf_file = fopen('../config/config.xml', 'w');
				
			if($conf_file == false){
				echo "<p>Fichier non créé !</p>";
			}
				
			$contenu_base = 
'<?xml version="1.0"?>
<config>
    <site>
        <titre>titre</titre>
        <description>desc</description>
		<accueil>default.xml</accueil>
		<theme>default</theme>
    </site>
    <utilisateur>
        <pseudo>admin</pseudo>
        <email>email</email>
        <mdp>21232f297a57a5a743894a0e4a801fc3</mdp>
    </utilisateur>
	<loc>loc</loc>
	<kprivee>key1</kprivee>
	<kpublic>key2</kpublic>
	<amis>oui</amis>
</config>
'
			;
				
			fputs($conf_file, $contenu_base);
			
			fclose($conf_file);
			
			chmod("../config/config.xml", 0644);
			
			/* Positionnement */
			
						
			if(!(mkdir("../xml/themes/default", 0755))){
					echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue lors de la création d\'un dossier ! <strong>Contactez votre administrateur</strong></p></div>'; 
			}else{
				echo '<div class="alert alert-success" role="alert"><p>Dossier <strong>default</strong> créé avec succès !</p></div>'; 
			}
			
			$conf_file = fopen('../xml/themes/default/default.xml', 'w');
				
			if($conf_file == false){
				echo "<p>Fichier non créé !</p>";
			}
				
			$contenu_base = 
'<?xml version="1.0"?>
<root>
	<infos>
		<auteur>My CMS </auteur>
		<version>1.0</version>
		<miniature>my_CMS.png</miniature>
	</infos>
	<positionnement>
		<menu>top</menu>   
		<sidebarre>left</sidebarre> 
		<head>true</head>
		<foot>true</foot>
	</positionnement>
	<body>
		<background_color>#EFE4B0</background_color>
	</body>
	<well>
		<background_color>#ADA1A1</background_color>
		<color>#C9C9C9</color>
		<font_family>Verdanna</font_family>
		<font_size>30px</font_size>		
	</well>
	<h1>
		<color>#7F7F7F</color>
		<font_family>Comic Sans MS</font_family>
		<font_size>22px</font_size>	
	</h1>
	<a>
		<color>#00A2E8</color>
		<font_family>Arial</font_family>
		<font_size>16px</font_size>	
	</a>
</root>
'
			;
				
			fputs($conf_file, $contenu_base);
			
			fclose($conf_file);
			
			chmod("../xml/themes/default/default.xml", 0644);
				
		}
	}else{
		echo '<div class="alert alert-info" role="alert"><p>Les dossiers sont dejà présent, ils n\'ont pas été créés!</p></div>'; 
	}

	$config = simplexml_load_file('../xml/themes/default/default.xml');

	$config->positionnement->foot = $footer;
	$config->positionnement->head = $header;
	$config->positionnement->sidebarre = $empmod;
	$config->positionnement->menu = $empmen;
	
	if($config->asXml('../xml/themes/default/default.xml')){
		echo '
		
		<div class="alert alert-success" role="alert"><p>Vos préférences ont été sauvegardées  !</p></div>'; 

		$lock_file = fopen('lock', 'w');

		fclose($lock_file);

	} else {
		echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue ! <strong>Contactez votre administrateur</strong></p></div><br /><br /><br />'; 
	}
	
	$config = simplexml_load_file('../config/config.xml');

	$config->site->titre = $titre;
	$config->site->description= $description;

	$config->utilisateur->pseudo= $pseudo;
	$config->utilisateur->mdp = $mdp;
	$config->utilisateur->email = $mail;

	$loc = $_SERVER['HTTP_HOST'].dirname(dirname($_SERVER['REQUEST_URI']));
	$prk = "TODO";
	$puk = $prk.$loc;
	
		if($_SERVER['HTTPS'] == 'on' ){
			$loc = "https://".$loc;
		}else{
			$loc = "http://".$loc;
		}
	
	$config->loc = $loc;
	$config->kprivee = $prk;
	$config->kpublic = sha1($puk);

	if($config->asXml('../config/config.xml')){
		echo '
		
		<div class="alert alert-success" role="alert"><p>Vos configurations ont été sauvegardées ! Le site est fonctionnel !</p>
		
		<p>Vous pouvez dès maintenant configurer ou visiter votre site ici : <a href="../index.php">VOIR MON SITE</a></p>
		
		</div>
		
		<div class="alert alert-info" role="alert"><p>Votre site n\'est pas encore totallement personalisé ! Vous pouvez encore le modifer avec votre <strong>tableau de bord</strong>.</p>
		
		<p>Accéder à votre tableau de bord : <a href="../admin/index.php">ICI</a></p>
		
		</div>
		
		<br />
		
		<h1 class="centered">Merci d\'avoir utiliser MyCMS !</h1>
		
		<br /><br />
		
		<style>
		
		.centered
		{
		text-align:center;
		}
		
		</style>'; 

		$lock_file = fopen('lock', 'w');

		fclose($lock_file);

	} else {
		echo '<div class="alert alert-danger" role="alert"><p>Une erreur est survenue ! <strong>Contactez votre administrateur</strong></p></div><br /><br /><br />'; 
	}

?>