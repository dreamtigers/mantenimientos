<?php
    session_start();
     //Let's set a flag to guide us
    $ok = true;   //flag
    include('database.php');
    /** Recordemos que estamos recibiendo un objeto vía POST
     * con una propiedad 'tipoEquipo'
     */
    if(isset($_POST['fecha'])){
       
      
        /* Validating añoF */
        if (!isset($_POST['fecha']) || ($_POST['fecha'] === '')){
            $ok = false;
            //$tipoEquipoErr='Diga el tipo de dispositivo.**';
        } else {
            $fecha = $_POST['fecha'];
        }
        /** Validating kilometraje */
        if (!isset($_POST['kilometraje']) || ($_POST['kilometraje'] === '')){
            $ok = false;
            //$marcaErr='¿Cual es la marca del equipo?**';
        } else {
            $kilometraje = $_POST['kilometraje'];
        }
         /** Validating horasUso */
         if (!isset($_POST['horasUso']) || ($_POST['horasUso'] === '')){
            $ok = false;
            //$modeloErr='Ingrese modelo del dispositivo.**';
        } else {
            $horasUso = $_POST['horasUso'];
        }   
        /** Validating serial */
        if (!isset($_POST['anoF']) || ($_POST['anoF'] === '')){
           $ok = false;
           //$serialErr='Indique el serial de su dispositivo.**';
        } else {
            $anoF = $_POST['anoF'];
        }
        /** Validating arreglo */
        if (!isset($_POST['ubicacion']) || ($_POST['ubicacion'] === '')){
            $ok = false;
            //$arregloErr='¿Cual es su arreglo?**';
        } else {
            $ubicacion = $_POST['ubicacion'];
        }
     
       
        /** Mandando valor al front End */
        echo json_encode(array("ok"=>$ok));
       

        if($ok){
            //SQL order
            /** Session variable captured from getSimpleTask. */
            $id = $_SESSION['myId'];
            $sql = sprintf ("UPDATE datosIngreso SET fechaIngreso='%s', kilometraje='%s', horasDeUso='%s',anoFabricacion='%s',ubicacion='%s'  WHERE id LIKE '%s' ", 
                mysqli_real_escape_string($db, $fecha),
                mysqli_real_escape_string($db, $kilometraje),
                mysqli_real_escape_string($db, $horasUso),
                mysqli_real_escape_string($db, $anoF),
                mysqli_real_escape_string($db, $ubicacion),
                $id);
                /** They are all done now */         
                //$marca = $modelo = $serial = $arreglo = $placa = $tipoMantenimiento = $tipoEquipo = '';
                
                mysqli_query($db, $sql);
                mysqli_close($db);
        }   
    }


?>