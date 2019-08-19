<?php 

    session_start();
    include('database.php');
    $user = $_SESSION['user'];
    
    $query = "SELECT * FROM equipos  "; 
    $res = mysqli_query($db, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }
    // We will need to send a JSON to the front-end
    $json = array();

    $devices = array();
    while($row = mysqli_fetch_array($res)){
        array_push($devices, $row['deviceId']);
    }
    $longitud = count($devices);

    for($i=0; $i<$longitud ; $i++){
        // to get id, nombre y tiempoMotor from equipos
        $sql = "SELECT * FROM equipos WHERE deviceId LIKE $devices[$i]";
        $result = mysqli_query($db, $sql);
        $myrow = mysqli_fetch_array($result);
        // end
        //now, to getting rutinas from equipo_mantenimiento
        $query2 = "SELECT * FROM equipo_mantenimiento WHERE deviceId LIKE $devices[$i]"; 
        $res2 = mysqli_query($db, $query2);
        $rowX = mysqli_fetch_array($res2);
        //lets try and create NOW the JSON
        $json[] = array(
            //these 3 from equipos
            'id' => $myrow['deviceId'],
            'nombre' => $myrow['equipo'],
            'tiempoMotor' => $myrow['hrsMotor'],
            //these 4 from equipo_mantenimiento
            'rutina1' => $rowX['rutina1'],
            'rutina2' => $rowX['rutina2'],
            'rutina3' => $rowX['rutina3'],
            'rutina4' => $rowX['rutina4']
        );
    }
   

    $send = json_encode($json);
    echo $send;


?>