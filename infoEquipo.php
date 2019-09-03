<?php 

require 'php/auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Información</title>
      <!-- Jquery-->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/infoEquipo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    
    <script src='js/fullScreen.js'></script>
   
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
                        <span id='mantenimientos' class='boton adminBtn'> Mantenimientos </span>
                        <img class='abso_icons' src='css/img/note.svg' id='note' width='24px' height="24px">
                      
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
                    <div class="row relative">
                    
                        <div class='contenedor'>
                            <div class="col-12">
                            <div class='back'><img width='32px' src='css/img/left-arrow.svg'></div>
                                <h5 class='mt-1'>Información del equipo.</h5>
                               
                                <table class='table  table-sm mt-4'>
                                    <thead class='tabledark'>
                                        <tr>
                                            <td>id</td>
                                            <td>Nombre</td>
                                            <td>Tiempo Motor</td>
                                            <td>Kilometraje</td>
                                            <!--td>Última rutina<br><span style='font-size:11px; color:gray'>En horas</span></td>
                                            <td>Horas transcurridas</td-->
                                            <td class='rel'>
                                                Marca
                                               
                                            </td>
                                            <td class='rel'>
                                                Modelo
                                                
                                            </td>
                                            <td class='rel'>
                                                Serial
                                                
                                            </td>
                                            <td class='rel'>
                                                Placa
                                                
                                            </td>
                                        
                                        
                                        
                                        
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros'>
                                        
                                    </tbody>

                                </table>
                            
                               
                                <table class='table   table-sm' style='margin-top:-10px;'>
                                    <thead class='tabledark'>
                                        <tr style='height:40px;'>
                                            <td style='width:10%'>Arreglo</td>
                                            <td style='width:10%;'>Año<br> <span class='aceites'>de fabricación</span></td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Aceite motor</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Aceite hidráulico</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Aire primario</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Aire secundario</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Transmisión</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Tanque hidráulico</span>
                                            </td>
                                        
                                            
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros2'>
                                        
                                    </tbody>
                                    
                                </table>

                                <table class='table   table-sm' style='margin-top:-10px;'>
                                    <thead class='tabledark'>
                                        <tr style='height:40px;'>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Combustible primario</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Combustible secundario</span>
                                            </td>
                                            <td class='this'>Filtro <br> 
                                                <span class='aceites'>Tanque gasoil</span>
                                            </td>
                                            <td class='this'>Tipo <br> 
                                                <span class='aceites'>Aceite hidráulico</span>
                                            </td>
                                            <td class='this'>Tipo <br> 
                                                <span class='aceites'>Aceite motor</span>
                                            </td>
                                            <td class='this'>Tipo <br> 
                                                <span class='aceites'>Aceite transmisión</span>
                                            </td>
                                         
                                        
                                            
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros3'>
                                        
                                    </tbody>
                                    
                                </table>

                                <table class='table   table-sm' style='margin-top:-10px;'>
                                    <thead class='tabledark'>
                                        <tr style='height:40px;'>
                                            <td class='this'>Tipo  <br> 
                                                <span class='aceites'>De aceite de caja</span>
                                            </td>
                                            <td class='this'>Capacidad <br> 
                                                <span class='aceites'>Del carter del motor</span>
                                            </td>
                                            <td class='this'>Capacidad <br> 
                                                <span class='aceites'>Del tanque de la caja</span>
                                            </td>
                                            <td class='this'>Capacidad <br> 
                                                <span class='aceites'>Del tanque de transmision</span>
                                            </td>
                                            <td class='this'>Capacidad <br> 
                                                <span class='aceites'>Del tanque hidraulico</span>
                                            </td>
                                          
                                         
                                        
                                            
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros4'>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                          

                    </div>

                  
                    
                   

            </div>
            

        </div>
    </div>

    <script src='infoEquipoApp.js'></script>
</body>
</html>