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
      
        //lets try and create NOW the JSON
        $json[] = array(
            //these 3 from equipos
            'id' => $myrow['deviceId'],
            'nombre' => $myrow['equipo'],
            'tiempoMotor' => $myrow['hrsMotor'],
            //these 4 used to be from the deleted table eq_man
            //they are from EQUIPOS now
            'rutina1' => $myrow['rutina1'],
            'rutina2' => $myrow['rutina2'],
            'rutina3' => $myrow['rutina3'],
            'rutina4' => $myrow['rutina4']
        );
    }
   

    $send = json_encode($json);
    echo $send;


?>