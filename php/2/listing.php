<?php 
    session_start();
    include('database.php');
    $user = $_SESSION['user'];

    $query = "SELECT * FROM datosIngreso  "; /** WHERE propietario LIKE '$user' */
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
            'fecha' => $row['fechaIngreso'],
            'kilometraje' => $row['kilometraje'],
            'horasDeUso' => $row['horasDeUso'],
            'year' => $row['anoFabricacion'],
            'ubicacion' => $row['ubicacion'],
            'propietario' => $row['propietario'],
          
            'id' => $row['id']
        );
     
    }
    /**Codifiquemos el array obtenido a un string de json */
    $jsonString = json_encode($json);
    echo $jsonString;
?>