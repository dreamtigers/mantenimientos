<?php 

require 'php/auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historial</title>
      <!-- Jquery-->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel='stylesheet' href='css/historial.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    
    <script src='js/fullScreen.js'></script>
    <style>
        #userVehiculos{
            display:none;
        }
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
        
        .poin{cursor:pointer;display:none;}
        .hid{
            display:none;
        }
        .colorFul{
            font-weight: 600;
        }
  
        
    </style>
    <script>
        $(document).ready(function(){


            $('.g').height ($(document).height());
            //$('.col2').height($(document).height());

            

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
                        <!--button id='vehiculo' class="btn-block btn-success btnn adminBtn" >Vehículos</button-->
                        <span id='mantenimientos' class='boton adminBtn'> Mantenimientos </span>
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
                        <span id='register' class='boton adminBtn'> Vehiculos </span>
                        <img class='abso_icons' src='css/img/vehiculo.svg' id='vehi_icon' width='24px' height="24px">
                       
                    </div>
                    <div class='row my-2 relative'>
                        <span id='logout' class='boton logOut'> Cerrar Sesión </span>
                        <img class='abso_icons logOut' src='css/img/logout.svg'  width='24px' height="24px">
                    </div>
                
            </div>

            <div class='col-10'>
                    <div class="row">

                        <div class="col-12"> 
                            <div class='conten mt-3'>
                                <h5 class='mt-1'>Seleccione un vehículo para ver su mantenimiento:</h5>
                                <table class='table  table-sm mt-4'>
                                    <thead class=''>
                                        <tr>
                                            <!--td>id</td-->
                                            <td><span style='font-weight:700;'>Nombre</span></td>
                                            <td><span style='font-weight:700;'>Tiempo Motor<br></span>   <span style='font-size:11px; color:gray'>En horas</span></td>

                                            <!--td>Última rutina<br><span style='font-size:11px; color:gray'>En horas</span></td>
                                            <td>Horas transcurridas</td-->
                                        
                                        
                                        
                                        
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                        -->
                                    <tbody id='registros'>
                                        
                                    </tbody>

                                </table>
                            </div>
                            
                            <!--table class='table  table-bordered table-sm mt-1'>
                                <thead class='table-dark '>
                                    <tr>
                                        <td>Última rutina 1</td>
                                        <td>Horas transcurridas</td>
                                        <td>Última rutina 2</td>
                                        <td>Horas transcurridas</td>
                                        <td>Última rutina 3</td>
                                        <td>Horas transcurridas</td>
                                        <td>Última rutina 4</td>
                                        <td>Horas transcurridas</td>
                                    
                                        
                                    </tr>
                            
                                </thead>
                                
                               
                                <tbody id='registros2'>
                                    
                                </tbody>
                                
                            </table-->
                        </div>

                    </div>

                  
                    
                   

            </div>
            

        </div>
    </div>

    <script src='historialApp.js'></script>
</body>
</html>