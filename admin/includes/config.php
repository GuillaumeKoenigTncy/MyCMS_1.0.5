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
	
	if(isset($_POST['submit'])){
		
		$titre = $_POST['titre'];
		$description = $_POST['description'];
		
		# Chargement du XML 
		$config = simplexml_load_file('../config/config.xml');
		$config->site->titre = $titre;
		$config->site->description= $description;
		
		# Sauvegarde du XML
		$config->asXML('../config/config.xml');
	}
	
	#----- Chargement du site -----#
	$config = simplexml_load_file('../config/config.xml');
	$titre = $config->site->titre;
	$description = $config->site->description;
	
?>

<h1 class="page-header">
	Configuration générale
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
				
			</div>
		</div>        
	</div>
</div>					

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-bar-chart-o fa-fw"></i> Configuraton générale
					</div>
					<div class="panel-body">
						<form action="index.php?page=config" method="post">
							<div class="form-group">
								Titre de votre site :
								<input type="text" class="form-control" id="titre" name="titre" value="<?php echo($titre);?>">
							</div>
							
							<div class="form-group">
								Description de votre site :
								<input type="text" class="form-control" id="description" name="description" value="<?php echo($description);?>">
							</div>
							
							<input style="margin-top:10px;" class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
						</form>
					</div>
				</div>
			</div>
		</div>        
	</div>
</div>		

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <form action="../install/reinstall.php" method="post"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ré-installation
						</div>
                        <div class="panel-body">
							<div class="alert alert-danger">
								<center>
									Attention, vous pouvez ré-installer votre site veb mais tous vos paramètres seront effacés !
								</center>
							</div>
                            <input style="margin-top:10px;" class="btn btn-danger" type="submit" name="submit" value="Ré-installer">
						</div>
					</div>
				</form>
			</div>
		</div>        
	</div>
</div>					