$(function(){
    hide();
     /** Hiding BUTTONS if admin
      * Actually, SHOWING them if NOT admin
      */
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
    /** For navigation END*/

     /** Back to Dashboard */
     $(document).on('click', '.poin', function(){
        history.back();
    })

      /** Back to Dashboard */
    $(document).on('click', '.dashi', function(){
       // window.location.href='dashboard.php';
    })
   
   

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
            type: "GET",
            url: "php/mantenimientos/getNombreInexistente.php",
            data: "data",
            
            success: function (response) {
                let data = JSON.parse(response);
                console.log(data.nombre);
                let nombre = data.nombre;


                


                $.ajax({
                    url: 'php/mantenimientos/listalos.php',
                    type: 'GET',
                    success: function(response){
                        /** Lets convert the string-like response into an usable object */
                        let x = JSON.parse(response);
                        // Are we currently receiving something?
                        
                        /** X = equipos */
                        if (x.length == 0) {
                            console.log('We are not receiving anything.');
                            alert('No existen mantenimientos registrados para ' + nombre);
                            window.history.back();
                        }
                        else{
                         /** Lets create another AJAX call, so we can solve the FIRST problem */
                        $.ajax({
                            type: "GET",
                            url: "php/mantenimientos/getMainRow.php",
                            data: "data",
                            success: function (response) {
                                console.log(response);
                                let mainRow = JSON.parse(response);
                                let template = ''; let templating = '';
                                mainRow.forEach(element => {
                                    template += 
                                            `
                                                <tr>
                                                    <td>${element.marca}</td>
                                                    <td>${element.modelo}</td>
                                                    <td>${element.serial}</td>
                                                    <td>${element.arreglo}</td>
                                                    <td>${element.placa}</td>
                                                </tr>                        
                                            `;

                                    templating += 
                                            `
                                                <tr>
                                                    <td>${element.rutina1}</td>
                                                    <td>${element.rutina2}</td>
                                                    <td>${element.rutina3}</td>
                                                    <td>${element.rutina4}</td>
                                                </tr>
                                            `
                                });
                                $('#registros').html(template);
                                $('#registrosHoras').html(templating);
                             
                            }
                        });
                        // Some console checking
                        console.log(x);
                        /** Dont get behind, kiddo (class='col-2') */
                        
                        /**Template that will be send to the HTML */
                        let template = '';  let template2 = '';  let template3 = '';  let template4 = '';
                        let equipo = '';
                        
                        /** OVER HERE */
                        x.forEach(y => {
                            //back ticks magics
                            equipo = `
                                        <a idHoras=${y.idHoras} href='#' class='gooHoras'>${y.nombre}</a>
                                     `;
                            
                            template2 += `

                        <div class='contenApp my-4'>
                            <div class=''>
                                ${y.fechaIngreso}
                            </div>
                            <table class='table table-bordered table-sm '>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                        <td>Nº registro</td>
                                        <td>Fecha </td>
                                        <td>Rutina</td>
                                        
                                        <td>Kilometraje</td>
                                        <td>Horas Motor</td>
                                        <td>Ubicación</td>
                                        <td>Filtro <span style='font-size:10px'>(Aceite de motor)</span></td>
                                        <td>Filtro <span style='font-size:10px'>(Aceite hidráulico)</span></td>
                                        <td>Filtro <span style='font-size:10px'>(Aire primario)</span></td>
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.numRegistro}</td>
                                            <td>${y.fechaIngreso}</td>
                                            <td>${y.rutina}</td>
                                            <td>${y.kilometraje}</td>
                                            <td>${y.horasMotor}</td>
                                            <td>${y.ubicacion}</td>
                                            <td>${y.filtroAceiteMotor}</td>
                                            <td>${y.filtroAceiteHidraulico}</td>
                                            <td>${y.filtroAirePrimario}</td>
                                        </tr>

                                    </tbody>
                                    
                                </table>
                                
                               <table class='table table-bordered table-sm ' style='margin-top:-20px'>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                    <td>Filtro <span style='font-size:10px'>(Aire secundario)</span></td>    
                                    <td>Filtro <span style='font-size:10px'>(Transmisión)</span></td>
                                    <td>Filtro <span style='font-size:10px'>(combustible primario)</span></td>     
                                    <td>Filtro <span style='font-size:10px'>(combustible secundario)</span></td>
                                    <td>Filtro <span style='font-size:10px'>(tanque gasoil)</span></td>
                                    <!-- Pues conseguí-->
                                    <td>Filtro <span style='font-size:10px'>(aceite hidráulico)</span></td>
                                    <td>Tipo <span style='font-size:10px'>(Aceite de motor)</span></td>
                                      
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.filtroAireSecundario}</td>
                                            <td>${y.filtroTransmision}</td>
                                            <td>${y.filtroCombustiblePrimario}</td>
                                            <td>${y.filtroCombustibleSecundario}</td>
                                            <td>${y.filtroTanqueGasoil}</td>
                                            <td>${y.filtroAceiteHidraulico}</td>
                                            <td>${y.tipoAceiteMotor}</td>
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>
                                <table class='table table-bordered table-sm ' style='margin-top:-20px'>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                    <td>Tipo <span style='font-size:10px'>(aceite transmisión)</span></td>    
                                    <td>Tipo <span style='font-size:10px'>(aceite caja)</span></td>
                                    <td>Capacidad <span style='font-size:10px'>(carter del motor)</span></td>     
                                    <td>Capacidad <span style='font-size:10px'>(tanque caja)</span></td>
                                    <td>Capacidad <span style='font-size:10px'>(tanque transmisión)</span></td>
                                    <!-- Pues conseguí-->
                                    <td>Capacidad <span style='font-size:10px'>(tanque hidráulico)</span></td>
                                   
                                      
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.tipoAceiteTransmision}</td>
                                            <td>${y.tipoAceiteCaja}</td>
                                            <td>${y.capacidadCarterMotor}</td>
                                            <td>${y.capacidadTanqueCaja}</td>
                                            <td>${y.capacidadTanqueTransmision}</td>
                                            <td>${y.capacidadTanqueHidraulico}</td>
                                            
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>

                                <table class='table table-bordered table-sm' style='margin-top:-20px'>
                                    <thead class='tabledark' id='tableWeird'>
                                        <tr>
                                                            
                                            <td>Observaciones: </span></td>    
                                
                                        </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>

                                            <td>
                                                 ${y.observaciones}
                                            </td>
                                    
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>



                                
                                <table class='table table-bordered table-sm' style='margin-top:-20px'>
                                    <thead class='tabledark' id='tableWeird'>
                                        <tr>
                                                            
                                            <td>Actividades realizadas: </span></td>    
                                
                                        </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>

                                            <td>
                                               Rutina de mantenimiento Nº: ${y.rutina}<br> Actividades realizadas: ${y.actividades}
                                            </td>
                                    
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>
                            </div>        

                                        `;
                           template3 += `
                                   
                                        `
                        });   
                        $('#equipo').html(equipo);
                        //$('#registros').html(template);
                        $('#inHere').html(template2);
                        /** Yo matándome and it was so easy */
                        $('.col2,.g').height( ($(document).height()  ));
                        //$('#registros4').html(template4);
        
                        }
                        
                    }
                });
               
            }
        });
    }
    listThem();
   
    /** Now we want to go to horasMantenimientos, pero de modo más intuitivo. */
    $(document).on('click', '.gooHoras', function(){

        let elementoClickeado = $(this)[0];
        let idClickeado = $(elementoClickeado).attr('idHoras');
        /** Console check by sending the clicked ID to the console. */
        console.log(idClickeado);
        $.ajax({
            type: "POST",
            url: "php/mantenimientos/goHours.php",
            data: {id:idClickeado},
            
            success: function (response) {
                console.log(response);
                document.location = 'horasRestantes.php';
            }
        });

    })

     /** Logic for the filtering process */
     $('#lookIt').change(function () { 
        
        /** If there's a valua on the search (#lookIT) then proceed */
        if( $('#lookIt').val()){
            /** Variable que será enviada por AJAX. */ 
            let search = $('#lookIt').val();
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            //console.log(search);

            /** AJAX HTTP VERB */
            $.ajax({
                type: "POST",
                url: "php/mantenimientos/filter.php",
                data: {date: search},
                
                success: function (response) {
                    let filtrados = JSON.parse(response);
                    console.log(filtrados);
                    let templateX = '';
                    // Now we create a template
                    filtrados.forEach(y =>{
                        templateX += `

                        <div class='contenApp my-4'>
                            <div class=''>
                                ${y.fechaIngreso}
                            </div>
                            <table class='table table-bordered table-sm '>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                        <td>Nº registro</td>
                                        <td>Fecha </td>
                                        <td>Rutina</td>
                                        
                                        <td>Kilometraje</td>
                                        <td>Horas Motor</td>
                                        <td>Ubicación</td>
                                        <td>Filtro <span style='font-size:10px'>(Aceite de motor)</span></td>
                                        <td>Filtro <span style='font-size:10px'>(Aceite hidráulico)</span></td>
                                        <td>Filtro <span style='font-size:10px'>(Aire primario)</span></td>
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.numRegistro}</td>
                                            <td>${y.fechaIngreso}</td>
                                            <td>${y.rutina}</td>
                                            <td>${y.kilometraje}</td>
                                            <td>${y.horasMotor}</td>
                                            <td>${y.ubicacion}</td>
                                            <td>${y.filtroAceiteMotor}</td>
                                            <td>${y.filtroAceiteHidraulico}</td>
                                            <td>${y.filtroAirePrimario}</td>
                                        </tr>

                                    </tbody>
                                    
                                </table>
                                
                               <table class='table table-bordered table-sm ' style='margin-top:-20px'>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                    <td>Filtro <span style='font-size:10px'>(Aire secundario)</span></td>    
                                    <td>Filtro <span style='font-size:10px'>(Transmisión)</span></td>
                                    <td>Filtro <span style='font-size:10px'>(combustible primario)</span></td>     
                                    <td>Filtro <span style='font-size:10px'>(combustible secundario)</span></td>
                                    <td>Filtro <span style='font-size:10px'>(tanque gasoil)</span></td>
                                    <!-- Pues conseguí-->
                                    <td>Filtro <span style='font-size:10px'>(aceite hidráulico)</span></td>
                                    <td>Tipo <span style='font-size:10px'>(Aceite de motor)</span></td>
                                      
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.filtroAireSecundario}</td>
                                            <td>${y.filtroTransmision}</td>
                                            <td>${y.filtroCombustiblePrimario}</td>
                                            <td>${y.filtroCombustibleSecundario}</td>
                                            <td>${y.filtroTanqueGasoil}</td>
                                            <td>${y.filtroAceiteHidraulico}</td>
                                            <td>${y.tipoAceiteMotor}</td>
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>
                                <table class='table table-bordered table-sm ' style='margin-top:-20px'>
                                <thead class='tabledark' id='tableWeird'>
                                    <tr>
                                                        
                                    <td>Tipo <span style='font-size:10px'>(aceite transmisión)</span></td>    
                                    <td>Tipo <span style='font-size:10px'>(aceite caja)</span></td>
                                    <td>Capacidad <span style='font-size:10px'>(carter del motor)</span></td>     
                                    <td>Capacidad <span style='font-size:10px'>(tanque caja)</span></td>
                                    <td>Capacidad <span style='font-size:10px'>(tanque transmisión)</span></td>
                                    <!-- Pues conseguí-->
                                    <td>Capacidad <span style='font-size:10px'>(tanque hidráulico)</span></td>
                                   
                                      
                                        
                                
                                    </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>
                                            <td>${y.tipoAceiteTransmision}</td>
                                            <td>${y.tipoAceiteCaja}</td>
                                            <td>${y.capacidadCarterMotor}</td>
                                            <td>${y.capacidadTanqueCaja}</td>
                                            <td>${y.capacidadTanqueTransmision}</td>
                                            <td>${y.capacidadTanqueHidraulico}</td>
                                            
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>

                                <table class='table table-bordered table-sm' style='margin-top:-20px'>
                                    <thead class='tabledark' id='tableWeird'>
                                        <tr>
                                                            
                                            <td>Observaciones: </span></td>    
                                
                                        </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>

                                            <td>
                                                 ${y.observaciones}
                                            </td>
                                    
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>



                                
                                <table class='table table-bordered table-sm' style='margin-top:-20px'>
                                    <thead class='tabledark' id='tableWeird'>
                                        <tr>
                                                            
                                            <td>Actividades realizadas: </span></td>    
                                
                                        </tr>
                            
                                    </thead>
                                    
                                    <!-- Id registros, time to shine
                                    -- In here we will load all of our data got from listingEquipos.php through app.js     -->
                                    <tbody id='registros2'>
                                        
                                        <tr>

                                            <td>
                                               Rutina de mantenimiento Nº: ${y.rutina}<br> Actividades realizadas: ${y.actividades}
                                            </td>
                                    
                                        </tr>
                                            
                                           

                                    </tbody>
                                </table>
                            </div>        

                                        `;
                        
                    })
                    $('#inHere').html(templateX);
              
                   



                }
            });
           
        
        } 
          /** Yo matándome and it was so easy */
        
    
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


      /** hide search */
    $(document).ready(function(){
        
        $('.hid').hide();

    })

});