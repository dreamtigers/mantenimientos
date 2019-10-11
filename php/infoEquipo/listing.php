<?php 
    session_start();
    include('database.php');
    $id = $_SESSION['hoursId'];
    
    $user = $_SESSION['user'];

    /** db con to get static data */
    $sql = "SELECT * FROM registrado_antes WHERE deviceId LIKE '$id' ";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($res);
    /** db con to get horasMotor y kilometraje en vivo */
    $query2 = "SELECT    *
    FROM      tc_positions WHERE deviceid LIKE '$id'
    ORDER BY  id DESC
    LIMIT     1";

    $result= mysqli_query($dbPiston,$query2);
    if (!$result){
        die('Querie failed: '. mysqli_error($dbPiston));
    }
    $myRow = mysqli_fetch_array($result);
    /** Now we json_decode it */
    
    $jsonField = json_decode($myRow['attributes']);
    /** This conditional down below was added because 'Patineta' suddenly stopped sending hours  */
    if(isset($jsonField->hours)){
        $hours = $jsonField->hours/3600000;
        $totalDistance = $jsonField->totalDistance/1000;
        $kms = $totalDistance . " kms";
    } else {
        $hours = 0;
        $totalDistance = $jsonField->totalDistance/1000;
        $kms = $totalDistance . " kms";
    }
    
    
    $arreglo = array();
    if($row){

        $arreglo[] = array(
            'id' => $row['deviceId'],
            'nombre' => $row['nombre'],
            /** */
            'hrsMotor' => $hours,
            'kms' => $kms,
            /** */
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'serial' => $row['serial'],
            'placa' => $row['placa'],
            /** Segunda hilera */
            'arreglo' => $row['arreglo'],
            'anoFabricacion' => $row['anoFabricacion'],
            'filtroAMotor' => $row['filtroAceiteMotor'],
            'filtroAHidraulico' => $row['filtroAceiteHidraulico'],
            'filtroAPrimario' => $row['filtroAirePrimario'],
            'filtroASecundario' => $row['filtroAireSecundario'],
            'filtroTransmision' => $row['filtroTransmision'],
            'filtroTHidraulico' => $row['filtroTanqueHidraulico'],
            /** Tercera hilera */
            'filtroCPrimario' => $row['filtroCombustiblePrimario'],
            'filtroCSecundario' => $row['filtroCombustibleSecundario'],
            'filtroTGasoil' => $row['filtroTanqueGasoil'],
            'tipoAHidraulico' => $row['tipoAceiteHidraulico'],
            'tipoAMotor' => $row['tipoAceiteMotor'],
            'tipoATransmision' => $row['tipoAceiteTransmision'],
            /** Cuarta hilera */
            'tipoACaja' => $row['tipoAceiteCaja'],
            'capacidadCMotor' => $row['capacidadCarterMotor'],
            'capacidadTCaja' => $row['capacidadTanqueCaja'],
            'capacidadTTransmision' => $row['capacidadTanqueTransmision'],
            'capacidadTHidraulico' => $row['capacidadTanqueHidraulico'],

        );


    }

    $json = json_encode($arreglo);
    echo $json;

?>