<nav class="navbar navbar-inverse  navbar-static-bottom" style="padding:5px;margin-bottom:-10%;">
	<?php
		$footer = simplexml_load_file ('../../xml/fixes/footer.xml');
		echo $footer->contenu;
	?>	
	<div style="text-align: left;"> 
		<?php
			$mailt = simplexml_load_file ('../../config/config.xml'); 
			$mailto = $mailt->utilisateur->mail;
		?>
		<span style="color: rgb(255, 255, 255);">Contact : 	<a href="<?php echo("mailto:".$mailto);?>"><?php echo($mailto);?></a>    Copyright 2014 </span> 
	</div>
   	<div style="text-align: right;"> 
		<span style="color: rgb(255, 255, 255);"><a href="admin/login.php">Administration</a></span>
	</div>
</nav>  