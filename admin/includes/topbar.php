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
	
	$config = simplexml_load_file('../config/config.xml');
	
	$pseudo = $config->utilisateur->pseudo;
?>
 
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="index.php">My CMS</a>
</div>
 
<ul class="nav navbar-right top-nav">
	<li >
		<a target="_blank" href="../index.php" class="dropdown-toggle"><i class="fa fa-reply"></i> Retour sur le site</a>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo($pseudo); ?><b class="caret"></b></a>
		<ul class="dropdown-menu">
			<li>
				<a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Déconnexion</a>
			</li>
		</ul>
	</li>
</ul>