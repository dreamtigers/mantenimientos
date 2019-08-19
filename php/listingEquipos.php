<?php 
    session_start();
    include('database.php');
    $user = $_SESSION['user'];

    $query = "SELECT * FROM tarjetaEquipo  
    ORDER BY id DESC
    LIMIT 15 "; /** WHERE propietario LIKE '$user' */
    $res = mysqli_query($db, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }

    /** Transformemos el querie recibido a arreglo */
    $json = array();
    /**y ese arreglo luego a JSON */
    while($row = mysqli_fetch_array($res)){
        
        $json[] = array(
            'name' => $row['tipoDeEquipo'],
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'serial' => $row['serial'],
            'arreglo' => $row['arreglo'],
            'placa' => $row['numeroPlaca'],
            'tipo' => $row['tipoMantenimiento'],
            'id' => $row['id'],
            'deviceId' => $row['deviceId']
        );
     
    }
    /**Codifiquemos el array obtenido a un string de json */
    $jsonString = json_encode($json);
    echo $jsonString;
?>