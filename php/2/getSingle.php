<?php
     session_start();
    include('database.php');
    
    $id = $_POST['id'];

    $_SESSION['myId'] = $id;
    /** Primero comprobemos que nos llega algún dato del front end ($_POST['id']) 
     * (o mejor no)
    */
    
     /**Lets catch the id from the FRONT END */
     $i = $_POST['id'];  /** And use it in our query */
     $sql = "SELECT * FROM datosIngreso WHERE id LIKE '$i' ";
     $res = mysqli_query($db, $sql);

     if(!$res){
         die('Query Failed: '. mysqli_error($db));
     }

 
    /** Crearemos un arreglo para guardar el objeto JSON que será enviado al front end. 
     * 
     *  ******        CREACIÓN DEL JSON       ******
     * 
    */
    $json = array();
    /** While there's a result */
    while($row = mysqli_fetch_array($res)){
        /** La variable json será llenada en cada recorrido del bucle */
        $json[] = array(
            'fecha' => $row['fechaIngreso'],
            'kilometraje' => $row['kilometraje'],
            'horasDeUso' => $row['horasDeUso'],
            'anoF' => $row['anoFabricacion'],
            'ubicacion' => $row['ubicacion'],
            'propietario' => $row['propietario']
        );
    }
    /** Lets try to actually create the JSON now then */
    $jsonString = json_encode($json); /**  But just our first element */


    /** Now let's return the actual string to the front-end somehow... */
   
    echo $jsonString ;   /** Remember this is just the STRING form of a JSON representing an Array. */
    
?>
       

    


