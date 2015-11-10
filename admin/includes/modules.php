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
	
	$config = simplexml_load_file ('../config/config.xml');
	$theme = simplexml_load_file ('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
	
	if(isset($_POST['submit'])){
		if(isset  ($_POST['group1'])){
			$theme->positionnement->menu = $_POST['group1'];
		}
		if(isset  ($_POST['group2'])){
			$theme->positionnement->sidebarre = $_POST['group2'];
		}
		if(isset  ($_POST['group3'])){
			$theme->positionnement->head = $_POST['group3'];
		}
		if(isset  ($_POST['group4'])){
			$theme->positionnement->foot = $_POST['group4'];
		}
		$theme->asXML('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
	}
	
	$menupos = $theme->positionnement->menu;
	$mengauche ="" ; $mendroite="" ;$menhaut="" ; $menfalse="";
	
	if($menupos == "left"){
		$mengauche = "checked";
		} else if($menupos == "right"){
		$mendroite ="checked";
		} else if($menupos == "top"){
		$menhaut ="checked";
		} else if ($menupos == "false"){
		$menfalse ="checked";
	}
	
	$modpos = $theme->positionnement->sidebarre;
	$modgauche ="" ; $moddroite="" ;$modhaut="" ; $modfalse="";
	
	if($modpos == "left"){
		$modgauche = "checked";
		} else if($modpos == "right"){
		$moddroite ="checked";
		} else if($modpos == "top"){
		$modhaut ="checked";
		} else if ($modpos == "false"){
		$modfalse ="checked";
	}
	
	$headpos = $theme->positionnement->head;
	$headtrue="" ; $headfalse="";
	
	if($headpos == "true"){
		$headtrue = "checked";
		} else if($headpos == "false"){
		$headfalse ="checked";
	}   
	
	$footpos = $theme->positionnement->foot;
	$foottrue="" ; $footfalse="";
	
	if($footpos == "true"){	
		$foottrue = "checked";
		} else if($footpos == "false"){	
		$footfalse ="checked";
	}   
	
?>

<h1 class="page-header">
	Positions des modules
</h1>

<form action="index.php?page=modules" method="post"> 
    <div class="row">
        <div class="col-lg-12">
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Le Menu :</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<input type="radio" name="group1" value="left" <?php echo($mengauche); ?>> Gauche
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group1" value="right"  <?php echo($mendroite); ?>> Droite
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group1" value="top" <?php echo($menhaut); ?>> Haut
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group1" value="false" <?php echo($menfalse); ?>> Désactivé
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Le module :</div>
					<div class="panel-body">
						<div class="col-lg-2">
							<input type="radio" name="group2" value="left" <?php echo($modgauche); ?>> Gauche
						</div>
						<div class="col-lg-2">
							<input type="radio" name="group2" value="right"  <?php echo($moddroite); ?>> Droite
						</div>
						<div class="col-lg-2">
							<input type="radio" name="group2" value="top" <?php echo($modhaut); ?>> Haut
						</div>
						<div class="col-lg-2">
							<input type="radio" name="group2" value="false" <?php echo($modfalse); ?>> Désactivé
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Haut de page (Header) : </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<input type="radio" name="group3" value="true" <?php echo($headtrue); ?>> Activé
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group3" value="false" <?php echo($headfalse); ?>> Désactivé
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Bas de page (Footer) : </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<input type="radio" name="group4" value="true" <?php echo($foottrue); ?>> Activé
							</div>
							
							<div class="col-lg-2">
								<input type="radio" name="group4" value="false" <?php echo($footfalse); ?>> Désactivé
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
			
		</div>
	</div>
</form>
