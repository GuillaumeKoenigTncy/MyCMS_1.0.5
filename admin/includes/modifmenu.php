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
	
	
	if(isset($_POST['submitinterne']) ) {
		
		if(isset($_GET['item']) )  {
			$file = $_GET['item'];
			
		}
		
		if(empty($_POST['nomiteminterne']) || empty($_POST['choixpage'])) {
			
			echo'<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Attention!</strong>'." Vous n'avez pas entrez de nom !".'</div>';	
		} 
		else{
			$name = htmlspecialchars($_POST['nomiteminterne']);
			$page = htmlspecialchars($_POST['choixpage']);
			$page = substr($page, 0, -4);
			
			echo'<div class="alert alert-success alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Bravo! </strong>'."L'item ".$name.' a été ajouté au menu avec succès!</div>';	
			
			$dirname = '../xml/menu';
			$menu = simplexml_load_file($dirname.'/'.$file);
			
			$menu->nom = $name;
			$menu->page= $page;
			$menu->lien= 'index.php?page='.$page.'.xml';
			$menu->asXML($dirname.'/'.$file);
			
		}	
	}
	
	else if(isset($_POST['submitexterne']) ) {
		
		if(isset($_GET['item']) )  {
			$file = $_GET['item'];
			
		}
		
		if(empty($_POST['nomitemexterne']) || empty($_POST['lienexterne'])) {
			
			echo'<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Attention!</strong>'." Vous n'avez pas entrez de nom !".'</div>';	
			} else {
			$name = htmlspecialchars($_POST['nomitemexterne']);
			$lien = htmlspecialchars($_POST['lienexterne']);
			
			echo'<div class="alert alert-success alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Bravo! </strong>'."L'item ".$name.' a été ajouté au menu avec succès!</div>';	
			
			$dirname = '../xml/menu';
			$menu = simplexml_load_file($dirname.'/'.$file);
			
			$menu->nom = $name;
			$menu->lien= $lien;
			
			$menu->asXML($dirname.'/'.$file);
			
		}	
	}
	
	if(isset($_GET['item']) && isset($_GET['type']))  {
		$file = $_GET['item'];
		$type = $_GET['type'];
	}
?> 


<h1 class="page-header">
Gestion du menu </h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <form action="index.php?page=modifmenu&item=<?php echo($file); ?>&type=<?php echo($type); ?>" method="post"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Modficiation de l'item
						</div>
                        <div class="panel-body">
                            <div class="row">
								<?php
								if($type == "Interne"){
									$dirname = '../xml/menu';
									$menu = simplexml_load_file($dirname.'/'.$file);
									$nomitem= $menu->nom;
									$lien = $menu->lien;
									$type = $menu->type;
									$page = $menu->page;
								?>
								<div class="col-lg-4">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Nom :</span>
										<input type="text" class="form-control" placeholder="Nom de l'item..." aria-describedby="basic-addon1" name="nomiteminterne" onkeypress="refuserToucheEntree(event);" value ="<?php echo($nomitem); ?>">
									</div>
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-5">
									<select name="choixpage" class="form-control" > 
										<option selected="selected">
											<?php echo($page.'.xml'); ?>
										</option><!-- Pour opt -->
										<?php
											$dirname = '../xml/contenu';
											$dir = opendir($dirname);
											$i=0;
											while($file = readdir($dir)) {
												if($file != '.' && $file != '..'  && $file != $page.'.xml'){
													echo '<option>' . $file . '</option>' ;
												}
											}
										?>
									</select>
								</div><!-- /.col-lg-6 -->
								<input class="btn btn-primary" type="submit" name="submitinterne" value="Ajouter" >
							</div>
							<?php } 
							else if($type == "Externe"){
								$dirname = '../xml/menu';
								$menu = simplexml_load_file($dirname.'/'.$file);
								$nomitem= $menu->nom;
								$lien = $menu->lien;
								$type = $menu->type;
							?>
							<div id="other" class="tab-pane">
								<div class="col-lg-4">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Nom :</span>
										<input type="text" class="form-control" placeholder="Nom de l'item..." aria-describedby="basic-addon1" name="nomitemexterne" onkeypress="refuserToucheEntree(event);" value ="<?php echo($nomitem); ?>">
									</div>
								</div><!-- /.col-lg-6 -->
								<div class="col-lg-5">                                    
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">@</span>
										<input type="text" class="form-control" placeholder="Lien vers..." aria-describedby="basic-addon1" name="lienexterne" onkeypress="refuserToucheEntree(event);" value ="<?php echo($lien); ?>">
									</div>
								</div><!-- /.col-lg-6 -->
								<input class="btn btn-primary" type="submit" name="submitexterne" value="Ajouter" >
							</div>
						</div>
						<?php  } ?>	
					</div><!-- /.row -->	   
				</form>
			</div>
		</div>
	</div>
</div>