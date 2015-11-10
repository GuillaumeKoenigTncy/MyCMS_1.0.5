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
	
	#----- Gestion du mémo de la page principal -----#
	
	$fmemo = simplexml_load_file('../xml/note.xml');
	
	if(isset($_POST['submit'])){  
        $fmemo = simplexml_load_file('../xml/note.xml');
        $fmemo->memo = $_POST['textarea'];
        $fmemo->asXML('../xml/note.xml');
	}
	
	$memo = $fmemo->memo;
	
?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Espace Administrateur
		</h1>
	</div>
</div>

<div class="row">
    <div class="col-lg-7">
		<div class="panel panel-default">
			<div class="panel-heading">Bienvenue !</div>
			<div class="panel-body">
				<p>
					<center> Bienvenue sur l'espace administrateur de votre Cms. Vous trouverez sur la gauche différentes catégories afin de personnaliser au maximum votre site Web. 
						Une fois les changements effectué, il suiffit de retourner sur votre site, et d'actualiser la page.
					</center>
				</p>
			</div>
		</div>
        <div class="panel panel-default">
            <div class="panel-heading">Mémo</div>
            <div class="panel-body">
				<form action="index.php" method="post"><center>
				<textarea name="textarea" rows="5" cols="74"><?php echo($memo);?></textarea></center>
				</div>
            	<center><input class="btn btn-primary" type="submit" name="submit" value="Enregistrer"></center>
				<br/>
			</div>
		</form>
	</div>
    
    <div class="col-lg-5">
		<center>
			<img style="width: 300px; height: 346px;" alt="" src="img/logo.png">
		</center>
	</div>
</div>	