<?php 
    session_start();
    $id = $_POST['aid'];
    $_SESSION['hoursId'] = $id;


    print_r ($_SESSION);
    //Not much to see in here.


?>