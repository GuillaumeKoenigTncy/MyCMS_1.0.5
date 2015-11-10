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
	
	if(isset($_POST['submit'])) {
		if(empty($_POST['pagename'])){
			echo'<div style="margin-top:20px;" class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Attention!</strong>'." Vous n'avez pas entrez de nom !".'</div>';	
			} else {
			$name = htmlspecialchars($_POST['pagename']);
			$compteur=0; 
			$dirname = '../xml/contenu';
			$dir = opendir($dirname); 
			$temp=$name;
			
			while($file = readdir($dir)) {
				if($file != '.' && $file != '..' && !is_dir($dirname.$file)) {	
					$nomfichier=explode(".",$file,-1);
					$file=$nomfichier[0];			
					if($name==$file){
						$compteur++;
						$name=$temp;
						
						$name=$name.'('.$compteur.')';
						rewinddir();
					}
				}
			}
			if($compteur==1){
				echo'<div style="margin-top:20px;" class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Un fichier du même nom existe! Le fichier aura pour nom ".$name.'.</div>';
			}
			else if($compteur>1){
				echo'<div style="margin-top:20px;" class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Attention!</strong>'." Plusieurs fichiers existent! Le fichier aura pour nom ".$name.'.</div>';
			}	
			else{
				echo'<div style="margin-top:20px;" class="alert alert-warning alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Bravo! </strong>'." Votre page ".$name.' a été créée avec succès!</div>';	
			}
			
			$fp = fopen("../xml/contenu/$name.xml","w+");
			chmod("../xml/contenu/$name.xml", 0777); 
			closedir($dir); 
			
			$basics = '<?xml version="1.0" encoding="UTF-8"?>';
			$basics = $basics."<contenu> <article>" . htmlspecialchars($_POST['contenu']) . "</article> <titre>". htmlspecialchars($_POST['titre']) ."</titre></contenu>";
			
			fwrite($fp,$basics);		
			fclose($fp);
			
			$compteur=0;
		}	
	}
?> 

<script type="text/javascript" src="../lib/ckeditor/ckeditor.js"></script></head>

<h1 class="page-header">
    Gestion des pages
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <form action="index.php?page=creerpage" method="post"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Ajouter une page
						</div>
                        <div class="panel-body">
							<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <tbody>	
                                    <div class="form-group">
                                        Nom de la page : 
                                        <input type="text" class="form-control" id="pagename" name="pagename" required placeholder="Nom ...">
									</div>
									
                                    <div class="form-group">
                                        Titre de de la page :
                                        <input type="text" class="form-control" id="titre" name="titre" required placeholder="Titre ...">
									</div>
								</tbody>
							</table>	    
							
                            <center>
                                <textarea cols="80" class="ckeditor" id="editeur" name="contenu" rows="10"></textarea>
								<script type="text/javascript">
									CKEDITOR.replace( 'editeur' );
								</script>   
							</center>
							
                            <input type="hidden" name="namepage" value=""> 
							
                            <input style="margin-top:20px;" class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
						</div>
					</div>
				</form>
			</div>
		</div>        
	</div>
</div>					