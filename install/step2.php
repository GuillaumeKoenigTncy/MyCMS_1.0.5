<?php
	
	session_start(); 
	
	if (isset($_POST['submit2'])){
		header('Location: index.php?step=3');
	}
	
?>

<h3 class="centered">Récapitulatif</h3>

<br />

<p>
	
	<form action="index.php?step=3" method="post">
		
        <ul class="list-group" >
			<?php
				if ($_SESSION['titre_site'] != "") {
					echo '<li class="list-group-item">Titre de votre site : <strong>'. $_SESSION['titre_site'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Titre de votre site : Non déterminé !</li>';
				}
			?>
		</ul>
		
        <ul class="list-group" >
			<?php
				if ($_SESSION['desc_site'] != "") {
					echo '<li class="list-group-item">Description de votre site : <strong>'. $_SESSION['desc_site'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Description de votre site : Non déterminé !</li>';
				}
			?>
		</ul>
		
        <ul class="list-group" >
			<?php
				if ($_SESSION['pseudo'] != "") {
					echo '<li class="list-group-item">Votre pseudo : <strong>'. $_SESSION['pseudo'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Votre pseudo : Non déterminé !</li>';
				}
			?>
		</ul>
		
        <ul class="list-group" >
			<?php
				if ($_SESSION['mail'] != "") {
					echo '<li class="list-group-item">Votre adresse mail : <strong>'. $_SESSION['mail'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Votre adresse mail : Non déterminé !</li>';
				}
			?>
		</ul>
		
        <ul class="list-group" >
			<?php
				echo '<li class="list-group-item">Votre mot de passe : <strong>Ne peux pas être affiché pour des raisons de sécurité !</strong></li>';
			?>
		</ul>
		
		<ul class="list-group" >
			<?php
				if ($_SESSION['group1'] != "") {
					echo '<li class="list-group-item">Emplacement du menu : <strong>'. $_SESSION['group1'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Emplacement du menu : Non déterminé !</li>';
				}
			?>
		</ul>
		
        <ul class="list-group" >
			<?php
				if ($_SESSION['group2'] != "") {
					echo '<li class="list-group-item">Emplacement de la barre de modules : <strong>'. $_SESSION['group2'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Emplacement de la barre de modules : Non déterminé !</li>';
				}
			?>
		</ul>
		
		<ul class="list-group" >
			<?php
				if ($_SESSION['group3'] != "") {
					echo '<li class="list-group-item">Emplacement du header : <strong>'. $_SESSION['group3'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Emplacement du header : Non déterminé !</li>';
				}
			?>
		</ul>
		
		<ul class="list-group" >
			<?php
				if ($_SESSION['group4'] != "") {
					echo '<li class="list-group-item">Emplacement du footer : <strong>'. $_SESSION['group4'] .'</strong></li>';
				} else {
					echo '<li class="list-group-item">Emplacement du footer : Non déterminé !</li>';
				}
			?>
		</ul>

        <a class="btn btn-primary" href="index.php?step=1"><- Etape précédente</a>
		
		<input class="btn btn-primary" type="submit" name="submit2" value="Etape suivante ->">
			
	</form>
		
</p>
	
<style>
	.centered
	{
	text-align: center;
	}
</style>				