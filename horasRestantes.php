<?php 

require 'php/auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horas restantes</title>
      <!-- Jquery-->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/horasRestantes.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    
    <script src='js/fullScreen.js'></script>
    <style>
        
        input{
            width:100%;
            
        }
        .dot{cursor: pointer;color:rgb(7, 105, 253);}

         /*End so far*/
         .btnn{
            height: 50px;
            
        }
        html,body{
            height:100%;
        }
        .col2{
            background-color: #ffffff;
            min-height: 100%;
        }
        .main{
            
            height:100%;
        }
        .in::placeholder{
            color:aquamarine;
        }
        .poin{cursor:pointer;display:none;}
        .hid{
            display:none;
        }
        .colorFul{
            font-weight: 600;
        }
        #userVehiculos{
            display:none;
        }
        
  
        
    </style>
    <script>
        $(document).ready(function(){


            $('.g').height ($(document).height() - $('.navbar').outerHeight() );
            $('.col2').height($(document).height()*1.1);

            

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

    <div class="container-fluid main">
        <div class="row g">

            <div class='col-2 col2'>
                    <div class="row mt-4 relative">
                        <!--button id='historial' class="btn-block btn-success btnn" >Historial de mantenimientos</button-->
                        <img class='abso_icons' src='css/img/time.svg' width='24px' height="24px"><span id='historial' class='boton  adminBtn'> Historial </span>
                    </div>

                    
                    
                    <div class="row my-2 relative">                       
                        <!--button id='vehiculo' class="btn-block btn-success btnn adminBtn" >Vehículos</button-->
                        <span id='vehiculo' class='boton adminBtn'> Vehículos </span>
                        <img class='abso_icons' src='css/img/vehiculo.svg' id='vehi_icon' width='24px' height="24px">
                    </div>
                    <div class="row my-2 relative">
                        <!--button id='usuarios' class="btn-block btn-success btnn adminBtn">Usuarios</button-->
                        <span id='usuarios' class='boton adminBtn'> Usuarios </span>
                        <img class='abso_icons' src='css/img/users.svg' id='users' width='24px' height="24px">
                    </div>
                
                    <div class="row my-2 relative">
                        <!-- Register_app -->
                        <!--button id='register' class="btn-block btn-success btnn adminBtn">Registrar mantenimiento</button-->
                        <span id='register' class='boton adminBtn'> Registros </span>
                        <img class='abso_icons' src='css/img/note.svg' id='note' width='24px' height="24px">
                    </div>
                    <div class='row my-2 relative'>
                        <span id='logout' class='boton logOut'> Cerrar Sesión </span>
                        <img class='abso_icons logOut' src='css/img/logout.svg'  width='24px' height="24px">
                    </div>
                
            </div>


            <div class='col-10'>
                    <div class="row relative">
                        <div class='contenedor'>
                            <div class="col-12"> 
                                <h5 class='mt-1'>Horas para siguientes mantenimientos:</h5>
                                <hr>
                                <table class='table  table-sm mt-4'>
                                    <thead class=''>
                                        <tr>
                                            <td>id</td>
                                            <td>Nombre</td>
                                            <td>Tiempo Motor<br><span style='font-size:11px; color:gray'>En horas</span></td>

                                            <!--td>Última rutina<br><span style='font-size:11px; color:gray'>En horas</span></td>
                                            <td>Horas transcurridas</td-->
                                            <td class='rel'>
                                                Rutina 1
                                                <img title="<ul id='wrapper'>
                                                                <li>Revisión del nivel de aceite del eje trasero y delantero (TDM).</li>
                                                                <li>Revisión del nivel de aceite de mandos finales.</li>
                                                                <li>Inspeccionar y limpiar filtros de aire primario y válvula de descarga de polvo.</li>
                                                                <li>Revisar y limpiar filtro separador de agua de sistema combustible.</li>
                                                                <li>Revisión del nivel de electrolito y de los bornes de la batería.</li>
                                                                <li>Revisión de niveles de aceite del sistema hidráulico y transmisión.</li>
                                                                <li>Revisión del nivel de refrigerante. Estado del radiador y mangueras.</li>
                                                                <li>Revisión del estado de la(s) correa(s) del motor y comprobar tensión.</li>
                                                                <li>Cambio de aceite y del filtro del motor.</li>
                                                                <li>Lubricar puntos de pivote de cargadora, excavadora y estabilizadores.</li>
                                                                <li>Lubricar crucetas de cardanes.</li>
                                                                <li>Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas.</li>
                                                                <li>Chequear lineas hidráulicas por fugas, desgastes, soportes flojos, etc.</li>
                                                                <li>Chequeo del funcionamiento del sistema eléctrico y luces.</li>
                                                                <li>Limpieza general.</li>
                                                            </ul>" container="body"  class='absImg' src='css/img/information.png' width=16 data-toggle="tooltip" data-placement="left" data-html="true" >    <br>
                                            
                                                <span style='font-size:11px; color:gray'>Horas restantes</span>
                                            </td>
                                            <td class='rel'>
                                                Rutina 2
                                                <img title="<ul>
                                                                <li>Revisión de la manguera de admisión de aire.</li>
                                                                <li>Cambio del filtro de aceite del sistema hidráulico.</li>
                                                                <li>Revisión del par de apriete del pasador entre el aguijón y el brazo.</li>
                                                                <li>Revisar funcionamiento de frenos de servicio y estacionamiento.</li>
                                                                <li>Cambio del filtro del combustible y separador de agua.</li>
                                                                <li>Cambio del filtro de la transmisión.</li>
                                                            </ul>" data-toggle="tooltip" data-placement="left" data-html="true" container="body" class='absImg' src='css/img/information.png' width=16>    <br>
                                            
                                                <span style='font-size:11px; color:gray'>Horas restantes</span>
                                            </td>
                                            <td class='rel'>
                                                Rutina 3
                                                <img title="<ul>
                                                                <li>Cambio de aceite del eje delantero y trasero.</li>
                                                                <li>Revisón y ajuste del varillaje de control de velocidad del motor.</li>
                                                                <li>Cambios de aceite y filtros del sistema hidráulico.</li>
                                                                <li>Limpieza del tubo del respiradero del carter del motor.</li>
                                                                <li>Cambio del aceite y filtro de la transmisión y convertidor de par.</li>
                                                                <li>Cambio de aceite de mandos finales.</li>
                                                                <li>Sustitución de los elementos de filtro de aire.</li>
                                                            </ul>" container="body" data-toggle="tooltip" data-placement="left" data-html="true" class='absImg' src='css/img/information.png' width=16>    <br>
                                            
                                                <span style='font-size:11px; color:gray'>Horas restantes</span>
                                            </td>
                                            <td class='rel'>
                                                Rutina 4
                                                <img title="<ul>
                                                                <li>Revisión del nivel de aceite del eje trasero y delantero (TDM).</li>
                                                                <li>Revisión del nivel de aceite de mandos finales.</li>
                                                                <li>Inspeccionar y limpiar filtros de aire primario y válvula de descarga de polvo.</li>
                                                                <li>Revisar y limpiar filtro separador de agua de sistema combustible.</li>
                                                                <li>Revisión del nivel de electrolito y de los bornes de la batería.</li>
                                                                <li>Revisión de niveles de aceite del sistema hidráulico y transmisión.</li>
                                                                <li>Revisión del nivel de refrigerante. Estado del radiador y mangueras.</li>
                                                                <li>Revisión del estado de la(s) correa(s) del motor y comprobar tensión.</li>
                                                                <li>Cambio de aceite y del filtro del motor.</li>
                                                                <li>Lubricar puntos de pivote de cargadora, excavadora y estabilizadores.</li>
                                                                <li>Lubricar crucetas de cardanes.</li>
                                                                <li>Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas.</li>
                                                                <li>Chequear lineas hidráulicas por fugas, desgastes, soportes flojos, etc.</li>
                                                                <li>Chequeo del funcionamiento del sistema eléctrico y luces.</li>
                                                                <li>Limpieza general.</li>
                                                                <li>Revisión de la manguera de admisión de aire.</li>
                                                                <li>Cambio del filtro de aceite del sistema hidráulico.</li>
                                                                <li>Revisión del par de apriete del pasador entre el aguijón y el brazo.</li>
                                                                <li>Revisar funcionamiento de frenos de servicio y estacionamiento.</li>
                                                                <li>Cambio del filtro del combustible y separador de agua.</li>
                                                                <li>Cambio del filtro de la transmisión.</li>
                                                                <li>Cambio de aceite del eje delantero y trasero.</li>
                                                                <li>Revisón y ajuste del varillaje de control de velocidad del motor.</li>
                                                                <li>Cambios de aceite y filtros del sistema hidráulico.</li>
                                                                <li>Limpieza del tubo del respiradero del carter del motor.</li>
                                                                <li>Cambio del aceite y filtro de la transmisión y convertidor de par.</li>
                                                                <li>Cambio de aceite de mandos finales.</li>
                                                                <li>Sustitución de los elementos de filtro de aire.</li>
                                                                <li>Drenaje y reemplazo de refrigerante motor.</li>
                                                                <li>Ajuste del juego de válvulas del motor.</li>
                                                            </ul>" data-toggle="tooltip" data-placement="left" data-html="true" container="body" class='absImg' src='css/img/information.png' width=16>    <br>
                                            
                                                <span style='font-size:11px; color:gray'>Horas restantes</span>
                                            </td>
                                        
                                        
                                        
                                        
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros'>
                                        
                                    </tbody>

                                </table>
                                <h5 class='mt-1'>Ciclos:</h5>
                                <hr>
                                <table class='table   table-sm mt-1'>
                                    <thead class=' '>
                                        <tr>
                                            <td>Última R1</td>
                                            <td>Horas trans</td>
                                            <td>Última R2</td>
                                            <td>Horas trans</td>
                                            <td>Última R3</td>
                                            <td>Horas trans</td>
                                            <td>Última R4</td>
                                            <td>Horas trans</td>
                                        
                                            
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros2'>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                          

                    </div>

                    <!--div class="row">
                        <div class="col-2">
                            <button class='restartM'>Mantenimiento realizado</button>
                        </div>
                        <div class="col-5"></div>
                        <div class="col-5"></div>
                    </div-->
                    
                   

            </div>
            

        </div>
    </div>

    <script src='horasRestantesApp.js'></script>
</body>
</html>