<?php
	
	if(file_exists('../install/lock')){
		header('Location: error.php');
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Installation/Configuration du site</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
		<div class="page-container">
			
			<!-- top navbar -->
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				
				
				<div class="container">
					<p class="navbar-text">Installation/Configuration du site</p>      
				</div>
				
			</nav>
			
			<div class="container">
				
				<br /><br />
				
				<div class="col-md-4">     	
					
					<div class="well" style="text-align : center;">
						
						<p><strong>1</strong></p>
						
						<?php 
							if(isset($_GET['step']))
							{
								if ($_GET['step'] == 1) {
									echo '<p><u>Informations sur votre site</u></p>';
								}
								else
								{
									echo '<p>Informations sur votre site</p>';
								}
							}
							else
							{
								echo '<p>Informations sur votre site</p>';
							}
							
						?>	
						
					</div>
					
				</div>
				
				<div class="col-md-4"> 	
					
					<div class="well" style="text-align : center;">
						
						<p><strong>2</strong></p>
						
						<?php 
							if(isset($_GET['step']))
							{
								if ($_GET['step'] == 2) {
									echo '<p><u>Récapitulatif</u></p>';
								}
								else
								{
									echo '<p>Récapitulatif</p>';
								}
							}
							else
							{
								echo '<p>Récapitulatif</p>';
							}
							
						?>	
						
					</div>
					
				</div>
				
				<div class="col-md-4">
					
					<div class="well" style="text-align : center;">
						
						<p><strong>3</strong></p>
						
						<?php 
							if(isset($_GET['step']))
							{
								if ($_GET['step'] == 3) {
									echo '<p><u>Installation</u></p>';
								}
								else
								{
									echo '<p>Installation</p>';
								}
							}
							else
							{
								echo '<p>Installation</p>';
							}
							
						?>
						
					</div>
					
				</div>
				
				<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				
				<div class="col-md-10 col-md-offset-1">
					
					<div class="page-header">
						<h1>Page d'installation de votre site</h1>
					</div>      	
					
					<div class="well">
						
						<?php 
							if(isset($_GET['step']))
							{
								if ($_GET['step'] == 1) {
									include('step1.php');
								}
								else if ($_GET['step'] == 2) {
									include('step2.php');
								}
								else if ($_GET['step'] == 3) {
									include('step3.php');
								}
								
							}
							else
							{
								include('control.php');
								include('module_acc.php');
							}
							
						?>	
						
					</div>
					
				</div>
				
			</div><!--/.container-->
			
			
		</div><!--/.page-container-->
		
		<!-- script references -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/scripts.js"></script>
		
		
		<!-- Copyright -->
		<!--<nav class="navbar navbar-inverse  navbar-fixed-bottom">
			<div style="text-align: right;"><span
		style="color: rgb(255, 255, 255);">Copyright 2014   &nbsp;</span></div>-->
		
		<div id="footer">
			<div class="container">
				<p class="muted credit" style="text-align: right;" >Copyright 2014</p>
			</div>
		</div>
		
	</body>
</html>
