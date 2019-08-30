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
    /** Lets get the remaining hours for this row as well, shall we? */
    $sqlToo = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' ";
    $result = mysqli_query($db, $sqlToo);
    
    if (!$result){
        die('Querie failed: '. mysqli_error($db));
    }
   
    /** Up until here it was just getting the MAIN ROW but, from now on it will also calculate horasRestantes */

    while($otherRow = mysqli_fetch_array($result)){
        //Calculos de las horas para las rutinas y esas pajas.
        //Tiempo para cada rutina.
        $rut1 = 250; $rut2 = 500; $rut3 = 1000; $rut4 = 2000;
    
        // tiempo 1
        $hrsTranscurridas = $otherRow['hrsMotor'] - $otherRow['hrsMantenimiento'];
        // tiempo 2
        $hrsTranscurridas2 = $otherRow['hrsMotor'] - $otherRow['hrsMant2'];
        // tiempo 3
        $hrsTranscurridas3 = $otherRow['hrsMotor'] - $otherRow['hrsMant3'];
        // tiempo 4
        $hrsTranscurridas4 = $otherRow['hrsMotor'] - $otherRow['hrsMant4'];
        

        //Tiempos faltantes para cada rutina rutina
        
        if($rut1 > $hrsTranscurridas){
            $hrsRut1 = $rut1 - $hrsTranscurridas;
            $hrsReales1 = $hrsRut1;
        } else {
            $hrsRut1 = 0;
            $hrsReales1 = $rut1 - $hrsTranscurridas;
        }
        if($rut2 > $hrsTranscurridas2){
            $hrsRut2 = $rut2 - $hrsTranscurridas2;
            $hrsReales2 = $hrsRut2;
        } else {
            $hrsRut2 = 0;
            $hrsReales2 = $rut2 - $hrsTranscurridas2;
        }
        if($rut3 > $hrsTranscurridas3){
            $hrsRut3 = $rut3 - $hrsTranscurridas3;
            $hrsReales3 = $hrsRut3;
        } else {
            $hrsRut3 = 0;
            $hrsReales3 = $rut3 - $hrsTranscurridas3;
        }
        if($rut4 > $hrsTranscurridas4){
            $hrsRut4 = $rut4 - $hrsTranscurridas4;
            $hrsReales4 = $hrsRut4;
         
        } else {
            $hrsRut4 = 0;
            $hrsReales4 = $rut4 - $hrsTranscurridas4;
        }
        //Almacenemos los datos de las horas restantes en nuestra base de datos.
        //Table equipos; shall we?
        //SQL order
        $sqlHours = sprintf("INSERT INTO equipos (rutina1, rutina2, rutina3, rutina4,deviceId) VALUES ('%s', '%s', '%s','%s','%s') 
                ON DUPLICATE KEY UPDATE rutina1='%s', rutina2='%s', rutina3='%s', rutina4='%s'
        ",  mysqli_real_escape_string($db, $hrsRut1),
       
            mysqli_real_escape_string($db, $hrsRut2),
            mysqli_real_escape_string($db, $hrsRut3),
            mysqli_real_escape_string($db, $hrsRut4),
            $deviceId,
            $hrsRut1,
            $hrsRut2,
            $hrsRut3,
            $hrsRut4);
            /** They are all done now */         
              
        mysqli_query($db, $sqlHours);
    }

    /** Hechas las sumas y las restas */

    $sqlToo2 = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' ";
    $result2 = mysqli_query($db, $sqlToo2);
    $row2 = mysqli_fetch_array($result2);



    /** Let's now send some data back to the front. */
    $sendMe = array();
    while($row=mysqli_fetch_array($res)){
        
        $sendMe[] = array(
            'marca' => $row['marca'],
            'modelo' => $row['modelo'],
            'serial' => $row['serial'],
            'arreglo' => $row['arreglo'],
            'placa' => $row['placa'],
            /** Adding rutinas, from the second db connection */
            'rutina1' => $row2['rutina1'],
            'rutina2' => $row2['rutina2'],
            'rutina3' => $row2['rutina3'],
            'rutina4' => $row2['rutina4'],
            'hrsReales1' => $hrsReales1,
            'hrsReales2' => $hrsReales2,
            'hrsReales3' => $hrsReales3,
            'hrsReales4' => $hrsReales4
        );
          
        
    }
    $x = json_encode($sendMe);
    echo $x;

 
?>