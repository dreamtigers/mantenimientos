<?php 

    session_start();
    include('database.php');
    $id = $_POST['id'];
    // First db connection
    $sql = "SELECT * FROM filtroPosicion WHERE deviceId LIKE '$id' ";
    $res = mysqli_query($db, $sql);
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }
    // Second db connection
    $query = "SELECT * FROM registrado_antes WHERE deviceId LIKE $id  ";
    $result = mysqli_query($db,$query);
    $otherRow = mysqli_fetch_array($result);
    //Create empty array
    $array = array();
    while($row = mysqli_fetch_array($res)){
        $array[] = array(
            'km' => $row['distanciaRecorrida'],
            'hs' => $row['horasMotor'],
            /** This belongs to 'otherRow'; 
             *  which is part of the 'suggesting' funcionality. */
            'marca' => $otherRow['marca'],
            'modelo' => $otherRow['modelo'],
            'serial' => $otherRow['serial'],
            'arreglo' => $otherRow['arreglo'],
            'placa' => $otherRow['placa'],
            'fecha' => $otherRow['fecha'],
            'anoFabricacion' => $otherRow['anoFabricacion'],
            'ubicacion' => $otherRow['ubicacion'],
            /** Shall we go on? */
            'filtroAceiteMotor' => $otherRow['filtroAceiteMotor'],
            'filtroAceiteHidraulico' => $otherRow['filtroAceiteHidraulico'],
            'filtroAirePrimario' => $otherRow['filtroAirePrimario'],
            'filtroAireSecundario' => $otherRow['filtroAireSecundario'],
            /** So far so good */
            'filtroTransmision' => $otherRow['filtroTransmision'],
            'filtroTanqueHidraulico' => $otherRow['filtroTanqueHidraulico'],
            'filtroCombustiblePrimario' => $otherRow['filtroCombustiblePrimario'],
            'filtroCombustibleSecundario' => $otherRow['filtroCombustibleSecundario'],
            /** So far so good as well */
            'filtroTanqueGasoil' => $otherRow['filtroTanqueGasoil'],
            'tipoAceiteHidraulico' => $otherRow['tipoAceiteHidraulico'],
            'tipoAceiteMotor' => $otherRow['tipoAceiteMotor'],
            /** where are we going wrong? */
            'tipoAceiteTransmision' => $otherRow['tipoAceiteTransmision'],
            'tipoAceiteCaja' => $otherRow['tipoAceiteCaja'],
            /** where does Society start to curmble?*/
            'capacidadCarterMotor' => $otherRow['capacidadCarterMotor'],
            'capacidadTanqueCaja' => $otherRow['capacidadTanqueCaja'],
            'capacidadTanqueTransmision' => $otherRow['capacidadTanqueTransmision'],
            'capacidadTanqueHidraulico' => $otherRow['capacidadTanqueHidraulico']
             
             
             /** (omg) */
        );
    }
    // Get it in a Json before sending it to the front-end
    $json = json_encode($array); 
    echo $json;

?>