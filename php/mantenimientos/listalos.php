<?php

    session_start();
    include('database.php');
    $id = $_SESSION['userId'];
    $user = $_SESSION['user'];

    /** hoursId is used to go to horasMantenimiento */
    $deviceId = $_SESSION['hoursId'];


    $sql= "SELECT * FROM tarjetaEquipo WHERE deviceId LIKE '$deviceId' ";
    $res = mysqli_query($db, $sql);
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }
   

    $json = array();
    while($row = mysqli_fetch_array($res)){
         
        $json[] = array(
            'nombre' => $row['tipoDeEquipo'],
            'numRegistro' => $row['id'],
           
            'rutina' => $row['tipoMantenimiento'],
            'fechaIngreso' => $row['fechaIngreso'],
            'kilometraje' => $row['kilometrajeEnFecha'],
            'horasMotor' => $row['horasEnFecha'],
            'anoFabricacion' => $row['anoFabricacion'],
            'ubicacion' => $row['ubicacion'],
            'filtroAceiteMotor' => $row['filtroAceiteMotor'],
            'filtroAceiteHidraulico' => $row['filtroAceiteHidraulico'],
            'filtroAirePrimario' => $row['filtroAirePrimario'],
            'filtroAireSecundario' => $row['filtroAireSecundario'],
            'filtroCombustiblePrimario' => $row['filtroCombustiblePrimario'],
            'filtroCombustibleSecundario' => $row['filtroCombustibleSecundario'],
            'filtroTanqueGasoil' => $row['filtroTanqueGasoil'],
            'tipoAceiteHidraulico' => $row['tipoAceiteHidraulico'],
            'tipoAceiteMotor' => $row['tipoAceiteMotor'],
            'tipoAceiteTransmision' => $row['tipoAceiteTransmision'],
            'tipoAceiteCaja' => $row['tipoAceiteCaja'],
            'capacidadCarterMotor' => $row['capacidadCarterMotor'],
            'capacidadTanqueCaja' => $row['capacidadTanqueCaja'],
            'capacidadTanqueTransmision' => $row['capacidadTanqueTransmision'],
            'capacidadTanqueHidraulico' => $row['capacidadTanqueHidraulico'],
            //since i assume order doesn't matter
            'filtroTransmision' => $row['filtroTransmision'],
            'filtroTanqueHidraulico' => $row['filtroTanqueHidraulico'],
            'actividades' => $row['actividades'],
            'observaciones' => $row['observaciones'],
            'idHoras' => $deviceId

        );
      
     }
     /**Codifiquemos el array obtenido a un string de json */
     $j = json_encode($json);
     echo $j;

?>