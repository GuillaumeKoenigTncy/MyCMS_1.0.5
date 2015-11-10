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
	
	$config = simplexml_load_file ("../config/config.xml");
	
	if(isset($_POST['upload'])){		
		$uploaddir = '../upload/';
		$uploadfile = $uploaddir . basename($_FILES['fichier']['name']);
		$filename =  basename($_FILES['fichier']['name']);		
		if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
			$typefile = explode('.',$filename);
			if($typefile[1] == "xml"){
				if (!file_exists('../xml/themes/'.$typefile[0])) {         // ** On vérifie que le dossier de l'année existe sinon créatio
					mkdir('../xml/themes/'.$typefile[0],0755, true);
					copy('../upload/'.$filename,'../xml/themes/'.$typefile[0].'/'.$filename);
					} else {    
					echo("Le theme existe deja");   
				}
				} else if($typefile[1] == "zip"){
				mkdir('../xml/themes/'.$typefile[0],0755, true);
				$zip = new ZipArchive;
				$res = $zip->open('../upload/'.$filename);
				if ($res === true) {
					$zip->extractTo('../xml/themes/'.$typefile[0].'/');
					$zip->close();
					echo 'woot!';
					} else {
					echo 'doh!';
				}
			}
			echo "Le fichier est valide, et a été téléchargé avec succès. Voici plus d'information";
			} else {
			echo "Attaque potentielle par téléchargement de fichiers. Voici plus d'informations";
		}
	}
	
	if(isset($_GET['export'])){
		if(file_exists("../upload/".$_GET['export'].'.zip')){
			unlink("../upload/".$_GET['export'].'.zip');
		}
		$dossier = '../xml/themes/'.$_GET['export']."/";	
		$zip = new ZipArchive();	
		if(is_dir($dossier)) {
			// On teste si le dossier existe, car sans ça le script risque de provoquer des erreurs.		
			if($zip->open("../upload/".$_GET['export'].'.zip', ZipArchive::CREATE) == true) {
				// Ouverture de l’archive réussie.				
				// Récupération des fichiers.
				$fichiers = scandir($dossier);
				// On enlève . et .. qui représentent le dossier courant et le dossier parent.
				unset($fichiers[0], $fichiers[1]);			
				foreach($fichiers as $f) {
					// On ajoute chaque fichier à l’archive en spécifiant l’argument optionnel.
					// Pour ne pas créer de dossier dans l’archive.					
					if(!$zip->addFile($dossier.$f, $f)){
						echo 'Impossible d&#039;ajouter &quot;'.$f.'&quot;.<br/>';
					}
				}				
				// On ferme l’archive.
				$zip->close();
			?>
			<script language="Javascript">
				window.open("../upload/<?php echo $_GET["export"]; ?>.zip");
				</script>
			<?php
				} else {
				// Erreur lors de l’ouverture.
				// On peut ajouter du code ici pour gérer les différentes erreurs.
				echo 'Erreur, impossible de créer l&#039;archive.';
			}
			} else {
			// Possibilité de créer le dossier avec mkdir().
			echo 'Le dossier &quot;upload/&quot; n&#039;existe pas.';
		} 	
	}
	
	
	if(isset($_GET['utiliser'])){
		$config->site->theme = $_GET['utiliser'];
		$config->asXML('../config/config.xml');
	}
	
	if(isset($_GET['supprimer'])){
		$dossier = '../xml/themes/'.$_GET['supprimer'].'/';
		deleteDirectory($dossier);	
	}
	
	$nomtheme = $config->site->theme;
	$theme = simplexml_load_file('../xml/themes/'.$nomtheme.'/'.$nomtheme.".xml"); 
	
	//*************** FONCTION REMOVE FOLDER *******************************//
	function deleteDirectory($dirPath) {
		if (is_dir($dirPath)) {
			$objects = scandir($dirPath);
			foreach ($objects as $object) {
				if ($object != "." && $object !="..") {
					if (filetype($dirPath . DIRECTORY_SEPARATOR . $object) == "dir") {
						deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
						} else {
						unlink($dirPath . DIRECTORY_SEPARATOR . $object);
					}
				}
			}
			reset($objects);
			rmdir($dirPath);
		}
		
	}
	
	//**********************FIN********************************///
	
?>

<link href="miniaturetheme/styleminiature.css" rel="stylesheet">

<h1 class="page-header">
    Gestion des thèmes
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
				
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Mon thème actuel
					</div>
                    <div class="panel-body">
                        <div class="row">
							<div class="col-lg-12">
								<div class="thumbnail">
									<div class="modal-body">
										<h2>
											<span style="color: rgb(149, 55, 53);">
												<?php echo($nomtheme); ?>
											</span>
										</h2>
										<hr class="primary">
										<div class="col-lg-4">
											<center><iframe src="miniaturetheme/indexminiature.php?theme=<?php echo $nomtheme;?>" align="middle" allowfullscreen  sandbox="allow-pointer-lock" scrolling="no" style="width:170px; height:180px;"  > </iframe></center>
										</div>
										<br/>
										<ul class="list-inline item-details">
											<li>Auteur:
												<strong><?php echo($theme->infos->auteur); ?>
												</strong>
											</li>
											<li>Version:
												<strong><?php echo($theme->infos->version); ?>
												</strong>
											</li>
										</ul>
										<br/>
										<a href="index.php?page=design"><button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrows"></i> Modifier</button></a>
										<br/>
										<br/>
										<a href="index.php?page=themes&export=<?php echo $nomtheme ;?>"><button type="button" class="btn btn-primary"  data-dismiss="modal"><i class="fa fa-share"></i> Exporter</button></a>
									</div>
									<br />
									<br />
									<br />
								</div>
							</div>
						</div><!-- /.row -->	   
					</div>
				</div>
				
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Importer un thème .zip ou .xml
					</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
											
                                            reader.onload = function (e) {
                                                $('#blah').attr('src', e.target.result);
											}
											
                                            reader.readAsDataURL(input.files[0]);
										}
									}
								</script>
                                <center>
                                    <table border="0" cellspacing="0" cellpadding="3">
                                        <tr>
										</tr>
                                        <tr>
                                            <td>  
                                                <form enctype="multipart/form-data" action="index.php?page=themes" method="post">
                                                    <input type="file" class="filestyle" data-buttonName="btn-primary" name="fichier" size="30" required> 
												</td>  
                                                <tr>
                                                    <p><div id="message">
														<div class="alert alert-warning alert-dismissible" role="alert">
															<p>Informartion : afin d'importer un thème extérieur, vous pouvez directement choisir le .xml ou importer le .zip | Si c'est une archive, merci de ne pas mettre le theme.xml dans un sous dossier mais à la racine.</p><br />
														<p>Formats acceptés : .xml , .zip</p></div>
													</div>
													</p>
													<td>
														<br />
														<br />
														<center>
															<button type="submit" class="btn btn-primary" name="upload" >Importer</button>
														</center>
													</td>
												</tr>
											</form>
										</tr>
									</table> 
								</center>
							</div>
						</div>
					</div>
				</div>   
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o fa-fw"></i> Mes thèmes
			</div>
			<div class="panel-body">
				<form action="index.php?page=gestmenu" method="post"> 
					<div class="row">
						<?php
							$path ='../xml/themes'; // '.' for current
							foreach (new DirectoryIterator($path) as $fichier) {
								if ($fichier->isDot()) continue;
								if ($fichier->isDir() && $fichier->getFilename() != $nomtheme ) {
									$theme = simplexml_load_file('../xml/themes/'.$fichier->getFilename().'/'.$fichier->getFilename().".xml");
									$dossier = '../xml/themes/'.$fichier->getFilename().'/';
									$nomTheme = $fichier->getFilename();
									$liensupp = "index.php?page=themes&supprimer=".$nomTheme; 
									echo '<div class="col-xs-6 col-md-3">';
									echo '<div class="thumbnail">';
									echo '<br/><center><iframe src="miniaturetheme/indexminiature.php?theme='.$nomTheme.'" align="middle" allowfullscreen  sandbox="allow-pointer-lock" scrolling="no" style="width:170px; height:180px;"  > </iframe></center>';
									echo '<div class="caption">';
									echo '<h3><center>'. $nomTheme .'</h3></center>';
									echo '<center><p><a href="index.php?page=themes&utiliser='.$nomTheme.'"<button type="submit"  class="btn btn-success success" name="Utiliser" ><i class="fa fa-arrow-up"></i> Utiliser</button></a> &nbsp;&nbsp;&nbsp; <a href="index.php?page=themes&export='.$nomTheme.'"<button type="submit"  class="btn btn-primary primary" name="Exporter" ><i class="fa fa-share"></i> Exporter</button></a><br /> <br /> <a data-href='.$liensupp.' data-file = '.$nomTheme.' data-toggle="modal" data-target="#confirm-delete" href="#" <button type="submit" onclick="suppression(\''.$nomTheme.'\');"  class="btn btn-danger delete" name="supprimer" ><i class="fa fa-times"></i> Supprimer</button></a></p></center>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								}
							}
						?>
					</div>
				</form>
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
                <p>Vous allez supprimer l'item  : <span class="namefile"></span>. Voulez-vous continuez?</p>
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
	
    function suppression(delfile) {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            var file = $(this).data('file');
            $('.namefile').html('<strong>' + delfile + '</strong>');
		})
	}
	
</script>

<script>
    function refuserToucheEntree(event) {
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