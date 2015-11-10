<?php

#----- On démarre une session -----#
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Administration</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container" id="boitelog">
        <div class="row" style="margin-top:75px;">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Connexion</h3>
                    </div>
                    <div class="panel-body">
                        <div id="error"></div>	
                        <form action="scripts/scr_login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Identifiant" name="login" type="text" autofocus id="login">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" value="" id="password">
                                </div>

                                <input type="submit" class="btn btn-lg btn-default btn-block" value="Connexion" id="submit" >
                            </fieldset>
                        </form>
                    </div>
                </div>
				<noscript>
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"> <img src="images/warn.png" alt="Warning" height="40"/> Avertissement</h3>
						</div>
						<div class="panel-body">
							<p style="text-align:justify;">Ce site utilise Javascript et Ajax. Afin de pouvoir pleinement l'utiliser il vous est demandé d'activer votre Javascrip sur votre navigateur.</p>
						</div>
					</div>
				</noscript>
            </div>
        </div>
    </div>

    <!-- jQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.ui.shake.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>