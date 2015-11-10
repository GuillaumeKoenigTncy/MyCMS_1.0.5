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
	
	if(isset($_POST['Envoyer'])){
		$config = simplexml_load_file ('../config/config.xml');
		$theme = simplexml_load_file ('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
		
		/**** Couleur texte blocs ******/
		if(!empty( $_POST['champ2'])){
			$theme->well->color = htmlspecialchars($_POST['champ2']);
		}
		
		/**** Couleur titre ******/
		if(!empty( $_POST['champ3'])){
			$theme->h1->color = htmlspecialchars($_POST['champ3']);
		}
		
		/**** Couleur des liens ******/
		if(!empty( $_POST['champ5'])){
			$theme->a->color = htmlspecialchars($_POST['champ5']);
		}
		
		$theme->asXML('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
	}
	
	//on ouvre les fichiers xml poour stocker les variables non utiliser
	$config = simplexml_load_file ('../config/config.xml');
	$theme = simplexml_load_file ('../xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
	
	/**** Couleurs background des modules ******/
	$background= $theme->well->background_color;
	$tab[0]=$background;
	
	$fontcolor= $theme->well->color;
	$tab[1]=$fontcolor;
	// Mettre aussi son font + sa size qui sont déjà dispo !
	
	/**** Couleurs background ***/
	$background_main= $theme->body->background_color;
	$tab[2]=$background_main;
	
	$fontcolor_title= $theme->h1->color;
	$tab[3]=$fontcolor_title;
	// Mettre aussi son font + sa size qui sont déjà dispo !
	
	/**** Partie des liens ******/ 
	$colorlink= $theme->a->color;
	$tab[4]=$colorlink;
	// Mettre aussi son font + sa size qui sont déjà dispo !
?>

<style type="text/css">
    .exemple{
	margin-top:-240px;
	border: 2px solid black;
	height:150px;
	width:170px;
	margin-left:120px;
	<?php echo"background-color:".$tab[0].";"?>
	<?php echo"color:".$tab[1].";"?>
    }
    .main{
	border: 2px solid black;
	height:280px;
	width:400px;
	<?php echo"background-color:".$tab[2].";"?>
    }
    .titre{
	margin-top:10px;
	margin-left:120px;
	<?php echo"color:".$tab[3].";"?>
    }
    .modal-header{
	background-color:grey;
    }
    .modal-footer{
	background-color:grey;
    }
    .modal{
	color:black;
    }
	
    .couleur{
	height:15px;
	width:15px;
	border: 1px solid black;
    }
    .underline{
	text-decoration:underline;
	margin-left:125px;
	<?php echo"color:".$tab[4].";"?>
    }
</style>

<link href="../css/cssmodal.php" rel="stylesheet">

<h1 class="page-header">
    Stytle font
</h1>

<div id="page-wrapper">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <form name="form" action="index.php?page=stylefont" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">Couleur du texte</div>
                        <div class="panel-body">
                            Ancienne : <div class="couleur fontcolor"></div>
							<br/>
                            <input type="text" name="champ2" value="" />
                            <input type="button" class="btn btn-default " value="Ouvrir la palette" onclick="ouvrir_palette('form','champ2')" />
						</div>
					</div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Couleur du titre</div>
                        <div class="panel-body">
                            Ancienne : <div class="couleur colortitle"> </div>
							<br/>
                            <input type="text" name="champ3" value="" />
                            <input type="button" class="btn btn-default " value="Ouvrir la palette" onclick="ouvrir_palette('form','champ3')" />
						</div>
					</div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Couleur des liens</div>
                        <div class="panel-body">
                            Ancienne : <div class="couleur colorlink"> </div>
							<br/>
                            <input type="text" name="champ5" value="" />
                            <input type="button" class="btn btn-default " value="Ouvrir la palette" onclick="ouvrir_palette('form','champ5')" />
						</div>
					</div>
                    <input type="submit" class="btn btn-primary "value="Sauvegarder ces couleurs" name="Envoyer" />
				</form>
                <br>
			</div>
            <div class="col-md-6">
                <div class="main" id="main">
                    <div class="titre" id="titre">
                        Couleur des titres
					</div>
				</div>
				<div id="champ1_div" class="exemple">
					Ceci est le texte contenu dans vos modules. Vous pouvez donc voir un aperçu en direct.
				</div>
                <div class="underline" id="underline">
					Couleur des liens 
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	champ="";
	formulaire="";
	
	function ouvrir_palette(formulaire_recupere,champ_recupere) {
		formulaire=formulaire_recupere;
		champ=champ_recupere;
		ma_palette=window.open("includes/palette.html","Palette_de_couleur","height=380,width=600,status=0, scrollbars=0,,menubar=0");    
	}
	
	function valid_couleur(couleur) {
		document.forms[formulaire].elements[champ].value=couleur;
		if(champ=="champ3"){
			document.getElementById("titre").style.color=couleur;
			} else if(champ=="champ5"){
			document.getElementById("underline").style.color=couleur;
			} else{
			document.getElementById("champ1_div").style.color=couleur;
		}
	}
</script>