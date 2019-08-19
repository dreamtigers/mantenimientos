<?php 

    session_start();
    include('database.php');
    $user = $_SESSION['user'];

    $query = "SELECT * FROM tc_users  "; /** WHERE propietario LIKE '$user' */
    $res = mysqli_query($dbPiston, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($dbPiston));
    }

    /** Transformemos el querie recibido a arreglo */
    $json = array();
    /**y ese arreglo luego a JSON */
    while($row = mysqli_fetch_array($res)){
        
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['name']
        );
    
    }
    /**Codifiquemos el array obtenido a un string de json */
    $jsonString = json_encode($json);
    echo $jsonString;

?>