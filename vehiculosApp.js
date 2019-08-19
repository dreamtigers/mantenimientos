$(function(){
    hide();
     /** Hiding BUTTONS if admin */
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
    
    /** For navigation */
    $(document).on('click', '#historial', function(e){
        //e.preventDefault();
        window.location.href = 'historial.php';

    });

    
    /** For navigation */
    $(document).on('click', '#register', function(e){

        //e.preventDefault();
        
        window.location.href = 'register_app.php';

    });

    /** For navigation */
    $(document).on('click', '#usuarios', function(e){

        //e.preventDefault();
        window.location.href = 'usuarios.php';

    });

    $(document).on('click', '#registrarVehiculo', function(){
        document.location = 'datosDeIngreso.php';
    })

     /** Navigating */
     $(document).on('click', '#vehiculo', function(){
        document.location = 'vehiculos.php';
    })
   
     /** Back to Dashboard */
     $(document).on('click', '.poin', function(){
        window.location.href='dashboard.php';
    })

      /** Back to Dashboard */
    $(document).on('click', '.dashi', function(){
       // window.location.href='dashboard.php';
       console.log("Trust me. You don't want to go there.");
    })
    /** For navigation END*/
   

    /** Just stoping search input silly refresh */
    $('.lookForm').submit(function (e) { 
        e.preventDefault();
       
            $.ajax({
                /** Get cause we gonna send that son some info. */
                type: "GET",
                url: "php/consoleArray.php",
                
                data: {},
                success: function (response) {
                    
                    console.log(response);
                  
                    
                }
            });
        
          /** Ajax posting it */
       

    });

    /** Listing process, at least the FIRST PART
     * This mtrfckr was way harder than other normal Listings; pay attention to the source (php) code.
     */
    function listThem(){
        let color = '';
       
        $.ajax({
            url: 'php/vehiculos/listing.php',
            type: 'GET',
            success: function(response){
               /** Lets convert the string-like response into an usable object */
               let trueList = JSON.parse(response);
               // Some console checking
               console.log(trueList);
               /**Template that will be send to the HTML */
               let template = '';
               trueList.forEach(vehiculo => {
                   /** Some back-ticks magics */
                   template+=`
                   <tr class='colorFul' taskId=${vehiculo.posId} > <!-- PAY ATENTION HERE-->
                       <td>${vehiculo.number}</td>
                       <td class=''>
                           <a>${vehiculo.name}</a>
                       </td>
                       <td >
                           ${vehiculo.ultimaUpdate}  
                       </td>
                       <td>${vehiculo.phone}</td>
                       <td>${vehiculo.category}</td>
                     
                      
                   </tr>
               `
               $('#registros').html(template);

               });

            }
        })
        
    }
    listThem();
    /** Now we try to add alert colors */
    function colorIt(){
        let color = '';
       
        $.ajax({
            type: "GET",
            url: "php/vehiculos/colorful.php",
            data: "data",
            
            success: function (response) {
               
                let dinamica = JSON.parse(response);   
                console.log(dinamica);   
                // I don't really know how, but i did it               
                $(".colorFul").each(function(i, elem){
                        
                            if (dinamica[i] <= 86400) {
                                //console.log(elem); Nicely green
                                color = 'rgba(40, 255, 140, 0.880)';
                                $(this).css("background-color",color);
                            }
                            else if ((dinamica[i] > 86400) && (dinamica[i] < 172800)) {
                                //console.log(elem); Yellow
                                color = 'rgba(242, 255, 3, 0.686)';
                                $(this).css("background-color",color);
                            }
                            else if (dinamica[i] >= 172800) {
                                //console.log(elem); Rojo
                                color = '#ff4d4d';
                                $(this).css("background-color",color);
                            }
                            
                });
    
            }
            
        })
       
        
    }
    colorIt();
    /** We list again */
    function listing2(){
        $.ajax({
            type: "GET",
            url: "php/vehiculos/listing2.php",
            data: "data",
            
            success: function (response) {
                // Gettin usable object
                let positionsLits = JSON.parse(response);
                // Console checking
                console.log(positionsLits);
                /**Template that will be send to the HTML */
                let template = '';
                //
                positionsLits.forEach(     
                    datoPosicion => {
                /** Some back-ticks magics */
                template+=`
                   <tr class='hover' taskId=${datoPosicion.id} > <!-- NO NEED TO PAY ATENTION HERE-->
                       <td>${datoPosicion.number}</td> 
                       <td>${datoPosicion.numb}</td>

                       <td>${datoPosicion.velocidad}</td>
                       
                       <td class="horasM">

                            <a href='#'>
                                ${datoPosicion.horasMotor}
                            </a>
                           
                       </td>

                    

                       <td>${datoPosicion.distance}</td>
                       
                       <td>${datoPosicion.updateNumber}</td>

                   </tr>
               `
               $('#registros2').html(template);
               });
            }
        });
    }
    listing2();
    // HORAS    
    $(document).on('click', '.horasM', function(){
            /** The whole 'getting id' process is sortof important 
            *  you might want to take a good look at it.
            */

            let element = $(this)[0].parentElement;
            let id = $(element).attr('taskId');
            //console.log(id);

            $.ajax({
                type: "POST",
                url: "php/vehiculos/goHours.php",
                data: {id:id},
                
                success: function (response) {
                   console.log(response);
                   document.location = 'horasRestantes.php';
                }
            });
       
    });



    // We test this time
    function justTesting(){
        $.ajax({
            type: "GET",
            url: "php/vehiculos/test.php",
            data: "data",
            
            success: function (response) {
                // Gettin usable object
                //let positionsLits = JSON.parse(response);
                // Console checking
                // Get today's date and time
                
                let x = JSON.parse(response);
                console.log(x);
                
               
            }
        });
    }
    //justTesting();
    // We test  AGAIN this time
    
    /** Logic for the filtering process */
    $('#lookIt').keyup(function () { 
        
        /** If there's a valua on the search (#lookIT) then proceed */
        if( $('#lookIt').val()){
            /** Variable que será enviada por AJAX. */ 
            let search = $('#lookIt').val();
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            $.ajax({
                /** POST cause we gonna send that son some info. */
                type: "POST",
                url: "php/vehiculos/deviceSearch.php",
                
                data: {search: search},
                success: function (response) {
                   
                    /** Tomaremos el string de json y lo llevaremos de verdad a JSON. */
                    let posiciones = JSON.parse(response);
                    console.log(posiciones);
                    
                    /** Let's create a template in order to modify the HTML */
                    let template = '';
                    posiciones.forEach(x => {
                        template += `
                        <tr class='hover' letId='${x.id}'>
                            <td>${x.number}</td>
                            <td class=''>
                                <a>${x.nombre}</a>   
                            </td>
                            <td>${x.velocidad}</td>
                            <td>${x.horas}</td>
                            
                            <td>${x.distancia}</td>
                            <td>${x.updateN}</td>
                            
                        </tr>
                        `
                    });
                    /** and use them (templates) */
                    // $('#show').show();
                    $('#registros2').html(template);
                    
                }
            });
        } else{
            listing2();
        }
        
    
    });


    /** now loggin out */
    $(document).on('click', '.logOut', function(){
        $.ajax({
            type: "GET",
            url: "php/vehiculos/logOut.php",
            
            success: function (response) {
                window.location.href='index.php';
            }
        });
    });

     /** To show if not in dashboard */
     $(document).ready(function(){
        
        $('.poin').show();

    })


      /** show search */
    $(document).ready(function(){
        
        $('.hid').show();

    })

});