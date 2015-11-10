<?php

#----- Destruction de la session -----#
    session_start();
    session_destroy();
    $_SESSION = array();
    header('Location:../index.php');
?>
