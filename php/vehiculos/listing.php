<?php 
    session_start();
    include('database.php');
    $id = $_SESSION['userId'];
    
    $user = $_SESSION['user'];

    /** Acá es más complicado que en los otros archivos 'listing.php' 
     * 
     * Acá primero tenemos que obtener SÓLO el id de los devices del user Logueado, para ello usaremos la variable $id declarada arriba.
     * Luego habrá que conectar a otra tabla y obtener la información real de los devices.
    */
    
    $query = "SELECT * FROM tc_user_device ";  /** WHERE propietario LIKE '$user' */
    $res = mysqli_query($dbPiston, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }

    /** Transformemos el querie recibido a arreglo */
    //$json = array();
    $nombres = array();
    $devices = array();
    /**y ese arreglo luego a JSON */
    while($row = mysqli_fetch_array($res)){
        array_push($devices,  $row['deviceid']);
     
    }
    /**Codifiquemos el array obtenido a un string de json */
    //$jsonStringX = json_encode($json);
    //$jsonString = json_encode($devices);
    /** Ahora, con el arreglo $devices, obtenemos la información completa de los devices de la tabla tc_devices */
    $jsonDevice = array();

    $longitud = count($devices);

    /** Número de registro */
    $number = 0;
    for ($i = 0; $i < $longitud; $i++){

        $query2 = "SELECT * FROM tc_devices WHERE id LIKE $devices[$i]";
        $result = mysqli_query($dbPiston, $query2);
        $myRow = mysqli_fetch_array($result);
        $number += 1;

        $jsonDevice[] = array(
            'number' => $number,
            'name' => $myRow['name'],
            'ultimaUpdate' => $myRow['lastupdate'],
            'phone' => $myRow['phone'],
            'category' => $myRow['category'],
            'posId' => $myRow['positionid']
        );
        

    }
    $myJson= json_encode($jsonDevice);
    
    echo $myJson;
?>