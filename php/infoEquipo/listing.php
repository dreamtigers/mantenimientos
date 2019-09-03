<?php 
    session_start();
    include('database.php');
    $id = $_SESSION['hoursId'];
    
    $user = $_SESSION['user'];

    /** db con */
    $sql = "SELECT * FROM registrado_antes WHERE deviceId LIKE '$id' ";
    $res = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($res);
    $arreglo = array();
    if($row){

        $arreglo[] = array(
            'id' => $row['deviceId'],
            'nombre' => $row['nombre'],
            'hrsMotor' => $row['horasEnFecha'],
            'kms' => $row['kilometrajeEnFecha'],
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