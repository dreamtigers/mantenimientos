<?php 

    session_start();
    include('database.php');
    $id = $_SESSION['userId'];
    $user = $_SESSION['user'];
    $deviceId = $_SESSION['hoursId'];


    $sql= "SELECT * FROM registrado_antes WHERE deviceId LIKE '$deviceId' ";
    $res = mysqli_query($db, $sql);
    if (!$res){
        die('Querie failed: '. mysqli_error($db));
    }
    /** Let's now send some data back to the front. */
    $sendMe = array();
    while($row=mysqli_fetch_array($res)){
        $sendMe[] = array(
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'serial' => $row['serial'],
            'arreglo' => $row['arreglo'],
            'placa' => $row['placa']
        );
          
        
    }

    $x = json_encode($sendMe);
    echo $x;


?>