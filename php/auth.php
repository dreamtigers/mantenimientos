<?php
    session_start();

    if (!isset($_SESSION['user'])){
        //First we check wether isAdmin exists, which means he is logged in
        
        header('Location: index.php');
        echo 'You can not go there';
    }

?>
