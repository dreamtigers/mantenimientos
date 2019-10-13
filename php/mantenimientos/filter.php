<?php 

    session_start();
    include('database.php');
    $user = $_SESSION['user'];// not needed
    $search = $_POST['date'];

    /** hoursId is used to go to horasMantenimiento */
    $deviceId = $_SESSION['hoursId'];

    //if there is a value in search
    if($search){
        $sql = "SELECT * FROM tarjetaEquipo WHERE fechaIngreso LIKE '$search' AND deviceId LIKE '$deviceId' AND enFuncionDe LIKE 'hrs' ";
        $result = mysqli_query($db, $sql);
        /** En caso de no haber conexión, habrá error y será mostrado cual fue. */
        if(!$result){
            die('Query error:   '. mysqli_error($db));
        }
        $array = array();
        while($row = mysqli_fetch_array($result)){
        
           $array[] = array(
                'nombre' => $row['tipoDeEquipo'],
                'numRegistro' => $row['id'],
            
                'rutina' => $row['tipoMantenimiento'],
                'fechaIngreso' => $row['fechaIngreso'],
                'kilometraje' => $row['kilometrajeEnFecha'],
                'horasMotor' => $row['horasEnFecha'],
                /* 'anoFabricacion' => $row['anoFabricacion'],
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
                'capacidadTanqueHidraulico' => $row['capacidadTanqueHidraulico'], */
                //since i assume order doesn't matter
                /* 'filtroTransmision' => $row['filtroTransmision'],
                'filtroTanqueHidraulico' => $row['filtroTanqueHidraulico'], */
                'actividades' => $row['actividades'],
                'comentariosActividades' => $row['comentarios_actividades'],
                /* 'observaciones' => $row['observaciones'], */
                'idHoras' => $deviceId

            );
        }
     
      

        $send = json_encode($array);
        echo $send;



    }
    



?>