<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merienda|Nanum+Myeongjo&display=swap" rel="stylesheet"> 
    <script src='js/fullScreen.js'></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
    
        .exit{
           position:relative;
           
        }
        .getOut{
            position:absolute;
            left:70px;
            z-index: 10;
        }
        #userVehiculos{
            display:none;
        }
        #vehiculo, #usuarios, #register,#historial{
            display:none;
        }
        
     

    </style>
   
</head>
<body>
    <?php include 'php/nav-template.php' ?>

    <div class="container-fluid main">
      
        <div class="row">
               
            <div class='col-2 col2'>
                    <div class="col mt-4">
                        <button id='historial' class="btn-block btn-success btnn adminBtn" >Historial de mantenimientos</button>
                    </div>


                    <div class="col my-4">
                        <!-- Nueva -->
                        <button  class="btn-block btn-danger btnn " id='userVehiculos'>Vehículos</button>
                    </div>
                    
                    <div class="col my-4">
                        
                        <button id='vehiculo' class="btn-block btn-success btnn adminBtn">Vehículos</button>
                    </div>
                    <div class="col my-4">
                        <button id='usuarios' class="btn-block btn-success btnn adminBtn">Usuarios</button>
                    </div>
                    <div class="col my-4">
                        <!-- Register_app -->
                        <button id='register' class="btn-block btn-success btnn adminBtn">Registrar mantenimiento</button>
                    </div>
                
                  
                    <div class="row exit">
                    
                       
                            <button class="btn exit btn-info btnn getOut">Salir</button>
                        
                       
                    </div
                    
            </div>

                
            </div>



            <div class='col-10'>
                <div class="containter-fluid maini">

                    <div class="row py-5">
                        <div class='col-1'></div>
                        <div class='col-4'>
                            <div class="card options">
                                <div class="card-body op">
                                    <p><h2 class='text-center mt-5'>Mantenimiento 1</h2></p>
                                </div>
                                
                            </div>
                        </div>
                        <div class='col-2'></div>
                        <div class='col-4'>
                            <div class="card options">
                                <div class="card-body op">
                                    <p><h2 class='text-center mt-5'>Mantenimiento 2</h2></p>
                                </div>                               
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                    <div class="row py-5">
                        <div class='col-1'></div>
                        <div class='col-4'>
                            <div class="card options">
                                <div class="card-body op">
                                    <p><h2 class='text-center mt-5'>Mantenimiento 3</h2></p>
                                </div>
                                
                            </div>
                        </div>
                        <div class='col-2'></div>
                        <div class='col-4'>
                            <div class="card options ">
                                <div class="card-body op">
                                    <p><h2 class='text-center mt-5'>Mantenimiento 4</h2></p>
                                </div>                              
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>

                </div>
            </div>
        </div>
       

    </div>

    <script src='dashApp.js'></script>
</body>
</html>