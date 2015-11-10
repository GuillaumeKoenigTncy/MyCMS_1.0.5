<?php 
	
	$valid = $_SESSION['connect'];
	
	if(isset($valid)){
		if(strcmp("ok",$valid) != 0){
			header('location:../login.php');
		}
		}else{
		header('location:../login.php');
	}
	
	function delTree($dir) { 
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
		} 
		return rmdir($dir); 
	}
	
	$dom = simplexml_load_file ('../config/config.xml');
	
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
			
			delTree("../xml");
			delTree("../xmlfriends");
			delTree("../config");
			delTree("../upload");
			
			unlink("lock");
			
			header("location:index.php");
		}
		else
		{
			header("location:../admin/index.php");
		}
	}
	else
	{
		header("location:../admin/index.php");
	}
	
?>