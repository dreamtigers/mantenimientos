$(function(){

      
    /** For navigation */
    $(document).on('click', '#vehiculos', function(e){

        //e.preventDefault();
        
        window.location.href = 'register_app.php';

    });

     /** For navigation */
     $(document).on('click', '#historial', function(e){

        //e.preventDefault();
        
        window.location.href = 'historial.php';

    });


     /** Navigating */
     $(document).on('click', '#mantenimientos', function(){
        document.location = 'vehiculos.php';
    })
    /** For navigation */
    $(document).on('click', '#usuarios', function(e){

        //e.preventDefault();
        window.location.href = 'usuarios.php';

    });

    $(document).on('click', '.back', function(e){

        //e.preventDefault();
        window.location.href = 'register_app.php';

    });


    /** For navigation END*/

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

    /** Lets list now */
    function listThem(){

        $.ajax({
            url: 'php/infoEquipo/listing.php',
            type: 'GET',
            success: function(response){
               /** Lets convert the string-like response into an usable object */
               let equipo = JSON.parse(response);
               // Some console checking
               console.log(equipo);
               /**Template that will be send to the HTML */
               let template = '';  let template2 = '';  let template3 = ''; let template4 = '';
              
               equipo.forEach(vehiculo => {
                 
                   template+=`
                   <tr class='colorFul' taskId=${vehiculo.id} > <!-- PAY ATENTION HERE-->
                       <td>${vehiculo.id}</td>
                       <td class=''>
                           <a>${vehiculo.nombre}</a>
                       </td>
                       <td>
                            ${vehiculo.hrsMotor}
                       </td>
                       <td >
                           ${vehiculo.kms}
                       </td>
                       <td>${vehiculo.marca}</td>
                       <td>${vehiculo.modelo}</td>
                       <td>${vehiculo.serial}</td>
                       <td>${vehiculo.placa}</td>


                   </tr>
               `
               template2+=`
                   <tr class='colorFul' taskId=${vehiculo.id} > <!-- PAY ATENTION HERE-->
                       <td>${vehiculo.arreglo}</td>
                       <td class=''>
                           <a>${vehiculo.anoFabricacion}</a>
                       </td>
                       <td>
                            ${vehiculo.filtroAMotor}
                       </td>
                       <td >
                           ${vehiculo.filtroAHidraulico}
                       </td>
                       <td>${vehiculo.filtroAPrimario}</td>
                       <td>${vehiculo.filtroASecundario}</td>
                       <td>${vehiculo.filtroTransmision}</td>
                       <td>${vehiculo.filtroTHidraulico}</td>


                   </tr>
               `

               template3+=`
               <tr class='colorFul' taskId=${vehiculo.id} > <!-- PAY ATENTION HERE-->
                   <td>${vehiculo.filtroCPrimario}</td>
                   <td class=''>
                       <a>${vehiculo.filtroCSecundario}</a>
                   </td>
                   <td>
                        ${vehiculo.filtroTGasoil}
                   </td>
                   <td >
                       ${vehiculo.tipoAHidraulico}
                   </td>
                   <td>${vehiculo.tipoAMotor}</td>
                   <td>${vehiculo.tipoATransmision}</td>
                 


               </tr>
           `
           template4+=`
               <tr class='colorFul' taskId=${vehiculo.id} > <!-- PAY ATENTION HERE-->
                   <td>${vehiculo.tipoACaja}</td>
                   <td class=''>
                       <a>${vehiculo.capacidadCMotor}</a>
                   </td>
                   <td>
                        ${vehiculo.capacidadTCaja}
                   </td>
                   <td >
                       ${vehiculo.capacidadTTransmision}
                   </td>
                   <td>${vehiculo.capacidadTHidraulico}</td>
            
                 


               </tr>
           `




               $('#registros').html(template);
               $('#registros2').html(template2);
               $('#registros3').html(template3);
               $('#registros4').html(template4);


               }); 

            }
        })

    }
    listThem();




});