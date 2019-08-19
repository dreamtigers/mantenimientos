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
    /**y ese arreglo luego a JSON */
    while($row = mysqli_fetch_array($res)){
        //Calculos de las horas para las rutinas y esas pajas.
        //Tiempo para cada rutina.
        $rut1 = 250; $rut2 = 500; $rut3 = 1000; $rut4 = 2000;
        //Tiempo transcurrido pero, recordando que Traccar da las horas en MILIsegundos. 
        // tiempo 1
        $hrsTranscurridas = $row['hrsMotor'] - $row['hrsMantenimiento'];
        // tiempo 2
        $hrsTranscurridas2 = $row['hrsMotor'] - $row['hrsMant2'];
        // tiempo 3
        $hrsTranscurridas3 = $row['hrsMotor'] - $row['hrsMant3'];
        // tiempo 4
        $hrsTranscurridas4 = $row['hrsMotor'] - $row['hrsMant4'];
    
        //Tiempos faltantes por rutina
        if($rut1 > $hrsTranscurridas){
            $hrsRut1 = $rut1 - $hrsTranscurridas;
        } else {
            $hrsRut1 = 0;
        }
        if($rut2 > $hrsTranscurridas2){
            $hrsRut2 = $rut2 - $hrsTranscurridas2;
        } else {
            $hrsRut2 = 0;
        }
        if($rut3 > $hrsTranscurridas3){
            $hrsRut3 = $rut3 - $hrsTranscurridas3;
        } else {
            $hrsRut3 = 0;
        }
        if($rut4 > $hrsTranscurridas4){
            $hrsRut4 = $rut4 - $hrsTranscurridas4;
        } else {
            $hrsRut4 = 0;
        }
        //Almacenemos los datos de las horas restantes en nuestra base de datos.
        //Table EQUIPO_MANTENIMIENTO; shall we?
        //SQL order
        $sql = sprintf("INSERT INTO equipo_mantenimiento (rutina1, rutina2, rutina3, rutina4,deviceId) VALUES ('%s', '%s', '%s','%s','%s') 
                ON DUPLICATE KEY UPDATE rutina1='%s', rutina2='%s', rutina3='%s', rutina4='%s'
        ",  mysqli_real_escape_string($db, $hrsRut1),
       
            mysqli_real_escape_string($db, $hrsRut2),
            mysqli_real_escape_string($db, $hrsRut3),
            mysqli_real_escape_string($db, $hrsRut4),
            $deviceId,
            $hrsRut1,
            $hrsRut2,
            $hrsRut3,
            $hrsRut4);
            /** They are all done now */         
          
            
        mysqli_query($db, $sql);
      
       
        
        //Fin de los calculos de las horas para las rutinas y esas pajas.
        //$horas = $row['hrsMotor']/3600;
        //Arreglo a enviar al Front-end
        $json[] = array(
            'id' => $deviceId,
            'equipo' => $row['equipo'],
            'hrsMotor' => $row['hrsMotor'],
            'hrsMant' => $row['hrsMantenimiento'],
            'hrsMant2' => $row['hrsMant2'],
            'hrsMant3' => $row['hrsMant3'],
            'hrsMant4' => $row['hrsMant4'],
            'hrsTranscurridas' => $hrsTranscurridas,
            'hrsTranscurridas2' => $hrsTranscurridas2,
            'hrsTranscurridas3' => $hrsTranscurridas3,
            'hrsTranscurridas4' => $hrsTranscurridas4,
            'hrsRut1' => $hrsRut1,
            'hrsRut2' => $hrsRut2,
            'hrsRut3' => $hrsRut3,
            'hrsRut4' => $hrsRut4
        );
    
    }
    /**Codifiquemos el array obtenido a un string de json */
    $jsonString = json_encode($json);
    echo $jsonString;

?>