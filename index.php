<?php
	
	if (!file_exists("install/lock")) {
		header("Location: install/notinstall.php");
	} 
	
	$config = simplexml_load_file ("config/config.xml");
    $pageaccueil= $config->site->accueil;
	
    if(isset($_GET['page'])){
		$page = $_GET['page'].".xml";
		}else{
		$page = $pageaccueil;
	}
	
    $nomtheme = $config->site->theme;
	
	$theme = simplexml_load_file ("xml/themes/$nomtheme/$nomtheme.xml");
	
	$position=$theme->positionnement;
	
	$module = simplexml_load_file ("xml/fixes/module.xml");	
	$contenu = simplexml_load_file ("xml/contenu/$page");	
	
	$article = $contenu->article;
	$titrep = $contenu->titre;
	$titres = $config->site->titre;
	$descriptionpresentation = $module->description;
?>

<!DOCTYPE html>

<html lang="fr">
	
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo ($titres);?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/css.php" rel="stylesheet">
	</head>
	
	<body>
		<?php 
			if($position->head=="true"  ){
				echo '<header class="navbar navbar-default navbar-static-top" style="margin-top:-53px; padding:10px;">';
				include_once('header.php');
				echo "</header>";
			} 
		?>
		
		<div class="page-container"  >
			<?php
				if($position->menu=="top" ){
					include_once('menu.php');
				}
			?>
			
			<div class="container">
				
				<div class="row row-offcanvas row-offcanvas-left">
					
					<?php
						if($position->menu=="left" ){
							include_once('menu.php');
						}
						if($position->sidebarre=="left" && $position->menu!="left" ){
							include_once('sidebarre.php');
						}
					?>
					
				    <div class= 
					<?php 
						if($position->menu=="top" && ($position->sidebarre=="left" || $position->sidebarre=="right") ||  $position->menu =="right" && $position->sidebarre=="right"  ||  $position->menu =="left" && $position->sidebarre=="left" || ($position->menu=="right" || $position->menu=="left" ) &&  $position->sidebarre!="left" && $position->sidebarre!="right"){
							echo "col-md-10";
						}else if(($position->menu=="left" && $position->sidebarre=="right")  || ($position->menu=="right" &&  $position->sidebarre=="left" ) )
						{
							echo "col-md-8";
						}else if(($position->menu=="top"|| $position->menu!="left" && $position->menu!="right")&& ($position->sidebarre!="left" && $position->sidebarre!="right"))
						{
							echo "col-md-12";
						}
					?> >
					
						<h1 style="text-align: center;"><strong><?php echo ($titrep);?></strong></h1>
						
						<div class="well">
							<?php echo ($article);?>
						</div>
						
					</div>
					
					<?php  
						if($position->sidebarre=="right" ){
							include_once('sidebarre.php');
						}
						if($position->menu=="right"){
							include_once('menu.php');
						}
					?>
					
				</div>
			</div>
			
			<nav class="footer navbar-inverse navbar-static-bottom">
				
				<?php 
					if($position->foot=="true" ){
						echo('<div class="" style="background-color:#f8f8f8;padding:10px;border-top: 1px solid #e7e7e7;border-bottom: 1px solid #e7e7e7;">');
						include_once('footer.php');
						echo('</div>');
					} 
				?>
				
				<div style="background-color:#f8f8f8;border: 0px solid #e7e7e7;padding:10px;">
					<div style="text-align: left;"><a href="admin/login.php">Administration</a></div>
					<div style="text-align: right; margin-top:-25px;">&copy; 2014-2015 MyCMS</div>
				</div> 
			</nav>
			
		</div>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		
	</body>
	
</html>

<style>
	html{
	position:relative;
	min-height:100%;
	}
	body {
	/* Margin bottom by footer height */
	margin-bottom: 60px;
	}
	.footer {
	position: absolute;
	bottom: 0;
	width: 100%;
	/* Set the fixed height of the footer here */
	height: 60px;
	background-color: #f5f5f5;
	}
</style>