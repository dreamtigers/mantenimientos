<?php 
/**deviceSearch
 * Back end file responsible for listening and answering whenever an user wants to filter a device by using the filter form
 */
    session_start();
    include('database.php');

    /** Variable que recibido de AJAX */
    $search = $_POST['search'];
    $user = $_SESSION['user'];
 
    /** Número de registro */
    $number = 0;

    /** Si existe un valor 
     * (el cual vendría del front-end) */
    if(!empty($search)){
        $query = "SELECT * FROM filtroPosicion   WHERE nombre LIKE '$search%'  
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
            $number += 1;
            $json[] = array(
                'number' => $number,
                'nombre' => $row['nombre'],
                'velocidad' => $row['velocidad'],
                'horas' => $row['horasMotor'],
               
                'distancia' => $row['distanciaRecorrida'],
                'updateN' => $row['updateNumber']
               
            );
        }
        /** Lets try to actually create the JSON now then */
        $jsonString = json_encode($json);
        /** Now let's return the actual string to the front-end somehow... */
        echo $jsonString;
    }

?>