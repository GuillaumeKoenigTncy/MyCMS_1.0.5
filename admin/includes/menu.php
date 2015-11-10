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
?>
<ul class="nav navbar-nav side-nav">
	<li class="active">
		<a href="index.php"><i class="fa fa-fw fa-dashboard"></i>  Accueil</a>
	</li>
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-file"></i> Mes pages <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demo" class="collapse">
			<li>
				<a href="?page=creerpage"><i class="glyphicon glyphicon-pencil"> </i> Créer une page</a>
			</li>
			<li>
				<a href="?page=gestpage"><i class="glyphicon glyphicon-edit"></i> Gestion des pages</a>
			</li>
		</ul>
	</li>
	
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-desktop"></i> Apparence <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demo2" class="collapse">
			<li>
				<a href="?page=modules"><i class=" glyphicon glyphicon-pushpin"></i> Position modules</a>
			</li>
			<li>
				<a href="?page=stylefont"><i class=" glyphicon glyphicon-text-height"></i> Style du texte</a>
			</li>
			
			<li> 
				<a href="?page=design"><i class=" glyphicon glyphicon-eye-open"></i> Design général</a>
			</li>
			<li> 
				<a href="?page=themes"><i class="fa fa-picture-o"></i> Gestion des thèmes </a>
			</li>
		</ul>
	</li>
	<li> 
		<a href="?page=gestmenu"><i class="glyphicon glyphicon-tasks"></i> Gestion du menu</a>
	</li>
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-cogs"></i> Gérer les modules <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demo3" class="collapse">
			<li>
				<a href="?page=modifheader"><i class="glyphicon glyphicon-edit"> </i> Modifier header</a>
			</li>
			<li>
				<a href="?page=modiffooter"><i class="glyphicon glyphicon-edit"></i> Modifier footer</a>
			</li>
			<li>
				<a href="?page=modifmodule"><i class="glyphicon glyphicon-edit"></i> Modifier module infos	</a>
			</li>
		</ul>
	</li>	
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-users"></i> Gérer mes amis <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demo4" class="collapse">
			<li>
				<a href="?page=ajouteramis"><i class="fa fa-plus-square"></i> Ajouter un amis</a>
			</li>
			<li>
				<a href="?page=inwaitamis"><i class="fa fa-reply"></i> Demandes entrantes</a>
			</li>
			<li>
				<a href="?page=outwaitamis"><i class="fa fa-share"></i> Demandes sortantes</a>
			</li>
			<li>
				<a href="?page=gestionamis"><i class="fa fa-list"></i> Liste d'amis</a>
			</li>
		</ul>
	</li>	
	<li>
		<a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-globe"></i> Social Network <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demo5" class="collapse">
			
			<li>
				<a href="?page=listnews"><i class="fa fa-bookmark"></i> L'actualité</a>
			</li>
			<li>
				<a href="?page=gestnews"><i class="fa fa-child"></i> Gérer mes new's</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="?page=config"><i class="fa fa-fw fa-wrench"></i> Configuration générale</a>
	</li>
	<li>
		<a href="?page=utilisateurs"><i class="glyphicon glyphicon-user"></i>  Utilisateurs</a>
	</li>
</ul>	