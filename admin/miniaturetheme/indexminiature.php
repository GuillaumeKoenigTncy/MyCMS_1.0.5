<?php
	$config = simplexml_load_file ("../../config/config.xml");
    $pageaccueil= $config->site->accueil;

    if(isset($_GET['page'])){
		$page = $_GET['page'].".xml";
    }else{
		$page = $pageaccueil;
	}
	
	
    $nomtheme = $_GET['theme'];


	$theme = simplexml_load_file ('../../xml/themes/'. $nomtheme.'/'.$nomtheme.'.xml');

	$position=$theme->positionnement;

	$module = simplexml_load_file ("../../xml/fixes/module.xml");	
	$contenu = simplexml_load_file ("../../xml/contenu/$page");	
	
	$article = $contenu->article;
	$titrep = $contenu->titre;
	$titres = $config->site->titre;
	$imagepresentation = $module->imagetop;	
	$descriptionpresentation = $module->description;
	
	
		$filename =  "../../install/lock";
if (!file_exists($filename)) {
  header("Location: ../../install/notinstall.php");
} 

?>

<!DOCTYPE html>

<html lang="fr" style="zoom: 20%;>

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo ($titres);?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../../css/styles.css" rel="stylesheet">
		<link href="cssminiature.php?theme=<?php echo $nomtheme;?>" rel="stylesheet">
	</head>

	<body>
		<?php 
			if($position->header=="true"  ){
				echo '<header class="navbar navbar-default navbar-static-top" style="margin-top:-53px; padding:10px;" >';
				include_once('headerminiature.php');
				echo "</header>";
			} 
		?>

		<div class="page-container"  >
			<?php
				if($position->menu=="top" ){
					include_once('menuminiature.php');
				}
			?>

			<div class="container" style="min-height:540px;" >
			
				<div class="row row-offcanvas row-offcanvas-left">

					<?php
						if($position->menu=="left" ){
							include_once('menuminiature.php');
						}
						if($position->sidebarre=="left" && $position->menu!="left" ){
							include_once('../../sidebarre.php');
						}
					?>

				    <div class= 
					<?php 
						if($position->menu=="top" && ($position->sidebarre=="left" || $position->sidebarre=="right") ||  $position->menu =="right" && $position->sidebarre=="right"  ||  $position->menu =="left" && $position->sidebarre=="left" || ($position->menu=="right" || $position->menu=="left" ) &&  $position->sidebarre!="left" && $position->sidebarre!="right"){
							echo "col-xs-10";
						}else if(($position->menu=="left" && $position->sidebarre=="right")  || ($position->menu=="right" &&  $position->sidebarre=="left" ) )
						{
							echo "col-xs-8";
						}else if(($position->menu=="top"|| $position->menu!="left" && $position->menu!="right")&& ($position->sidebarre!="left" && $position->sidebarre!="right"))
						{
							echo "col-xs-12";
						}
						
					?>
				    >
						<h1 style="text-align: center;"><strong><?php echo ($titrep);?></strong></h1>

						<div class="well">
							<?php echo ($article);?>
						</div>
				  
					</div>
				 
				<?php  
					if($position->sidebarre=="right" ){
						include_once('../../sidebarre.php');
					}
					if($position->menu=="right"){
						include_once('menuminiature.php');
					}
				?>
			
				</div>
				
			</div>
	
			<?php 
			if($position->footer=="true" )
			{
				include_once('footerminiature.php');
			} ?>
			
		</div>
		
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>

	</body>
	
</html>