<?php 

require 'php/auth.php';

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
    <link href="https://fonts.googleapis.com/css?family=Merienda|Nanum+Myeongjo&display=swap" rel="stylesheet"> 
    <title>Registrar vehículo.</title>
    <style>
        body{
            font-family: 'Merienda', cursive;
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
            background-color: #5FA2DD;
            min-height: 100%;
        }
        .maini{
            
            height:100%;
        }
        

        
    </style>
    <script>
    $(document).ready(function(){


         $('.g').height ($(window).height() - $('.navbar').outerHeight() );




    });
    </script>
</head>
<body>

    <?php include 'php/nav-template.php'; ?>

    <div class="container-fluid">
        <div class="row g"> <!-- So control panel goes all the way down, with or without info on the db -->

            <div class='col-2 col2'>
                <div class="col mt-4">
                    <button id='historial' class="btn-block btn-danger btnn" >Historial de mantenimientos</button>
                </div>
                <div class="col my-4">
                <button id='vehiculo' class="btn-block btn-success btnn">Vehículos</button>
                </div>
                <div class="col my-4">
                    <button id='register' class="btn-block btn-success btnn">Registrar mantenimiento</button>
                </div>
                <div class="col my-4">
              
                    <button id='registrarVehiculo' class="btn-block btn-success btnn">Registrar vehículos</button>
                </div>
                <div class="col my-4">
                    <button class="btn-block btn-danger btnn">Usuarios</button>
                </div>
            </div>

            <div class="col-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <form id='registerForm'>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"> <label for='fechaIngreso'>Fecha de Ingreso</label></div>
                                    <div class="col">  <input class='inputs' autocomplete='off'  type="date" id="fechaIngreso" placeholder="Fecha de ingreso"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col"> <label for='kilometraje'>Kilometraje</label></div>
                                        <div class="col">  <input autocomplete='off'  type="text" id="kilometraje" placeholder="Kilometraje"> </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"><label for="horasUso">Horas de uso:</label></div>
                                    <div class="col"><input class='inputs' autocomplete='off' type="text" id='horasUso' placeholder="Horas de uso"></div>
                                </div>
                                    
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"><label for="anoFabricacion">Año de Fabricación:</label></div>
                                    <div class="col"><input class='inputs' autocomplete='off' type="date" id='anoFabricacion' placeholder="Año de Fabricación"></div>
                                </div>
                                    
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"><label for="ubicacion">Ubicación:</label></div>
                                    <div class="col"><input class='inputs' autocomplete='off' type="text" id='ubicacion' placeholder="Ubicación"></div>
                                </div>
                                   
                            </div>
                           
                            
                            <button type="" class='btn btn-primary btn-block'>Guardar</button>
                        </form>
                    </div>
                </div>
            </div>

            
            <div class="col-6">
                
                <table class='table table-bordered table-sm mt-4'>
                    <thead class='tablaNormal'>
                        <tr>
                            <td>ID</td>
                            <td>Propietario</td>
                            <td>Fecha de ingreso</td>
                            <td>Kilometraje</td>
                            <td>Horas de Uso</td>
                            <td>Año de Fabricación</td>
                            <td>Ubicación</td>
                           
                           
                            <td>
                                <button class='btn btn-info logOut'>Salir</button>
                            </td>
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
  
    
    <script src='datosDeIngresoApp.js'></script>

</body>
</html>