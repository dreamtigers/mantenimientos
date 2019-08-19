<?php 

    session_start();
    include('database.php');
    $user = $_SESSION['user'];// not needed
    $search = $_POST['search'];

    //if there is a value in search
    if($search){
        $sql = "SELECT * FROM equipos WHERE equipo LIKE '$search%' ";
        $result = mysqli_query($db, $sql);
        /** En caso de no haber conexión, habrá error y será mostrado cual fue. */
        if(!$result){
            die('Query error:   '. mysqli_error($db));
        }
        $devices = array();
        while($row = mysqli_fetch_array($result)){
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
                //these 4 USED TO BE from equipo_mantenimiento
                // NOT ANYMORE, THO
                'rutina1' => $myrow['rutina1'],
                'rutina2' => $myrow['rutina2'],
                'rutina3' => $myrow['rutina3'],
                'rutina4' => $myrow['rutina4']
            );
        }

        $send = json_encode($json);
        echo $send;



    }
    



?>