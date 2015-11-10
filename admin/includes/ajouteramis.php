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
	
?>
<h1 class="page-header">
	Ajouter un amis
</h1>

<div id="page-wrapper">
	<div class="row">
		<div class="row">
			<div class="col-lg-12">
				<form action="scripts/scr_addamis.php" method="post">
					<div class="form-group">
						Adresse Web de votre Amis :
						<input type="url" class="form-control" id="amis" name="amis" value="" required>
					</div>
					<br />
					<input class="btn btn-success" type="submit" name="submit" value="Enregistrer">
				</form>
			</div>        
		</div>
	</div>
</div>