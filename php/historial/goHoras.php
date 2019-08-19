<?php 
    session_start();
    $id = $_POST['id'];
    /** Variable necesaria para acceder a horasMantenimiento */
    $_SESSION['hoursId'] = $id;

    
    $equipoClickeado = $_POST['name'];
    $_SESSION['equipoClickeado'] = $equipoClickeado;

    print_r ($_SESSION);
    //Not much to see in here.


?>