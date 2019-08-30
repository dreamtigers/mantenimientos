<?php 
/**deviceSearch
 * Back end file responsible for listening and answering whenever an user wants to filter a device by using the filter form
 */
    session_start();
    include('database.php');

    /** Variable que recibido de AJAX */
    $search = $_POST['search'];
    $user = $_SESSION['user'];
    /** Sin existe un valor 
     * (el cual vendría del front-end) */
    if(!empty($search)){
        $query = "SELECT * FROM registrado_antes WHERE nombre LIKE '$search%' /** ORDER BY id DESC */
        LIMIT 15  
        ";
        $result = mysqli_query($db, $query);
        
        /** En caso de no haber conexión, habrá error y será mostrado cual fue. */
        if(!$result){
             die('Query error:   '. mysqli_error($db));
        }

        /** Crearemos un arreglo para guardar el objeto JSON que será enviado al front end. */
        $json = array();
        /** While there's a result */
        while($row = mysqli_fetch_array($result)){
            /** La variable json será llenada en cada recorrido del bucle */
            $json[] = array(
               
                'deviceId' => $row['deviceId'],
                'name' => $row['nombre'],
                'marca' => $row['marca'],
                'modelo' => $row['modelo'],
                'serial' => $row['serial'],
                'arreglo' => $row['arreglo'],
                'placa' => $row['placa'],
               
            );
        }
        /** Lets try to actually create the JSON now then */
        $jsonString = json_encode($json);
        /** Now let's return the actual string to the front-end somehow... */
        echo $jsonString;
    }

?>