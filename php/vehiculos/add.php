<?php
    session_start();
     //Let's set a flag to guide us
    $ok = true;   //flag
    include('database.php');
    /** Recordemos que estamos recibiendo un objeto vía POST
     * con una propiedad 'tipoEquipo'
     */
    $deviceId = $_POST['deviceId'];

    if(isset($_POST['equipo'])){

        /* Validating equipo */
        if (!isset($_POST['equipo']) || ($_POST['equipo'] === '')){
            $ok = false;
            $error = '1';
            //$tipoEquipoErr='Diga el tipo de dispositivo.**';
        } else {
            $equipo = $_POST['equipo'];
        }
        /* Validating fecha */
        if (!isset($_POST['fecha']) || ($_POST['fecha'] === '')){
            $ok = false;
            $error = '2';
           
        } else {
            $fecha = $_POST['fecha'];
        }
        /* Validating hs */
        if (!isset($_POST['hs']) || ($_POST['hs'] === '')){
            $ok = false;
            $error = '3';
    
        } else {
            $hs = $_POST['hs'];
        }
         /* Validating km */
         if (!isset($_POST['km']) || ($_POST['km'] === '')){
            $ok = false;
            $error = '4';
    
        } else {
            $km = $_POST['km'];
        }
        /** These 2 won't be validated but will still be saved */
        $actividades = $_POST['actividades'];
        $comentariosActividades = $_POST['comentariosActividades'];
        $rutina = $_POST['rutina'];
      

        if ($ok){
          
            $sql = sprintf("INSERT INTO tarjetaEquipo (tipoDeEquipo,comentarios_actividades,actividades,fechaIngreso,kilometrajeEnFecha, horasEnFecha, deviceId, tipoMantenimiento) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s') 
            ",  mysqli_real_escape_string($db, $equipo),
                mysqli_real_escape_string($db,$comentariosActividades),
                mysqli_real_escape_string($db,$actividades),
                mysqli_real_escape_string($db, $fecha),
                mysqli_real_escape_string($db, $km), mysqli_real_escape_string($db, $hs),
                $deviceId, $rutina);
               
                
            mysqli_query($db, $sql);

            //The update accorging to selected RUTINA goes down here
            $query = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' "; /** WHERE propietario LIKE '$user' */
            $res = mysqli_query($db, $query);
            /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
            if (!$res){
                die('Querie failed: '. mysqli_error($db));
            }
            //Only one row in this case
            while($row = mysqli_fetch_array($res)){
                $updateHour = $row['hrsMotor'];
            }
            if($rutina == 1){
                //Now replace 'hrsMotor' en 'hrsMantenimiento'
                $order = sprintf("INSERT INTO equipos (hrsMantenimiento, deviceId) VALUE ('%s','%s')
                ON DUPLICATE KEY UPDATE hrsMantenimiento='%s' ",
                    $updateHour,
                    $deviceId,
                    $updateHour);
                mysqli_query($db, $order);
            } else if ($rutina == 2){
                $order = sprintf("INSERT INTO equipos (hrsMant2, deviceId) VALUE ('%s','%s')
                ON DUPLICATE KEY UPDATE hrsMant2='%s' ",
                    $updateHour,
                    $deviceId,
                    $updateHour);
                mysqli_query($db, $order);
            } else if ($rutina == 3){
                $order = sprintf("INSERT INTO equipos (hrsMant3, deviceId) VALUE ('%s','%s')
                ON DUPLICATE KEY UPDATE hrsMant3='%s' ",
                    $updateHour,
                    $deviceId,
                    $updateHour);
                mysqli_query($db, $order);
            }   else if ($rutina == 4){
                $order = sprintf("INSERT INTO equipos (hrsMant4, deviceId) VALUE ('%s','%s')
                ON DUPLICATE KEY UPDATE hrsMant4='%s' ",
                    $updateHour,
                    $deviceId,
                    $updateHour);

                
            }
            mysqli_query($db, $order);

        }

       

    }
     /** Mandando valor al front End */
    echo json_encode(array(
        "ok"=>$ok
        
    ));
       

?>