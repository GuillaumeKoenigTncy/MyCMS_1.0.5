<?php
	
	$news = simplexml_load_file ('../xmlfriends/news.xml');
	
	if( isset($_POST['ajouternews'])){
		$new = $news->addChild('new', $_POST['textarea']);
		$new->addAttribute('id', $news->cpt + 1);
		$news->cpt = $news->cpt + 1;
		$news->asXML('../xmlfriends/news.xml');    
	}
	
	if(isset($_GET['suppnew'])){
		$valsupp = intval($_GET['suppnew']);
		unset($news->new[$valsupp]);
		$news->asXML('../xmlfriends/news.xml');  
	}
	
?>

<h1 class="page-header">
    Votre actualité
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
				
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter une nouvelle new's pour vos amis</div>
                    <div class="panel-body">
                        <form action="index.php?page=gestnews" method="post"><center>
						<textarea name="textarea" maxlength="150" rows="3" cols="74"></textarea></center>
						<center>
							<input class="btn btn-primary" type="submit" name="ajouternews" value="Ajouter">
						</center>
						</form>
					</div>
				</div>
				
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Gestion des pages
					</div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>La news</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
								</tr>
							</thead>
                            <tbody>
                                <?php
									for($i=0;$i<count($news->new);$i++){
										echo '<tr>';
										echo '<td align=center>'. $news->new[$i]. '</td>' ;
										echo '<td  align=center><a href="index.php?page=gestnews&modifnew='.$i.'"><button type="submit" class="btn btn-warning" name="modifier" >Modifier</button></a></td>' ;
										echo '<td  align=center><a href="index.php?page=gestnews&suppnew='.$i.'" <button type="submit" onclick="suppression(\''.$i.'\');"  class="btn btn-danger delete" name="supprimer" >Supprimer</button></a></td>' ;
										echo '</tr>';
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>        
</div>        