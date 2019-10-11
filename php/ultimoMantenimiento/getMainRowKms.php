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
    /** Lets get the remaining 'kilómetros' for this row as well, shall we? */
    $sqlToo = "SELECT * FROM equipos WHERE deviceId LIKE '$deviceId' ";
    $result = mysqli_query($db, $sqlToo);
    
    if (!$result){
        die('Querie failed: '. mysqli_error($db));
    }
   
    /** Calculo de kilómetros restantes */

    while($otherRow = mysqli_fetch_array($result)){
        //Calculos de los kilómetros para las rutinas y esas pajas.
        //Tiempo para cada rutina.
        $rut1 = 5000; $rut2 = 10000; $rut3 = 20000; $rut4 = 40000;
    
        // kilometraje 1
        $kmsTranscurridos = $otherRow['kilometraje'] - $otherRow['kmsMant1'];
        // kilometraje 2
        $kmsTranscurridos2 = $otherRow['kilometraje'] - $otherRow['kmsMant2'];
        // kilometraje 3
        $kmsTranscurridos3 = $otherRow['kilometraje'] - $otherRow['kmsMant3'];
        // kilometraje 4
        $kmsTranscurridos4 = $otherRow['kilometraje'] - $otherRow['kmsMant4'];
        

        //kilometros faltantes para cada rutina rutina
        
        if($rut1 > $kmsTranscurridos){
            $kmsRut1 = $rut1 - $kmsTranscurridos;
            $kmsReales1 = $kmsRut1;
        } else {
            $kmsRut1 = 0;
            $kmsReales1 = $rut1 - $kmsTranscurridos;
        }
        if($rut2 > $kmsTranscurridos2){
            $kmsRut2 = $rut2 - $kmsTranscurridos2;
            $kmsReales2 = $kmsRut2;
        } else {
            $kmsRut2 = 0;
            $kmsReales2 = $rut2 - $kmsTranscurridos2;
        }
        if($rut3 > $kmsTranscurridos3){
            $kmsRut3 = $rut3 - $kmsTranscurridos3;
            $kmsReales3 = $kmsRut3;
        } else {
            $kmsRut3 = 0;
            $kmsReales3 = $rut3 - $kmsTranscurridos3;
        }
        if($rut4 > $kmsTranscurridos4){
            $kmsRut4 = $rut4 - $kmsTranscurridos4;
            $kmsReales4 = $kmsRut4;
         
        } else {
            $kmsRut4 = 0;
            $kmsReales4 = $rut4 - $kmsTranscurridos4;
        }
        //Almacenemos los datos de las horas restantes en nuestra base de datos.
        //Table equipos; shall we?
        //SQL order
        $sqlHours = sprintf("INSERT INTO equipos (rutinaKms1, rutinaKms2, rutinaKms3, rutinaKms4,deviceId) VALUES ('%s', '%s', '%s','%s','%s') 
                ON DUPLICATE KEY UPDATE rutinaKms1='%s', rutinaKms2='%s', rutinaKms3='%s', rutinaKms4='%s'
        ",  mysqli_real_escape_string($db, $kmsRut1),
       
            mysqli_real_escape_string($db, $kmsRut2),
            mysqli_real_escape_string($db, $kmsRut3),
            mysqli_real_escape_string($db, $kmsRut4),
            $deviceId,
            $kmsRut1,
            $kmsRut2,
            $kmsRut3,
            $kmsRut4);
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
            'rutina1' => round($row2['rutinaKms1'],2),
            'rutina2' => round($row2['rutinaKms2'],2),
            'rutina3' => round($row2['rutinaKms3'],2),
            'rutina4' => round($row2['rutinaKms4'],2),
            'kmsReales1' => $kmsReales1,
            'kmsReales2' => $kmsReales2,
            'kmsReales3' => $kmsReales3,
            'kmsReales4' => $kmsReales4
        );
          
        
    }
    $x = json_encode($sendMe);
    echo $x;

 
?>