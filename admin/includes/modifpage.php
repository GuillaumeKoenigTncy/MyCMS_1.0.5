<?php
	
	session_start();
	
	$valid = $_SESSION['connect'];
	
	if(isset($valid)){
		if(strcmp("ok",$valid) != 0){
			header('location:../login.php');
		}
		}else{
		header('location:../login.php');
	}
	
	$name = $_GET['name'];
	
	$xml = simplexml_load_file("../xml/contenu/".$name);
	$titre_p = $xml->titre;
	$contenu = $xml->article; 
	
?>			

<h1 class="page-header">
	Modification de la page
</h1>

<div id="page-wrapper">
	<div class="row">
		<div class="row">
			<div class="col-lg-12">
				<form action="scripts/scr_mdfcont.php" method="post">
					<p>Titre de la page : </p>
					<input type="text" class="form-control" name="titre" placeholder="Titre de la page" <?php echo 'value = "' . $titre_p . '"';?> required>
					<br />
					<center>
						<textarea cols="80" class="ckeditor" id="editeur" name="contenu" rows="10">	<?php echo($contenu);?></textarea>
						<script type="text/javascript" src="../lib/ckeditor/ckeditor.js"></script>   <br/> <br/>   
					</center>
					<input type="hidden" name="namepage" value="<?php echo($name);?>"> 
					<input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
				</form>   
				
			</div>
		</div>
	</div>
</div>