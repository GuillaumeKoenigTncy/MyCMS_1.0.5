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
	
	$config = simplexml_load_file('../config/config.xml');
	
	$pseudo = $config->utilisateur->pseudo;
	$mail = $config->utilisateur->email;
	$mdp = $config->utilisateur->mdp;
	
?>

<h1 class="page-header">
	Configuration de l'administrateur
</h1>

<div id="page-wrapper">
	<div class="row">
		<div class="row">
			<div class="col-lg-12">
				<form action="scripts/scr_majusr.php" method="post">
					<div class="form-group">
						Identifiant de l'administrateur :
						<input type="text" class="form-control" id="pseudo" name="pseudo" value="<?php echo($pseudo);?>" required>
					</div>
					<br />
					<div class="form-group">
						Mail de l'administrateur :
						<input type="main" class="form-control" id="mail" name="mail" value="<?php echo($mail);?>" required>
					</div>
					<br />
					<div class="form-group">
						Mot de passe de l'administrateur :
						<input type="password" class="form-control" id="mdp" name="mdp" required>
					</div>
					<br />
					<div class="form-group">
						Mot de passe de confirmation actuel :
						<input type="password" class="form-control" id="conf" name="conf" required>
					</div>
					
					<input type="hidden" name="hidden" value="<?php echo($mdp);?>">
					
					<input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
				</form>
			</div>        
		</div>
	</div>
</div>