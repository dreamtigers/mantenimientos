<?php 

    session_start();
    include('database.php');
    $user = $_SESSION['user'];
    $deviceId = $_SESSION['hoursId'];

    $query = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' "; 
    $res = mysqli_query($db, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($dbPiston));
    }
    // Mientras existan resultados (1 resultado, actually)
    while($row = mysqli_fetch_array($res)){
        
        $equipo = $row['equipo'];
        $horasMotor = $row['hrsMotor'];
        $hrsMantenimiento = $row['hrsMantenimiento'];

    }

    //SQL order with an implemented clause 
    // ON DUPLICATE KEY UPDATE 
    $sql = sprintf("INSERT INTO equipo_mantenimiento (equipo, deviceId, hrsMotor, hrsMantenimiento) VALUES ('%s', '%s', '%s', '%s') 
                    ON DUPLICATE KEY UPDATE hrsMantenimiento='%s', equipo='%s'
    ",  mysqli_real_escape_string($db, $equipo),
   
        mysqli_real_escape_string($db, $deviceId),
        mysqli_real_escape_string($db, $horasMotor),
        $hrsMantenimiento,
        $hrsMantenimiento,
        $equipo);
        /** They are all done now */         
        //$marca = $modelo = $serial = $arreglo = $placa = $tipoMantenimiento = $tipoEquipo = '';
        
    mysqli_query($db, $sql);
    mysqli_close($db);



?>