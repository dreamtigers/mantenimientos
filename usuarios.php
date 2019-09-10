<?php 

require 'php/auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
          <!-- Jquery-->
          <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel='stylesheet' href='css/usuarios.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
        .logOut{
            height:30px;
            line-height: 6px;
        }
        html,body{
            height:100%;
            font-family: 'Roboto', sans-serif;
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
            //$('.col2').height($(document).height()*1.1);

            

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
                        <span id='logout' class='boton'> Cerrar Sesión </span>
                        <img class='abso_icons' src='css/img/logout.svg'  width='24px' height="24px">
                    </div>
            </div>


            <div class='col-3'>
                    <div class="row">

                        <div class="col-12">
                            <div class='conten mt-3'>

                                <h5 class='mt-1'>Usuarios:</h5>
                                <table class='table table-sm mt-4'>
                                    <thead class='tablaNormal'>
                                        <tr>
                                            <!--td>ID</td-->
                                            <td>Nombre:</td>
                                            
                                        
                                        
                                        
                                        
                                        
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros'>
                                        
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>

                    </div>
                  

            </div>
            <div class='col-7'>
                    <div class="row">

                        <div class="col-12"> 
                            <div class='conten mt-3'>
                                <h5 class='mt-1'>y sus Vehículos:</h5>
                                <table class='table table-sm mt-4'>
                                    <thead class='tablaNormal'>
                                        <tr>
                                            <td>Nombre</td>
                                            <td>Velocidad</td>
                                            <td>Distancia recorrida</td>       
                                            <td>Último registro</td>                              
                                            
                                        </tr>
                                
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registro2'>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                    </div>
                  

            </div>

        </div>
    </div>

    <script src='usuariosApp.js'></script>
</body>
</html>