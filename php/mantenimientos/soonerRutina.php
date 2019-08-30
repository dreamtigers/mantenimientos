<?php 

    session_start();
    include('database.php');
    $deviceId = $_SESSION['hoursId'];
    /** Conectamos para obtener las horas motor. */
    $sql = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' ";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($res);
    /** Guardemos los 4 timers obtenidos en variables */
    $hrs1 = $row['rutina1'];
    $hrs2 = $row['rutina2'];
    $hrs3 = $row['rutina3'];
    $hrs4 = $row['rutina4'];
    /** Creamos array para enviar al front */
    $array = array();
    //array_push($array, $hrs1,$hrs2,$hrs3,$hrs4);
    /** Pushearemos sólo los mayores a 0 */
    if ($hrs1 > 0){
        $array[] = array(
            'hora1' => $row['rutina1']
        );
    }
    if ($hrs2 > 0){
        $array[] = array(
            'hora2' => $row['rutina2']
        );
    }
    if ($hrs3 > 0){
        $array[] = array(
            'hora3' => $row['rutina3']
        );
    }
    if ($hrs4 > 0){
        $array[] = array(
            'hora4' => $row['rutina4']
        );
    }


    /** Json_encoding y enviar al front */
    $json = json_encode($array);
    echo $json;


?>