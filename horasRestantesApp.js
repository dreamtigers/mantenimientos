$(function () {
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

    /* Enabling tool tips*/ 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })



 

    /** Just to log out */
    $(document).on('click', '.logOut', function(){
        /** This is for log out */
        $.ajax({
            type: "GET",
            url: "php/logOut.php",
            
            
            success: function (response) {
                window.location.href='index.php';
            }
        });
      
    });

    /** Listing  */
    function listing(){
         $.ajax({
             type: "POST",
             //Note que listar NO sólo lista, sino también calcula.
             url: "php/horasRestantes/listar.php",
             data: "data",
             
             success: function (response) {
                 // Gettin usable object
                 let equipos = JSON.parse(response);
                 // Console checking
                 console.log(equipos);
                 /**Template that will be send to the HTML */
                 let template = ''; let template2 = '';
                 //
                 equipos.forEach( equipo => {
                 /** Some back-ticks magics */
                     template+=`
                         <tr userId=${equipo.id}> <!-- NO NEED TO PAY ATENTION HERE-->
                            <td>${equipo.id}</td>
                            <td>${equipo.equipo}</td>
                            <td>${equipo.hrsMotor}</td>
                            <td class='rut1'>${equipo.hrsRut1}</td>
                            <td class='rut2'>${equipo.hrsRut2}</td>
                            <td class='rut3'>${equipo.hrsRut3}</td>
                            <td class='rut4'>${equipo.hrsRut4}</td>
 
                         </tr>
                             `;
                    template2+=`
                        <tr>
                            <td>${equipo.hrsMant} hrs</td>
                            <td>${equipo.hrsTranscurridas}</td>
                           
                            <td>${equipo.hrsMant2} hrs</td>
                            <td>${equipo.hrsTranscurridas2}</td>
                           
                            <td>${equipo.hrsMant3} hrs</td>
                            <td>${equipo.hrsTranscurridas3}</td>
                           
                            <td>${equipo.hrsMant4} hrs</td>
                            <td>${equipo.hrsTranscurridas4}</td
                            
                        </tr>
                                `;

                 $('#registros').html(template);
                 $('#registros2').html(template2);
                 });
             }
         });
    }
    listing();

    /** Adding some colors now */
    function colorIt(){
        let color = ''; //String to hold color value

        $.ajax({
            type: "GET",
            url: "php/horasRestantes/colorful.php",
            data: "data",
           
            success: function (response) {
                //console.log(response);
                let x = JSON.parse(response); //It has to be PARSED before being Iterable
                //console.log($('.rut1').text());
            // ------------ Rutina 1 -----------------------------------------------------//
                if ( $('.rut1').text() >= 75 ){
                    $('.rut1').css('background-color', '#DDF0EC');
                } else if ( $('.rut1').text() < 75 && $('.rut1') >= 25 ) {
                    $('.rut1').css('background-color', 'rgba(234,234,0,0.4)');
                }
                else {
                    $('.rut1').css('background-color', 'rgba(213,11,14,0.6)');
                }
            // ------------ Rutina 2 -----------------------------------------------------//
                if ( $('.rut2').text() >= 150 ){
                    $('.rut2').css('background-color', '#DDF0EC');
                } else if ( $('.rut2').text() < 150 && $('.rut2') >= 50 ) {
                    $('.rut2').css('background-color', 'rgba(234,234,0,0.4)');
                }
                else {
                    $('.rut2').css('background-color', 'rgba(213,11,14,0.6)');
                }
            // ------------ Rutina 3 -----------------------------------------------------//
                if ( $('.rut3').text() >= 300 ){
                    $('.rut3').css('background-color', '#DDF0EC');
                } else if ( $('.rut3').text() < 300 && $('.rut3') >= 100 ) {
                    $('.rut3').css('background-color', 'rgba(234,234,0,0.4)');
                }
                else {
                    $('.rut3').css('background-color', 'rgba(213,11,14,0.6)');
                }
            // ------------ Rutina 4 -----------------------------------------------------//
                if ( $('.rut4').text() >= 600 ){
                    $('.rut4').css('background-color', '#DDF0EC');
                } else if ( $('.rut4').text() < 600 && $('.rut4') >= 200 ) {
                    $('.rut4').css('background-color', 'rgba(234,234,0,0.4)');
                }
                else {
                    $('.rut4').css('background-color', 'rgba(213,11,14,0.6)');
                }


            }
        });
    }
    colorIt();

    /** Re-starting countdown */
    $(document).on('click', '.restartM', function(){

        $.ajax({
            type: "POST",
            url: "php/horasRestantes/restartM.php",
            data: "data",
           
            success: function (response) {
                console.log(response);
            }
        });

        listing();

        setTimeout(colorIt(), 2000);
        
    });


// -------- NAVIGATION --------------------------------------------//

    /** Back to Dashboard */
    $(document).on('click', '.poin', function(){
        window.location.href='dashboard.php';
    })
    /** Back to Dashboard */
    $(document).on('click', '.dashi', function(){
       // window.location.href='dashboard.php';
    })

    /** For navigation */
    $(document).on('click', '#register', function(e){

        //e.preventDefault();
        
        window.location.href = 'register_app.php';

    });

    /** For navigation */
    $(document).on('click', '#historial', function(e){
        //e.preventDefault();
        window.location.href = 'historial.php';

    });

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


// -------- NAVIGATION -------------------------- END -------------//
 });