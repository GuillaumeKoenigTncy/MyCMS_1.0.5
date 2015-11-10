<?php
	
	$loc= simplexml_load_file ('../config/config.xml');
	$sitesource=$loc->loc;
	
	$keyconf= simplexml_load_file ('../config/config.xml');
	$clesource=$keyconf->kpublic;
	
	$keys= simplexml_load_file ('../xmlfriends/clerecu.xml');
	
	$compteur=0;
	$listeAmis=simplexml_load_file('../xmlfriends/siteenamis.xml'); 
	
	$tabnews = array();
	$tabamis = array();
	
	if(isset($_GET['compteur'])) {
		$compteur=intval($_GET['compteur']);
		
		if($compteur >0  ) {
			if(file_exists('../xmlfriends/newsTemp.xml')) {
				$news=simplexml_load_file('../xmlfriends/newsTemp.xml');
				} else {
				$news = new SimpleXMLElement("<news></news>");
			}
			
			if(isset($_GET['new'])) {
				$newsrecu = $_GET['new'];
				} else {
				$newsrecu="";
			}
			
			$new = $news->addChild('new',$newsrecu);
			file_put_contents('../xmlfriends/newsTemp.xml',  $news->asXML());
		}
	}
	
	if($compteur < count($listeAmis->site)) {
		echo "<script language='Javascript'>
		document.location.replace('".$listeAmis->site[$compteur]."/friends/plung.php?cledest=".$keys->cle[$compteur]."&sitedestination=".$listeAmis->site[$compteur]."&clesource=".$clesource."&sitesource=".$sitesource . "&compteur=".$compteur."')
		</script>";
		} else {
		if(file_exists('../xmlfriends/newsTemp.xml')) {
			$news=simplexml_load_file('../xmlfriends/newsTemp.xml');
			for($i=0;$i<count($news->new);$i++) {
				$tabnews[$i] = $news->new[$i];
				$tabamis[$i] = $listeAmis->site[$i];
			}
			unlink('../xmlfriends/newsTemp.xml');
		}   
	}
?>

<h1 class="page-header">
    Votre actualité
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Votre fil d'actualité</div>
                    <div class="panel-body">
                        <?php
							$i = 0;
							$tot = 0;
							foreach ($tabnews as $valuenews) {
								if($valuenews != ""){
									echo ' <div style="text-align: left;"><span style="font-weight: bold;">Nouveauté du site :</span>'.$tabamis[$i].' : </div>';
									echo ' <div style="text-align: left;margin-left:25px;">'.$valuenews.'</div>' ;
									echo ' <hr style="width: 100%; height: 2px;">';
									$tot = $tot + 1;
								}
								$i++;
							}
							if($tot == 0){
									echo "Aucune actualités à afficher !";
								}
							
						?>
                        <div style="text-align: right;"><a href="index.php?page=listnews" class="btn btn-success success">Actualiser</a></div>
					</div>
				</div>
			</div>        
		</div>
	</div>
</div>
