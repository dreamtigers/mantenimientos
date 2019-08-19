<?php 

    session_start();
    $isAdmin = $_SESSION['isAdmin'];

    echo $isAdmin;

?>