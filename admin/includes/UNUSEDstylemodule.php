<?php


if(isset($_POST['submit'])){

    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $config = simplexml_load_file('../config/config.xml');

    // update
    $config->site->titre = $titre;
    $config->site->description= $description;

    // save the updated document
    $config->asXML('../config/config.xml');




}

$config = simplexml_load_file('../config/config.xml');

   $titre = $config->site->titre;
   $description = $config->site->description;












?>

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Configuration général
                            </h1>
                            <br />

                            <p>


                            <form action="config.php" method="post">


                                <div class="form-group">
                                    Titre de votre site :
                                    <input type="text" class="form-control" id="titre" name="titre" value="<?php echo($titre);?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    Description de votre site :
                                    <input type="text" class="form-control" id="description" name="description" value="<?php echo($description);?>">
                                </div>

                                <br />
                                <div class="form-group">
                                    Description de votre site :
                                    <input type="text" class="form-control" id="description" name="description" value="<?php echo($description);?>">
                                </div>

                                <br />
                                <div class="form-group">
                                    Description de votre site :
                                    <input type="text" class="form-control" id="description" name="description" value="<?php echo($description);?>">
                                </div>

                                <br />
                                <div class="form-group">
                                    Description de votre site :
                                    <input type="text" class="form-control" id="description" name="description" value="<?php echo($description);?>">
                                </div>

                                <br />

                                

                                <input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
                            </form>


                            </p>

                        <br />

                        <br />
                        
                        <!-- /#wrapper -->

                        <!-- jQuery -->
                        <script src="js/jquery.js"></script>
         
                        <!-- Bootstrap Core JavaScript -->
                        <script src="js/bootstrap.min.js"></script>

                        <!-- Morris Charts JavaScript -->
                        <script src="js/plugins/morris/raphael.min.js"></script>
                        <script src="js/plugins/morris/morris.min.js"></script>
                        <script src="js/plugins/morris/morris-data.js"></script>

                        </body>

                    </html>
