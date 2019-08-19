<?php 

    session_start();

    if($_SESSION['user']){
        echo 0; //cause session exists
    } else {
        echo 1; //session does no longer exist
    }

?>