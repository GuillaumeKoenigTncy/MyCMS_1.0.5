<?php
	
	$ami=$_GET['sitedestination'];
	$cledest=$_GET['cledest'];
	$clesource=$_GET['clesource'];
	$sitedemande=$_GET['sitesource'];
	
	$sites= simplexml_load_file ('../xmlfriends/siteenamis.xml'); 
	$i=0;
	
	$site = null;
	$trouve = false;
	
	while($i<count($sites->site) && !$trouve)
	{
		if($sites->site[$i]==$sitedemande){
			$site=$sites->site[$i];
			$trouve=true;
			} else {
			$i++;
		}
	}
	
	$_GET['compteur']=intval($_GET['compteur'])+1;
	
	if($trouve) {
		$cles= simplexml_load_file ('../xmlfriends/clerecu.xml');
		$cle=$cles->cle[$i];
		if($cle==$clesource) {
			$keyconf= simplexml_load_file ('../config/config.xml');
			if($keyconf->kpublic==$cledest) {
				$news= simplexml_load_file ('../xmlfriends/news.xml');
				echo "vous êtes autorisé a accéder au contenu de votre ami <br/>";
				$new = (string) $news->new[count($news->new)-1];
				header("location:".$_GET['sitesource'].'/admin/index.php?page=listnews'."&new=".$new."&compteur=".$_GET['compteur']);
				} else {
				header("location:".$_GET['sitesource'].'/admin/index.php?page=listnews&compteur='.$_GET['compteur']);
			}
			} else {	
			header("location:".$_GET['sitesource'].'/admin/index.php?page=listnews&compteur='.$_GET['compteur']);
		}
		}else{
		header("location:".$_GET['sitesource'].'/admin/index.php?page=listnews&compteur='.$_GET['compteur']);
	}
	
?>