<?php

    session_start();
    include('database.php');
    $user = $_SESSION['user'];
    $deviceId = $_SESSION['hoursId'];

    $query = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' "; /** WHERE propietario LIKE '$user' */
    $res = mysqli_query($db, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }
    /** Transformemos el querie recibido a arreglo */
    $json = array();

    while($row = mysqli_fetch_array($res)){
        $updateHour = $row['hrsMotor'];
    }

    //Now replace 'hrsMotor' en 'hrsMantenimiento'
    $order = sprintf("INSERT INTO equipos (hrsMantenimiento, deviceId) VALUE ('%s','%s')
            ON DUPLICATE KEY UPDATE hrsMantenimiento='%s' ",
        $updateHour,
        $deviceId,
        $updateHour);
    mysqli_query($db, $order);

    echo $updateHour;

?>