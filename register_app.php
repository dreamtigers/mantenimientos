<?php 

    require 'php/auth.php';

    function fill_equipos(){
        include('php/database.php');
        $output = '';
        $sql = 'SELECT * FROM equipos';
        $res = mysqli_query($db, $sql);

        while ($row = mysqli_fetch_array($res)){
            $output .= '<option value="'.$row['deviceId'].'">'.$row['equipo'].'</option>';
        }
        return $output;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Merienda|Nanum+Myeongjo&display=swap" rel="stylesheet"--> 
    <!-- Lets now put the css on point -->
    <link rel='stylesheet' href='css/register_app.css'>
    <title>Vehiculos</title>
    <script>
            $(document).ready(function(){


                
                $('.full').height($(window).height() );

                $('.g').height($(document).height());



            });
    </script>
</head>
<body>

        
    <nav class="navbar narvbar-expand">
                        <a href="#" class="navbar-brand dashi"><img class='menuHambur' src='css/img/hambur.png' width='24'></a>
                        <!--img src='img/backArrow.png' class='ml-4 poin' width="30"></img-->
                        
                        <ul class="navbar-nav ml-auto hid">
                            <form action="" class="form-inline my-lg-0 lookForm">
                                <input  autocomplete="off" type="search" id='lookIt' class='form-control in mr-5' placeholder="Buscar...">
                              
                            </form>
                        </ul>
    </nav>
    
    <div class="container-fluid g">
  


        <div class="row g">

            <div class='col-2 col2'>
                <div class="row mt-4 relative">                       
                        <!--button id='vehiculo' class="btn-block btn-success btnn adminBtn" >Vehículos</button-->
                        <span id='mantenimiento' class='boton adminBtn'> Mantenimientos </span>
                        <img class='abso_icons' src='css/img/note.svg' id='note' width='24px' height="24px">
                       
                    </div>
                    <div class="row my-2 relative">
                        <!--button id='historial' class="btn-block btn-success btnn" >Historial de mantenimientos</button-->
                        <img class='abso_icons' src='css/img/time.svg' width='24px' height="24px"><span id='historial' class='boton  adminBtn'> Historial </span>
                    </div>

                    <div class="row my-2 relative">
                        <!--button id='usuarios' class="btn-block btn-success btnn adminBtn">Usuarios</button-->
                        <span id='usuarios' class='boton adminBtn'> Usuarios </span>
                        <img class='abso_icons' src='css/img/users.svg' id='users' width='24px' height="24px">
                    </div>
                
                    <div class="row my-2 relative">
                        <!-- Register_app -->
                        <!--button id='register' class="btn-block btn-success btnn adminBtn">Registrar mantenimiento</button-->
                        <span id='vehiculos' class='boton adminBtn'> Vehículos </span>
                        <img class='abso_icons' src='css/img/vehiculo.svg' id='vehi_icon' width='24px' height="24px">
                      
                    </div>
                    <div class='row my-2 relative'>
                        <span id='logout' class='boton logOut'> Cerrar Sesión </span>
                        <img class='abso_icons logOut' src='css/img/logout.svg'  width='24px' height="24px">
                    </div>
                
            </div>

            <div class='col-10'>
                <!-- Hardcore changes -->
                <div class='row'>
                    <div class="col-12 full relative">
                        
                        <div class='contenedor'>
                            
                            <span class='' style='font-size:16px;'>Registros:</span>
                            <hr style='margin-top:0px'>
                             <table class='table table-sm mt-2 tableOfMine '>
                                <thead class='tablaNormal'>
                                    <tr>
                                        <td>ID</td>
                                        <td id='equipoCol' >Equipo</td>
                                        <td>Marca</td>
                                        <td>Modelo</td>
                                        <td>Serial</td>
                                        <td>Arreglo</td>
                                        <td>Placa</td>
                                        <td>Rutina
                                            
                                        </td>
                                        
                                        
                                    </tr>
                            
                                </thead>
                              
                                
                                <!-- Id registros, time to shine
                                -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                <tbody id='registros'>
                                    
                                </tbody>
                            </table>

                        </div>
                            
        
        
                        <img class='abs' src='css/img/plus.png' width='40'>    
                        
                            
                    </div>
                
                </div>



                <div class='row'>

                    <div class='col-12'>

                    <div class="mt-1">
                            <form id='actividades'>
                                <!-- From here, rutina 1
                                    Primeros 15 -->
                                <div class='rut1 rut4'>
                                    <div class='row'>
                                        <div class='col-7'>
                                            <label for='a_1'><span class='actividadesClass'>1)Revisión de aceite de eje trasero y delantero(TDM)</span></label>
                                        </div>
                                        <div class='col-2'> 
                                            <input id='a_1' type='checkbox'>
                                        </div>

                                        <div class='col-3' >
                                          
                                                <textarea id='act1' type='text' class='ocultar inputAct' ></textarea>
                                           
                                        </div>
                                    
                                 
                                    </div>
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_2'><span class='actividadesClass'>2)Revisión del nivel de aceite de mandos finales</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_2' type='checkbox'></div>
                                        <div class='col-3'>

                                            <textarea id='act2' type='text' class='ocultar inputAct' ></textarea>

                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_3'><span class='actividadesClass'>3)Inspeccionar y limpiar filtro de aire primario y válvula de descarga de polvo.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_3' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act3' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_4'><span class='actividadesClass'>4)Revisar y limpiar filtro separador de agua del sistema combustible.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_4' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act4' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
        
                                        <div class='col-7'>
                                            <label for='a_5'><span class='actividadesClass'>5)Revisión de niveles de electrolito y bornes de batería.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_5' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act5' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
        
                                    </div>
                                
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_6'><span class='actividadesClass'>6)Revisión de niveles de aceite del sistema hidráulico y transmisión</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_6' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act6' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                            
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_7'><span class='actividadesClass'>7)Revisión del nivel de refrigerante. Estado del radiador y mangueras.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_7' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act7' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_8'><span class='actividadesClass'>8)Revisión del estado de la correa de motor y comprobar tensión.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_8' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act8' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
        
                                        <div class='col-7'>
                                            <label for='a_9'><span class='actividadesClass'>9)Cambio de aceite y filtro del motor.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_9' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act9' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_10'><span class='actividadesClass'>10)Lubricar puntos de pivote de cargadora, excavadora y estabilizadores</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_10' type='checkbox'></div>
                                        <div class='col-3'>
                                      <textarea id='act10' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                        
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_11'><span class='actividadesClass'>11)Lubricar crucetes de cardanes</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_11' type='checkbox'></div>
                                        <div class='col-3'>
                                          <textarea id='act11' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_12'><span class='actividadesClass'>12)Revisión de estado y presión de neumáticos. Chequeo del apriete de tuercas.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_12' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act12' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
        
                                        <div class='col-7'>
                                            <label for='a_13'><span class='actividadesClass'>13)Chequear lineas hidráulicas por fugas.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_13' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act13' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
        
                                    </div>
                                    
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_14'><span class='actividadesClass'>14)Chequeo del funcionamiento del sistema eléctrico y luces.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_14' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act14' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                <div class='rut1 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_15'><span class='actividadesClass'>15)Limpieza general.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_15' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act15' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                <!-- Up to here, rutina 1 -->
                                <!-- From now on, rutina 2 -->
                                <div class='rut2 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_16'><span class='actividadesClass'>16)Revisión de la manguera de admisión de aire.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_16' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act16' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut2 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_17'><span class='actividadesClass'>17)Cambios del filtro de aceite del sistema hidráulico.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_17' type='checkbox'></div>
                                        <div class='col-3'>
                                             <textarea id='act17' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                <div class='rut2 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                        <label for='a_18'><span class='actividadesClass'>18)Revisión del par de apriete del pasador entre el aguilón y el brazo.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_18' type='checkbox'></div>
                                        <div class='col-3'>
                                             <textarea id='act18' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut2 rut4'>
                                    <div class="row">
        
                                        <div class='col-7'>
                                            <label for='a_19'><span class='actividadesClass'>19)Revisar funcionamiento de frenos de servicio y estacionamiento.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_19' type='checkbox'></div>
                                        <div class='col-3'>
                                          <textarea id='act19' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
        
                                    </div>
                                    
                                </div>
                                <div class='rut2 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_20'><span class='actividadesClass'>20)Cambios del filtro del combustible y separador de agua.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_20' type='checkbox'></div>
                                        <div class='col-3'>
                                          <textarea id='act20' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut2 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_21'><span class='actividadesClass'>21)Cambios del filtro de la transmisión.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_21' type='checkbox'></div>
                                        <div class='col-3'>
                                      <textarea id='act21' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <!-- From now on, rutine 3-->
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_22'><span class='actividadesClass'>22)Cambio de aceite de eje delantero y trasero.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_22' type='checkbox'></div>
                                        <div class='col-3'>
                                        <textarea id='act22' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_23'><span class='actividadesClass'>23)Revisión y ajuste del vanillaje de control de velocidad del motor.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_23' type='checkbox'></div>
                                        <div class='col-3'>
                                       <textarea id='act23' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_24'><span class='actividadesClass'>24)Cambios de aceite y filtro del sistema hidráulico.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_24' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act24' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_25'><span class='actividadesClass'>25)Limpieza de tubo del respiradero de carter del motor.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_25' type='checkbox'></div>
                                        <div class='col-3'>
                                         <textarea id='act25' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_26'><span class='actividadesClass'>26)Cambio de aceite y filtro de la transmisión y convertidor en par</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_26' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act26' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_27'><span class='actividadesClass'>27)Cambio de aceite de mandos finales</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_27' type='checkbox'></div>
                                        <div class='col-3'>
                                     <textarea id='act27' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class='rut3 rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_28'><span class='actividadesClass'>28)Sustitución de los elementos de filtro de aire</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_28' type='checkbox'></div>
                                        <div class='col-3'>
                                          <textarea id='act28' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <!-- Up to here, rutina 3 -->
                                <!-- From now on, rutine 4-->
                                <div class='rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_29'><span class='actividadesClass'>29)Drenaje y reemplazo de refrigerador motor</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_29' type='checkbox'></div>
                                        <div class='col-3'>
                                           <textarea id='act29' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                                <div class='rut4'>
                                    <div class="row">
                                        <div class='col-7'>
                                            <label for='a_30'><span class='actividadesClass'>30)Ajuste de juego de válvulas del motor.</span></label>
                                        </div>
                                        <div class='col-2'>  <input id='a_30' type='checkbox'></div>
                                        <div class='col-3'>
                                            <textarea id='act30' type='text' class='ocultar inputAct' ></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </form>
                        </div>

                    </div>

                </div>


                <div class='row'>
                    <div class="col-12">
                        

                        <div class="card mt-2 addThem">
                            <div class='relative'><span class='add'>Agregar Registro:</span></div>
                            <hr style='margin-top:30px;'>
                            <div class="card-body">

                                <form id='registerForm'>
                                    <div class="form-group">
                                        
                                        <div class='mb-2' style='margin-top:-26px;'>
                                            <span>Datos generales del vehículo:</span>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-10"> 
                                                <select name='equipos' id='equipos'>  
                                                    <option value=''>Equipo:</option> 
                                                    <?php echo fill_equipos(); ?>
                                                </select> 
                                            </div>
                                            <div class="col-2"><input class='inputs' autocomplete='off' type="number" id='anoFabricacion' placeholder="año de fabricación"></div>
                                            <span id='anoSugerido' class='sugerencia'></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                        
                                                <div class="col-2">  <input class='inputs'  autocomplete='off'  type="text" id="marca" placeholder="marca"> </div>
                                                <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='modelo' placeholder="modelo"></div>
                                                <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='serial' placeholder="serial"></div>
                                                <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='placa' placeholder="placa"></div>
                                                <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='kilometraje' placeholder="kilometraje"></div>
                                                <div class="col-2"><input class='inputs' autocomplete='off' type="number" id='horasUso' placeholder="horas de uso"></div>
                                            
                                            </div>
                                    </div>
                                    
                                    <div class='mb-1' style=''>
                                            <span>Datos generales del servicio:</span>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <div class="col-4"><input class='inputs' autocomplete='off' type="text" id='ubicacion' placeholder="ubicación"></div>
                                                <span id='ubicacionSugerida' class='sugerencia'></span>
                                                
                                                <div class="col-4"><input class='inputs' autocomplete='off' type="number" id='arreglo' placeholder="arreglo"></div>

                                                <!--div class="col-3">
                                                  
                                                    <select class='inputs' name='tipoMantenimiento' id='tipoMantenimiento'>
                                                        <option value='0'>Rutina</option>
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                    </select>
                                                </div-->

                                                <div class="col-4"><input class='inputs' autocomplete='off' type="date" id='fechaIngreso'></div><br>
                                                <span id='fechaSugerida' class='sugerencia'></span>

                                            </div>
                                        
                                    </div>
                                   
                                    <div class='mb-1' style=''>
                                            <span>Filtros:</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row rowRelative">
                                            
                                            <div class="col-4"><input class='inputs' autocomplete='off' type="text" id='filtroAceiteMotor' placeholder="aceite del motor"></div>
                                            <span id='f_aceiteMotor' class='sugerencia'></span>

                                            <div class="col-4"><input class='inputs' autocomplete='off' type="text" id='filtroAirePrimario' placeholder="aire primario"></div>
                                            <span id='f_airePrimario' class='sugerencia'></span>


                                            <div class="col-4"><input class='inputs' autocomplete='off' type="text" id='filtroAireSecundario' placeholder="aire secundario"></div>
                                            <span id='f_aireSecundario' class='sugerencia'></span>

                                         
                                        </div>    
                                    </div>

                                    <div class="form-group">
                                        <div class="row rowRelative">
                                           
                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroTransmision' placeholder="transmisión"></div>
                                            <span id='f_transmision' class='sugerencia'></span>

                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroTanqueHidraulico' placeholder="tanque hidráulico"></div>
                                            <span id='f_tanqueHidraulico' class='sugerencia'></span>

                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroCombustiblePrimario' placeholder="combustible primario"></div>
                                            <span id='f_combustiblePrimario' class='sugerencia'></span>

                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroCombustibleSecundario' placeholder="combustible secundario" ></div>
                                            <span id='f_combustibleSecundario' class='sugerencia'></span>

                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroTanqueGasoil' placeholder="tanque gasoil" ></div>
                                            <span id='f_tanqueGasoil' class='sugerencia'></span>

                                            <div class="col-2"><input class='inputs' autocomplete='off' type="text" id='filtroAceiteHidraulico' placeholder="aceite hidráulico" ></div>
                                            <span id='f_aceiteHidraulico' class='sugerencia'></span>

                                        </div>    
                                    </div>

                                    <div class='mb-1' style=''>
                                            <span>Tipos:</span>
                                    </div>

                                    <div class="form-group">
                                        <div class="row rowRelative">
                                       
                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='tipoAceiteMotor' placeholder="de aceite motor" ></div>
                                            <span id='t_aceiteMotor' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='tipoAceiteTransmision' placeholder="de aceite transmisión" ></div>
                                            <span id='t_aceiteTransmision' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='tipoAceiteCaja' placeholder="de aceite de caja" ></div>
                                            <span id='t_aceiteCaja' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='tipoAceiteHidraulico' placeholder="de aceite hidráulico" ></div>
                                            <span id='t_aceiteHidraulico' class='sugerencia'></span>
                                        </div>    
                                    </div>

                                    <div class='mb-1' style=''>
                                            <span>Capacidades:</span>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="row rowRelative">
                                           
                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='capacidadCarterMotor' placeholder="carter del motor" ></div>
                                            <span id='c_carterMotor' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='capacidadTanqueCaja' placeholder="tanque de la caja" ></div>
                                            <span id='c_tanqueCaja' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='capacidadTanqueTransmision' placeholder="tanque de la transmisión" ></div>
                                            <span id='c_tanqueTransmision' class='sugerencia'></span>

                                            <div class="col-3"><input class='inputs' autocomplete='off' type="text" id='capacidadTanqueHidraulico' placeholder="tanque hidráulico" ></div>
                                            <span id='c_tanqueHidraulico' class='sugerencia'></span>
                                        </div>
                                    </div>

                                    <div class='mb-1 ocultar' style=''>
                                            <span>Observaciones:</span>
                                    </div>
                                    <!--div class="form-group">
                                        <div class="row rowRelative">
                                            <div class="col-12">

                                                <textarea id='observaciones' class='textarea'></textarea>

                                            </div>
                                        </div>
                                    </div-->

             


                                    <button type="" class='btn btn-block btnn'>Guardar</button>
                                </form>

                            </div>

                        </div>
                        
                    </div>
                </div>

            
 

            </div>
           

                
           
        </div>

    </div>
  
    
    <script src='app.js'></script>

</body>
</html>