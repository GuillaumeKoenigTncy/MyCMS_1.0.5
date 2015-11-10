<?php
	
	session_start();
	
	$valid = $_SESSION['connect'];
	
	if(isset($valid)){
		if(strcmp("ok",$valid) != 0){
			header('location:login.php');
		}
		}else{
		header('location:login.php');
	}
	
	if(isset($_POST['submitinterne']) ) {
		if(empty($_POST['nomiteminterne']) || empty($_POST['choixpage'])) {
			echo'<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Attention!</strong>'." Vous n'avez pas entrez de nom !".'</div>';	
			}else{
			$name = htmlspecialchars($_POST['nomiteminterne']);
			$lien = htmlspecialchars($_POST['choixpage']);
			$lien = substr($lien, 0, -4);
			$compteur=0; 
			$dirname = '../xml/menu';
			$dir = opendir($dirname); 
			$temp=$name;
			
			while($file = readdir($dir)) {
				if($file != '.' && $file != '..' && !is_dir($dirname.$file)) {	
					$nomfichier=explode(".",$file,-1);
					$file=$nomfichier[0];
					
					if($name==$file){
						$compteur++;
						$name=$temp;
						
						$name=$name.'('.$compteur.')';
						rewinddir();
					}
				}
			}
			
			if($compteur==1){
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Un fichier du même nom existe! Le fichier aura pour nom ".$name.'.</div>';
				} else if($compteur>1){
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Plusieurs fichiers existent! Le fichier aura pour nom ".$name.'.</div>';
				} else{
				echo'<div class="alert alert-success alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Bravo! </strong>'."L'item ".$name.' a été ajouté au menu avec succès!</div>';	
			}
			
			$fp = fopen("../xml/menu/$name.xml","w+");
			closedir($dir); 
			
			$basics = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";
			$basics = $basics."<menu> <nom>$name</nom><lien>index.php?page=$lien</lien><page>$lien</page><type>Interne</type></menu>";
			
			fwrite($fp,$basics);		
			fclose($fp);
			
			$compteur=0;
			
			//************* On enregistre l'item dans le XML ****************** \
			
			$menuOrdre = simplexml_load_file("../xml/menu/menuOrdre.xml");    
			$menuOrdre->addChild("item",$name.".xml");
			$menuOrdre->asXML('../xml/menu/menuOrdre.xml');
		}	
		} else if(isset($_POST['submitexterne'])) {
		
		if(empty($_POST['nomitemexterne']) && empty($_POST['lienexterne'])) {
			
			echo'<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Attention!</strong>'." Vous n'avez pas entrez de nom !".'</div>';	
			} else{
			$name= htmlspecialchars($_POST['nomitemexterne']);
			$lienexterne = $_POST['lienexterne'];
			$compteur=0; 
			$dirname = '../xml/menu';
			$dir = opendir($dirname); 
			$temp=$name;
			
			while($file = readdir($dir)) {
				if($file != '.' && $file != '..' && !is_dir($dirname.$file)) {	
					$nomfichier=explode(".",$file,-1);
					$file=$nomfichier[0];
					
					if($name==$file){
						$compteur++;
						$name=$temp;
						
						$name=$name.'('.$compteur.')';
						rewinddir();
					}
				}
			}
			if($compteur==1){
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Un fichier du même nom existe! Le fichier aura pour nom ".$name.'.</div>';
				} else if($compteur>1){
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Plusieurs fichiers existent! Le fichier aura pour nom ".$name.'.</div>';
				} else{
				echo'<div class="alert alert-warning alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Bravo! </strong>'." Votre page ".$name.' a été créée avec succès!</div>';	
			}
			
			$fp = fopen("../xml/menu/$name.xml","w+");
			closedir($dir); 
			
			$basics = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>";
			$basics = $basics."<menu> <nom>$name</nom><lien>http://$lienexterne</lien><type>Externe</type></menu>";
			
			fwrite($fp,$basics);		
			fclose($fp);
			
			$compteur=0;
			
			//************* On enregistre l'item dans le XML ****************** \
			
			$menuOrdre = simplexml_load_file("../xml/menu/menuOrdre.xml");    
			$menuOrdre->addChild("item",$name.".xml");
			$menuOrdre->asXML('../xml/menu/menuOrdre.xml');
		}	
		} else if(isset($_POST['submitOrdre']) ) {
		
		$dirname = '../xml/menu';
		$dir = opendir($dirname); 
		$arraymenu = array();
		$arraynum = array();
		
		while($file = readdir($dir)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file)) {	
				
				$nompagenopoint = explode(".", $file);
				
				if (isset($_POST[$nompagenopoint[0]])) {
					
					$numordre = $_POST[$nompagenopoint[0]];
					
					array_push($arraymenu,$file); 
					array_push($arraynum,$numordre);
				}
			}
		}
		
		$j=count($arraynum)-1;
		$h=0;
		$menuOrdonne = $arraynum;
		$menuNom = $arraymenu;
		$echange=true;
		
		while($j>0 && $echange) {
			$echange=false;
			for($h=0;$h<$j;$h++) {
				if( $menuOrdonne[$h] >$menuOrdonne[$h+1]) {
					
					$tmp=$menuOrdonne[$h];
					$menuOrdonne[$h]=$menuOrdonne[$h+1];
					$menuOrdonne[$h+1]=$tmp;
					$echange=true;
					
					$tmp=$menuNom[$h];
					$menuNom[$h]=$menuNom[$h+1];
					$menuNom[$h+1]=$tmp;
					
				}
			}
			
			$j--;
		}
		
		//******************** Enregistrement du fichier ordonnée du MENU **********************//
		
		unlink('../xml/menu/menuOrdre.xml');
		
		$xml_menuOrdre = fopen('../xml/menu/menuOrdre.xml', 'w');
		
		$contenu_base = '<?xml version="1.0" encoding="ISO-8859-1"?>
		<items>
		</items>';
		
		fputs($xml_menuOrdre, $contenu_base);
		
		fclose($xml_menuOrdre);
		
		//chmod('../xml/menu/menuOrdre.xml', 0644);
		
		$menuOrdre = simplexml_load_file("../xml/menu/menuOrdre.xml");
		
		for($i=0;$i<count($menuOrdonne);$i++){
			$menuOrdre->addChild("item",$menuNom[$i]);
		}
		
		$menuOrdre->asXML('../xml/menu/menuOrdre.xml');	
	}
	
	if(isset($_GET['numero'])) {
		
		$menuOrdre = simplexml_load_file("../xml/menu/menuOrdre.xml");
		
		$numero = $_GET['numero'];
		
		unset($menuOrdre->item[$numero-1]);
		
		$menuOrdre->asXML('../xml/menu/menuOrdre.xml');
		
		unlink("../xml/menu/".$_GET['item']);
	}
	//*********************************** FIN PARTIE SUBMIT *******************************************************************//
?> 

<h1 class="page-header">
    Gestion du menu
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <form action="index.php?page=gestmenu" method="post"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ajouter un item au menu
						</div>
                        <div class="panel-body">
                            <div class="row">
                                <ul class="nav nav-tabs"> 
                                    <li class="active">
                                        <a href="#home" data-toggle="tab">Lien interne</a>
									</li>
                                    <li><a href="#other" data-toggle="tab">Lien externe</a></li>
								</ul><br /><br />
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">Nom :</span>
                                                <input type="text" class="form-control" placeholder="Nom de l'item..." aria-describedby="basic-addon1" name="nomiteminterne" onkeypress="refuserToucheEntree(event);">
											</div>
										</div><!-- /.col-lg-6 -->
                                        <div class="col-lg-5">
											
                                            <select name="choixpage" class="form-control">           
                                                <?php
													$dirname = '../xml/contenu';
													$dir = opendir($dirname);
													$i=0;
													while($file = readdir($dir)) {
														if($file != '.' && $file != '..' ){
															echo '<option>' . $file . '</option>' ;
														}
													}
												?>
											</select>
										</div><!-- /.col-lg-6 -->
                                        <input class="btn btn-success" type="submit" name="submitinterne" value="Ajouter" >
									</div>
                                    <div id="other" class="tab-pane">
                                        <div class="col-lg-4">
											
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">Nom :</span>
                                                <input type="text" class="form-control" placeholder="Nom de l'item..." aria-describedby="basic-addon1" name="nomitemexterne" onkeypress="refuserToucheEntree(event);">
											</div>
											
											
										</div><!-- /.col-lg-6 -->
                                        <div class="col-lg-5">                                    
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">http://</span>
                                                <input type="text" class="form-control" placeholder="www.exemple.fr" aria-describedby="basic-addon1" name="lienexterne" onkeypress="refuserToucheEntree(event);">
											</div>
										</div><!-- /.col-lg-6 -->
										
                                        <input class="btn btn-success" type="submit" name="submitexterne" value="Ajouter" >
									</div>
								</div>
							</div><!-- /.row -->	   
						</div>
					</div>
				</form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Mon menu
					</div>
                    <div class="panel-body">
                        <form action="index.php?page=gestmenu" method="post"> 
                            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Lien vers</th>
                                        <th>Type</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                        <th>Ordre</th>
									</tr>
								</thead>
                                <tbody>
                                    <?php
										
										// ***************** GESTION AFFICHAGE DU MENU ORDONNEE ********************* //
										$fichierOrdre = simplexml_load_file ("../xml/menu/menuOrdre.xml");
										
										$i=1;
										foreach($fichierOrdre as $item){
											
											$itemcharger = simplexml_load_file ("../xml/menu/$item");
											
											$nomitem= $itemcharger->nom;
											$lien = $itemcharger->lien;
											$type = $itemcharger->type;
											$nompagenopoint = explode(".", $item);
											
											echo '<tr>';
											echo '<td align=center>' . $nomitem . '</td>' ;
											echo '<td>'. $lien .'</td>';
											echo '<td>'. $type .'</td>';
											echo '<td  align=center><a href="index.php?page=modifmenu&item='.$item.'&type='.$type.'"<button type="submit"  class="btn btn-warning warning" name="modifier" >Modifier</button></a></td>' ;
											$lien = "index.php?page=gestmenu&item=".$item."&numero=".$i;
											echo '<td  align=center><a data-href='.$lien.' data-file = '.$item.' data-toggle="modal" data-target="#confirm-delete" href="#" <button type="submit" onclick="suppression(\''.$nomitem.'\');"  class="btn btn-danger delete" name="supprimer" >Supprimer</button></a></td>';
											echo '<td align=center> <input type="text" name="'. $nompagenopoint[0].'" value="'.$i.'" pattern="\d+" /></td>';
											echo '</tr>';
											
											$i++;
										}
										
									?>
								</tbody>
							</table>
                            <div style="text-align: right;"> <input class="btn btn-primary" type="submit" name="submitOrdre" value="Enregistrer"></div>
						</form>
					</div>
				</div>
			</div>        
		</div>
	</div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
			</div>
			
            <div class="modal-body">
                <p>Vous allez supprimer l'item : <span id="namefile"></span>. Voulez-vous continuez ?</p>
				<p class="debug-url"></p>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<a href="#" class="btn btn-danger danger">Supprimer</a>
			</div>
			
		</div>
	</div>
</div>

<script>
    function suppression(nom) {
        $('#confirm-delete').on('show.bs.modal', function(e) {
			$('#namefile').html('<strong>' + nom + '</strong>');
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            var file = $(this).data('file');
		})
	}
	
</script>

<script>
    function refuserToucheEntree(event){
        // Compatibilité IE / Firefox
        if(!event && window.event) {
            event = window.event;
		}
        // IE
        if(event.keyCode == 13) {
            event.returnValue = false;
            event.cancelBubble = true;
		}
        // DOM
        if(event.which == 13) {
            event.preventDefault();
            event.stopPropagation();
		}
	}
</script>