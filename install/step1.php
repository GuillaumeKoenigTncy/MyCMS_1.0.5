<?php session_start(); 
	
	if (isset($_POST['submit1']))
	{
		
		$_SESSION['titre_site'] = $_POST['titre'];
		$_SESSION['desc_site'] = $_POST['description'];
		$_SESSION['pseudo'] = $_POST['pseudo'];
		$_SESSION['mail'] = $_POST['mail'];
		
		$_SESSION['mdp'] = $_POST['password'];
		
		$_SESSION['group1'] = $_POST['group1'];
		$_SESSION['group2'] = $_POST['group2'];
		$_SESSION['group3'] = $_POST['group3'];
		$_SESSION['group4'] = $_POST['group4'];
		
		header('Location: index.php?step=2');
	}
	
?>

<p class="centered"><strong>Informations sur votre site :</strong></p>

<br />

<p>
	
	<form action="index.php?step=1" method="post">
		
        <div class="form-group">
			Titre de votre site :
			<input type="text" class="form-control" id="titre" name="titre" placeholder="Mon Portfolio" required <?php echo 'value="'. $_SESSION['titre_site'] .'"';?> >
		</div>
		<div class="form-group">
			Description de votre site :
			<input type="text" class="form-control" id="description" name="description" placeholder="Bienvenue sur mon portfolio" required <?php echo'value="'. $_SESSION['desc_site'] .'"'; ?>>
		</div>

		<p class="centered"><strong>Vos accès : </strong></p>

		<div class="form-group">
			<div class="form-group">
				Votre adresse mail :
				<input type="email" class="form-control" name="mail" id="mail" placeholder="marcel.dupont@mail.com" required>
			</div>
			<div class="form-group">
				Votre Pseudonyme :
				<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="MarcelDupont" required <?php echo 'value="'. $_SESSION['pseudo'] .'"';?>>
			</div>
			<div class="form-group">
				Votre mot de passe :
				<input type="password" class="form-control" name="password" id="mdp" placeholder="*********" required>
			</div>
		</div>
		
		<p class="centered"><strong>Gestion du thèmes : </strong></p>
		
		<p><strong><small><i><u>Remarque :</u> Si les deux composantes sont du même coté alors elles seront mis l'une à la suite de l'autre.</i></small></strong></p>
	
		<p>
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Le menu :</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2"><input type="radio" name="group1" value="left" > Gauche</div>
							<div class="col-lg-2">
							<input type="radio" name="group1" value="right" > Droite</div>
							<div class="col-lg-2">
							<input type="radio" name="group1" value="top" > Haut</div>
							<div class="col-lg-2">
							<input type="radio" name="group1" value="false" > Désactivé</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Le module :</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2"><input type="radio" name="group2" value="left" > Gauche</div>
							<div class="col-lg-2">
							<input type="radio" name="group2" value="right" > Droite</div>
							<div class="col-lg-2">
							<input type="radio" name="group2" value="top" > Haut</div>
							<div class="col-lg-2">
							<input type="radio" name="group2" value="false" > Désactivé</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Haut de page (Header) : </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<input type="radio" name="group3" value="true" > Activé
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group3" value="false" > Désactivé
							</div>
						</div>
					</div>
				</div>	
			</div>

			<div class="form-group">
				<div class="panel panel-default">
					<div class="panel-heading">Bas de page (Footer) : </div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<input type="radio" name="group4" value="true" > Activé
							</div>
							<div class="col-lg-2">
								<input type="radio" name="group4" value="false" > Désactivé
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<!--
				<div><?php //include('../palette.html'); ?></div>
			-->
				
			<p><strong><i>Une pallette plus précise vous sera mis à disposition dans votre </i><strong>tableau de bord <i>!</i></strong></p>

			<a class="btn btn-primary" href="index.php"><- Etape précédente</a>
						
			<input class="btn btn-primary" type="submit" name="submit1" value="Etape suivante ->">

		</p>

	</form>
	
</p>	

<style>
	.centered
	{
	text-align: center;
	}
</style>					