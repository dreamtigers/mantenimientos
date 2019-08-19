$(function(){
    hide();
     /** Hiding UserVehicule BUTTON if admin */
    function hide(){
        $.ajax({
            type: "GET",
            url: "php/isAdmin.php",
            
           
            success: function (response) {
                if(response==1){
                    $('#userVehiculos').hide();
                } 
                if(response == 0) {
                    $('#userVehiculos').show();
                }
            }
        });
    }

    /** Hiding BUTTONS if not admin */
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "php/isAdmin.php",
            
           
            success: function (response) {
                if(response==0){
                    $('.adminBtn').hide();
                } 
                if(response == 1) {
                    $('.adminBtn').show();
                }
            }
        });
    })

   




    /** Navigating */
    $(document).on('click', '#register', function(e){

        e.preventDefault();
        
        window.location.href = 'register_app.php';

    });

    /** For navigation */
    $(document).on('click', '#historial', function(e){
        //e.preventDefault();
        window.location.href = 'historial.php';

    });


    /** Navigating */
    $(document).on('click', '#dash', function(){

       
        
        window.location.href = 'dashboard.php';

    });


    /** Navigating */
    $(document).on('click', '#registrarVehiculo', function(){
        document.location = 'datosDeIngreso.php';
    })
    /** Navigating */
      $(document).on('click', '#vehiculo', function(){
        document.location = 'vehiculos.php';
    })
    /** For navigation */
    $(document).on('click', '#usuarios', function(e){

        //e.preventDefault();
        window.location.href = 'usuarios.php';

    });
   
    

    /** Login out */
    $(document).on('click', '.getOut', function(){
        /** This is for log out */
        $.ajax({
            type: "GET",
            url: "php/logOut.php",
            
            
            success: function (response) {
                window.location.href='index.php';
            }
        });
      
    });
});