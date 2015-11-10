<?php  
//session_start();
?>
<a href="#palette" data-toggle="modal" >Modifier les couleurs</a>
<style type="text/css">

.exemple{
margin-top:-240px;
border: 2px solid black;
height:150px;
width:170px;
}
.main{
border: 2px solid black;
height:300px;
width:320px;
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
}
</style>
<link href="css/cssmodal.php" rel="stylesheet">
<div class="modal fade" role="dialog" id="palette">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><strong>Modifier la couleur du site</strong></h3>
                    </div>
                    <div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<form name="form" action="template.php" method="post" enctype="multipart/form-data">
							<label>Couleur du fond de la boite:<div class="couleur background"></div></label><br/>
							<input type="text" name="champ1" value=""  />
							<br />
							<input type="button" value="Ouvrir la palette" onclick="ouvrir_palette('form','champ1')" />
							<br>
							<br>
							
							<label>couleur du texte:<div class="couleur fontcolor"></div></label><br/>
							<input type="text" name="champ2" value=""  />
							<br />
							<input type="button" value="Ouvrir la palette" onclick="ouvrir_palette('form','champ2')" /><br/><br/>
							
							<label>couleur du titre:<div class="couleur colortitle"></div></label><br/>
							<input type="text" name="champ3" value=""  />
							<br />
							<input type="button" value="Ouvrir la palette" onclick="ouvrir_palette('form','champ3')" /><br/><br/>
							
							<label>couleur du background:<div class="couleur colorbody"></div></label><br/>
							<input type="text" name="champ4" value=""  />
							<br />
							<input type="button" value="Ouvrir la palette" onclick="ouvrir_palette('form','champ4')" /><br/><br/>
							
							<label>couleur des liens:<div class="couleur colorlink"></div></label><br/>
							<input type="text" name="champ5" value=""  />
							<br />
							<input type="button" value="Ouvrir la palette" onclick="ouvrir_palette('form','champ5')" /><br/><br/>
							
							<input type="submit" value="Sauvegarder ces couleurs" name="Envoyer" />
							</form>
							<br>
						</div>
						<div class="col-md-6">
						<div class="main" id="main">
						Titre	
						</div>
						<div id="champ1_div" class="exemple">
									Ultima Syriarum est Palaestina per intervalla magna protenta, cultis abundans terris et nitidis et civitates habens quasdam egregias.
								
								 </div>
								 <div class="underline" id="underline">nulli cedentem sed sibi.</div>
								<br>
					</div>
				</div>
                      
						
					</div>

                    <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">ANNULER</a>
                </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
 // on initialise 2 variables qui nous permettrons d'envoyer la couleur dans le bon champ.

champ="";
formulaire="";

function ouvrir_palette(formulaire_recupere,champ_recupere)
{

formulaire=formulaire_recupere;
champ=champ_recupere;
 
ma_palette=window.open("palette.html","Palette_de_couleur","height=380,width=600,status=0, scrollbars=0,,menubar=0");
// on ouvre la palette

}

 
function valid_couleur(couleur) //fonction appelée lorsqu'on valide la palette. On récupère la couleur.
{

document.forms[formulaire].elements[champ].value=couleur;

if(champ=="champ1"){
document.getElementById("champ1_div").style.backgroundColor=couleur;
}
else if(champ=="champ3"){
document.getElementById("main").style.color=couleur;
}
else if(champ=="champ4"){
document.getElementById("main").style.backgroundColor=couleur;
}
else if(champ=="champ5"){
document.getElementById("underline").style.color=couleur;
}
else{
document.getElementById("champ1_div").style.color=couleur;
}

}
 
</script>

<?php

if(isset($_POST['Envoyer'])){

	$color_background=htmlspecialchars($_POST['champ1']);
	$stock=$color_background;
	
	$color_font=htmlspecialchars($_POST['champ2']);
	$stock2=$color_font;
	
	$color_font_titre=htmlspecialchars($_POST['champ3']);
	$stock3=$color_font_titre;
	
	$color_background_main=htmlspecialchars($_POST['champ4']);
	$stock4=$color_background_main;

	$color_link=htmlspecialchars($_POST['champ5']);
	$stock5=$color_link;
	
	$color_background=$color_background.';';
	$color_font=$color_font.';';
	$color_background_main=$color_background_main.';';
	$color_font_titre=$color_font_titre.';';
	$color_link=$color_link.';';
	
	//on ouvre les fichiers xml poour stocker les variables non utiliser
	$module = simplexml_load_file ('xml/css/css.xml');
	
	//in stocke dans un tableau pour les récupérer si l'utilisateur ne choisi pas de nouvelles variables
	$background= $module->background;
	$tab[0]=$background;
	$fontcolor= $module->fontcolor;
	$tab[1]=$fontcolor;
	$background_main= $module->colorbody;
	$tab[2]=$background_main;
	$fontcolor_title= $module->colortitle;
	$tab[3]=$fontcolor_title;
	$colorlink= $module->colorlink;
	$tab[4]=$colorlink;
	
	$dirname = 'xml/';//on affecte le chemin ou on va créer le fichier
	$dir = opendir('xml/');
	
			if((empty($stock4))){
			$page='<?xml version="1.0" encoding="UTF-8"?>
			<module>
			<main>
			body{
			background-color:</main><colorbody>'.$tab[2].'</colorbody>
			<fin>
			}
			</fin>
			';

			}
			else{
			$page='<?xml version="1.0" encoding="UTF-8"?>
			<module>
			<main>
			body{
			background-color:</main><colorbody>'.$color_background_main.'</colorbody>
			<fin>
			}
			</fin>
			';

			}
if((empty($stock))){
$page=$page.'
	<well>
	.well{
	background-color:</well><background>'.$tab[0];
	}
else{
$page=$page.'
	<well>
	.well{
	background-color:</well><background>'.$color_background;
}


	if((empty($stock2))){
	$page=$page.'</background>
	<font>color:</font><fontcolor>'.$tab[1].'</fontcolor>
	<fin>
	}
	</fin>';
	}
	else{
	$page=$page.'</background>
	<font>color:</font><fontcolor>'.$color_font.'</fontcolor>
	<fin>
	}
	</fin>';
	}
	
	
		if((empty($stock3))){
		$page=$page.'<titre>
		.well h1{
		color:</titre><colortitle>'.$tab[3].'</colortitle>
		<fin>}</fin>';
		}
		else{
		$page=$page.'<titre>
		.well h1{
		color:</titre><colortitle>'.$color_font_titre.'</colortitle>
		<fin>}</fin>';
		}
			
			if((empty($stock5))){
			$page=$page.'<lien>
			a{
			color:</lien><colorlink>'.$tab[4].'</colorlink>
			<fin>}</fin></module>';
			}
			else{
			$page=$page.'<lien>
			.a{
			color:</lien><colorlink>'.$color_link.'</colorlink>
			<fin>}</fin></module>';
			}
		

	while($file = readdir($dir)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file))
			{	
					$fp = fopen( 'xml/css/css.xml', 'w+' );
					fwrite($fp, $page);
					fclose($fp);
				}
				
			}
		
closedir($dir);
}
?>