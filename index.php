<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <meta name="viewport" content="width=900, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="main.css" media="all" >
    <!-- Bootstrap 4 down here-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- End bootstrap -->
    <script>
    
    $(document).ready(function(){


        $('.col7').height($(window).height());
        //$('.col2').height( ( $(document).height()+$('.navbar').outerHeight() )*2);
        $(".backG").css({
            'margin-left': (-15 + 'px'),
            'width': ($(".col7").width() + 30 + 'px')
        });

    });
    
    </script>
</head>
<body>

    <?php
        session_start();

        /** Thanks to Ivalenzuela for these 2 functions */
        function strToHex($string){
            $hex='';
            for ($i=0; $i < strlen($string); $i++){
                $hex .= dechex(ord($string[$i]));
            }
            return strtoupper($hex);
        }
    
    
        function hexToStr($hex){
            $string='';
            for ($i=0; $i < strlen($hex)-1; $i+=2){
                $string .= chr(hexdec($hex[$i].$hex[$i+1]));
            }
            return $string;
        }


        $email = '';
        $errorMsg = $storedHash = $hashed = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){


            if($_POST['email']==''){
                //Are you kidding? Type something.
                if($_POST['email']==''){

                        $email = $_POST['email'];
                            $errorMsg = 'No insertó email alguno.';
                            // lets try to not
                            //echo $errorMsg;
                    }

            }

            else{
                $db = mysqli_connect("dbpistongps.crg0q1tctueu.us-east-2.rds.amazonaws.com", "mantenimientos", "Unaclavelargaysegura","dbpistongps");

                if (mysqli_connect_errno())
                {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = sprintf("SELECT * FROM tc_users WHERE email ='%s'",
                mysqli_real_escape_string($db, $_POST['email']));



                $result = mysqli_query($db, $sql);
                // We could iterate over the $result but, instead, we are going to use the fetch function
                // Fetching an associative array, which represents our user.
                $row = mysqli_fetch_assoc($result);
                // then, if the user exists
                if (($row)){

                    //Remember Row is just an array holding users info.
                    // HEASDASDASDASDÑASDLASDLASÑDASLDÑASLDÑASDLASÑ Heavy changes down below
                    
                    $p = $_POST['pass'] ;
                    $s = hexToStr($row['salt']);
                    $hashed = hash_pbkdf2("sha1",$p, $s,1000,48);
                
                    $storedHash = $row['hashedpassword'];
                
                    if( ($row['phone'] == $p) || (($hashed)==$row['hashedpassword']) ){
                        //Let's create a SESSION variable so we can remember the user.
                        $_SESSION['user']=$row['name'];
                        $_SESSION['userId']=$row['id'];
                        $_SESSION['isAdmin']=$row['administrator'];

                        //If admind
                        if($_SESSION['isAdmin']==1){
                            echo '<script type="text/javascript">',
                            'alert("Login exitoso; admin.");',
                            'window.setTimeout(function() {',
                                "window.location = 'vehiculos.php';",
                                '}, 0);',
                            '</script>';
                        } elseif ($_SESSION['isAdmin']==0) {
                            echo '<script type="text/javascript">',
                            'alert("Login exitoso; usuario ordinario.");',
                            'window.setTimeout(function() {',
                                "window.location = 'vehiculosU.php';",
                                '}, 0);',
                            '</script>';
                        }
                       
                       

                    } else {
                        if($_POST['pass'] == ''){
                        /*Am I?*/
                        $email = $_POST['email'];
                        $errorMsg = 'Inserte una clave.';
                        //echo $errorMsg;
                        }
                        else{
                            /*Wrong pass*/
                            $email = $_POST['email'];
                            $errorMsg = 'Clave Incorrecta.';
                            //echo $errorMsg;
                        

                            }


                    }
                }else{

                    /*Non-existent user.*/
                    $email = $_POST['email'];
                    $errorMsg = 'Usuario inexistente.';
                    //echo $errorMsg;
                }


                mysqli_close($db);

            }









        }



    ?>

   
    <div class='container-fluid'>
        <div class='row disRow '>
            <div class="col-7 col7 relative">
               
                    <div class='welcome'>
                        <img class='welcomeC' src='css/img/Card.png' >

                    </div>
              
            </div>
           
            <div class="col-5 col5">

               
                   


                      
                    <div class=' gray'>
                        
                        <form id='myform' method='post' action=''>
                        
                          
                            <div class='row mb-2'>


                               
                                    <input value='<?php echo htmlspecialchars($email)?>' class='in' id='email' name='email' type='email' placeholder="Email..." >
                             

                            </div>
                            <div class='row mt-2'>



                               
                                    <input autocomplete='off'  class='in' id='pass' name='pass' type='password' placeholder="Contraseña...">
                              

                            </div>

                            <div class='row relative'>


                              
                                    <input  id='rem' name='rem' class='check' type='checkbox'>
                                    <label class='mail' for='rem'><span class='smoli'>Recordarme</span></label>
                               

                               

                            </div>


                            <div class='row relative'>
                             
                                <a href='#' onclick="document.getElementById('myform').submit()" class='in myAnchor'><span class='ingresar'>Ingresar</span></a>
                                <div style='position:absolute; top:50px; left:20px;'><?php echo $errorMsg ?></div>
                             
                               
                               
                            </div>
                    

                       
                         

                            


                        </form>

                    </div>




       

            </div>
        </div>
    </div>



</body>
</html>
