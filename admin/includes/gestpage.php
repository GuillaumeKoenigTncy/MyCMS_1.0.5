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
	
	if(isset($_POST['pageaccueil']) ) {
		
		$config = simplexml_load_file ("../config/config.xml");
		
		$config->site->accueil=$_POST['pageaccueil'];
		
		# Sauvegarde du XML
		$config->asXML('../config/config.xml');
	}
	
	$config = simplexml_load_file ("../config/config.xml");
	$pageaccueil = $config->site->accueil;
	
?>
<!DOCTYPE html>

<h1 class="page-header">
    Gestion des pages
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Gestion des pages
					</div>
                    <div class="panel-body">
                        <div style="margin-bottom:20px;text-align: right;"><a class="btn btn-primary" href="index.php?page=creerpage" role="button">Ajouter une page</a></div>
                        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Page d'accueil</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
								</tr>
							</thead>
                            <tbody>
                                <?php
									
									#----- Ouverture + lecture de toutes les pages présentes -----#
									$dirname = '../xml/contenu';
									$dir = opendir($dirname);
									$i=0;
									while($file = readdir($dir)) {
										if($file != '.' && $file != '..' ){
											$contenu= simplexml_load_file ("../xml/contenu/".$file."");
											$titrepage = $contenu->titre;
											
											echo '<tr>';
											echo '<td align=center>' . $file . '</td>' ;
											echo '<td><center>'.$titrepage.'</center></td>';
											echo "<form action='index.php?page=gestpage' method='POST'>";
											if ($file == $pageaccueil) // <--- ICI lecture du nom de la page par défaut dans un fichier XML (CONFIG acutllement)
											{
												echo'<td><center><input type="checkbox" checked="checked" onclick=this.form.submit(); name="pageaccueil" id="pageaccueil" value="'.$file.'"></td></center>';
											}
											else {
												echo'<td><center><input type="checkbox"  name="pageaccueil" id="pageaccueil" onclick="this.form.submit();" value="'.$file.'"></td></center>'; 
											}
											echo"</form>";
											echo '<td  align=center><a href="index.php?page=modifpage&name='.$file.'"><button type="submit" class="btn btn-warning" name="modifier" >Modifier</button></a></td>' ;
											$lien = "scripts/scr_suppage.php?suppage=".$file;
											echo '<td  align=center><a data-href='.$lien.' data-file = '.$file.' data-toggle="modal" data-target="#confirm-delete" href="#" <button type="submit" onclick="suppression(\''.$file.'\');"  class="btn btn-danger delete" name="supprimer" >Supprimer</button></a></td>' ;
											echo '</tr>';
										}
									}
								?>
								
							</tbody>
						</table>
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
                <p>Vous allez supprimer la page : <p class="namefile"></p></p>
				<p>Voulez-vous continuez?</p>
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
    function suppression(test) {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
            var file = $(this).data('file');
            $('.namefile').html('<strong>' + test + '</strong>');
		})
	}
</script>