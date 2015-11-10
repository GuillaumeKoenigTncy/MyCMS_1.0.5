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
	
	if(isset ($_GET['name'])){
		$name = $_GET['name'];
	}
	
	$xml = simplexml_load_file("../xml/fixes/header.xml");
	
	$contenu= $xml->contenu; 
	
?>			 

<h1 class="page-header">
	Modification de l'en-tête
</h1>

<div id="page-wrapper">
	<div class="row">
		<div class="row">
			<div class="col-lg-12">
				<form action="scripts/scr_mdfhead.php" method="post">
					<center>
						<textarea cols="80" class="ckeditor" id="editeur" name="contenu" rows="10">	<?php echo($contenu);?></textarea>
						<script type="text/javascript" src="../lib/ckeditor/ckeditor.js"></script>   <br/> <br/>   
					</center>
					<input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
				</form>   
			</div>
		</div>
	</div>
</div>