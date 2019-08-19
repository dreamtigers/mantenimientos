<?php 
    session_start();
    $id = $_POST['id'];
    $_SESSION['hoursId'] = $id;


    print_r ($_SESSION);
    //Not much to see in here.


?>