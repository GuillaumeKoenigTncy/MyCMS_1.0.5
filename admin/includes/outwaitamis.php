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

<h1 class="page-header">
    Demandes sortantes
</h1>

<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Mes demandes d'amis sortantes
					</div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Lien vers</th>
                                    <th>Date</th>
                                    <th>Supprimer</th>
								</tr>
							</thead>
                            <tbody>
								<?php
									
									$dirname = '../xmlfriends/outwait';
									$dir = opendir($dirname);
									$i=0;
									while($file = readdir($dir)) {
										if($file != '.' && $file != '..' ){
											
											$amis = simplexml_load_file($dirname.'/'.$file);
											$url= $amis->url;
											$date = $amis->date;
											
											echo '<tr>';
											echo '<td align=center>' . $file . '</td>' ;
											echo '<td>'. $url .'</td>';
											echo '<td>'. $date .'</td>';
											echo '<td  align=center><a href="scripts/scr_outputinoldfromwait.php?file='.$file.'"<button type="submit"  class="btn btn-danger delete" name="supprimer" >Supprimer</button></a></td>' ;
											echo '</tr>';
										} 
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