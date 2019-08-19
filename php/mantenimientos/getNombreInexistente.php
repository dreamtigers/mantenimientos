<?php 

    session_start();
    $nombreClickeado = $_SESSION['equipoClickeado'];

    echo json_encode(array('nombre' => $nombreClickeado));

?>