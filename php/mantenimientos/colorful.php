<?php 

    session_start();
    $id = $_SESSION['userId'];
    include('database.php');
    $user = $_SESSION['user'];
    $deviceId = $_SESSION['hoursId'];

    //Creamos un query para conectar a la tabla con todos los valores
    //table equipos
    $obey = "SELECT * FROM equipos WHERE deviceId LIKE $deviceId";
    $res = mysqli_query($db, $obey);
    //Horas restantes para el próximo mantenimiento
    $hrsMantenimientos = array();
    while($row = mysqli_fetch_array($res)){
        array_push($hrsMantenimientos, $row['rutina1']);
        array_push($hrsMantenimientos, $row['rutina2']);
        array_push($hrsMantenimientos, $row['rutina3']);
        array_push($hrsMantenimientos, $row['rutina4']);
    }
  
   
    $json = json_encode($hrsMantenimientos);
    echo $json;
   

?>