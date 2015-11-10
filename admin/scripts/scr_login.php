<?php 
	
	$dom = simplexml_load_file ('../../config/config.xml');
	
	$login = $dom->utilisateur->pseudo;
	
	$pass = $dom->utilisateur->mdp;
	
	$entrylogin = $_REQUEST['login'];
	
	$entrypass = $_REQUEST['password']; 
	
	$centrypass = sha1($entrypass);
	
	echo"$centrypass";
	
	echo"$pass";
	
	$_SESSION['connect']=false;
	
	if(isset($entrylogin) && isset($entrypass))
	{
		if(($entrylogin == $login) && ($centrypass == $pass))
		{
			session_start();  // NE PAS START DES SESSIONS INUTILEMENT. IL FAUT LE METTRE LA. R.
			
			$_SESSION['login']=$entrylogin;
			$_SESSION['connect']='ok';
			header("location:../index.php");
		}
		else
		{
			header("location:../login.php");
		}
	}
	else
	{
		header("location:../login.php");
	}
	
?>