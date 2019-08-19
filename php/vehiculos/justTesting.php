<?php 

    session_start();
    $id = $_SESSION['userId'];
    include('database.php');
    $user = $_SESSION['user'];

    $query = "SELECT * FROM tc_user_device WHERE userid LIKE $id"; /** Conexión a tabla que relaciona los usuarios a sus dispositivos 
    * ---------------------------------------------------------------- (tc_user_device).
    * ----------------------------------------------------------------                                                                   */
    $res = mysqli_query($dbPiston, $query);
    /** REMEMBER TO EITHER CONFIRM OR KILL YOUR QUERIES */
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }

    
    //$json = array();
    $devices = array();
    /** Iteramos por el querie recibido y guardamos cada uno de sus valores en un arreglo mediante array_push(); */
    while($row = mysqli_fetch_array($res)){
       
        array_push($devices,  $row['deviceid']);
     
    }
     /**y ese arreglo será llevado luego a JSON 
      * Peeeeeeero, ahora viene lo nuevo.
     */
    $longitud = count($devices);
    for($i = 0;$i < $longitud;$i++){

        $query2 = "SELECT    *
        FROM      tc_positions WHERE deviceid LIKE $devices[$i]
        ORDER BY  id DESC
        LIMIT     1";

        $result= mysqli_query($dbPiston,$query2);
        $myRow = mysqli_fetch_array($result);
        /** I need now to access some data which is, imho, an 
         *  ************ OBJECT WITHIN ARRAY ****************
         */
        

        /** Finally, what i had been looking for
         * a JSON holding value from tc_positions
         */
        $jsonPosition[] = array(
            'id' => $myRow['deviceid'],
            'velocidad' => $myRow['speed'],
            'latitud' => $myRow['latitude'],
            'longitud' => $myRow['longitude'],
            'updateNumber' => $myRow['id']
            //Este objeto lo meto después 'objetoAtributos' => $myRow['attributes']
        );

        
    } 
    $long = count($jsonPosition);
    $jsonString = json_encode($jsonPosition);
    // jsonEncoded var
    echo $jsonString;
    
?>