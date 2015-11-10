<?php 
	$config = simplexml_load_file ('config/config.xml');
	$root = simplexml_load_file ('xml/themes/'.$config->site->theme.'/'.$config->site->theme.".xml");
	
	$position=$root->positionnement;
	$titre = $config->site->titre;
	
?>

<nav class = <?php if($position->menu=="top" && $position->head=="true" ){echo '"navbar navbar-default navbar-static-top" style="margin-top:-20px;"';}else if($position->menu=="top"){ echo '"navbar navbar-default navbar-fixed-top"';} else{echo '"navbar navbar-default col-md-2"'; if($position->menu=="left" || $position->menu=="right"  ){echo'style="margin-top:6%;"';}} ?> role="navigation">
	
	<?php if($position->menu=="top"){ ?> <p class="navbar-text"><?php echo ($titre);?></p> <?php } ?>
	
	<ul role="tablist" class=<?php echo '"nav nav-tabs'; if( $position->menu=="right" || $position->menu=="left"){echo 'nav-stacked';} echo'"';?> >
		
		<?php
			$itemsMenu=simplexml_load_file('xml/menu/menuOrdre.xml');
			for($i=0;$i<count($itemsMenu->item);$i++ )
			{
				if(file_exists('xml/menu/'.$itemsMenu->item[$i]))
				{
					$item=simplexml_load_file('xml/menu/'.$itemsMenu->item[$i]);
					
					$nomitem= $item->nom;
					$lien = $item->lien;
					
					if($item->type == "Externe"){
					echo '<li role="presentation" style="margin-top:5px;"><a target="_blank" style="border-radius: 0px 0px 0px 0px!important;" href="'.$lien.'">'.$nomitem.'</a></li>';
					}else{
					echo '<li role="presentation" style="margin-top:5px;"><a style="border-radius: 0px 0px 0px 0px!important;" href="'.$lien.'">'.$nomitem.'</a></li>';
					}
				}
			}
		?> 
	</ul>
</nav>