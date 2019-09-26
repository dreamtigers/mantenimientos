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

    $('.ocultar').hide();
    /** Just checking out */
    console.log('Jquery is working');  
    /**Variable that let's us now when we are editing */
    let edit = false;
     /** Logic for the list-loading process 
     * At least Equipos, so far.
    getThem */ 
    function listThem(){
        $.ajax({
            url: 'php/listingEquipos.php',
            type: 'GET',
            success: function(response){
                /** Lets convert the string-like response into an usable object */
                let trueLists = JSON.parse(response);
                console.log(trueLists);
                /**Template that will be send to the HTML */
                let template = '';
                trueLists.forEach(equipo =>{
                    /** Some back-ticks magics */
                    template+=`
                        <tr class='hover'  deviceId='${equipo.deviceId}' > <!-- PAY ATENTION HERE-->
                            <td>
                                <span class='name'>${equipo.deviceId}</span>
                            </td>
                            <td class='dot task-update'>
                                <a><span class='name'>${equipo.name}</span></a>   
                            </td>
                            <td><span class='name'>${equipo.marca}</span></td>
                            <td><span class='name'>${equipo.modelo}</span></td>
                            <td><span class='name'>${equipo.serial}</span></td>
                            <td><span class='name'>${equipo.arreglo}</span></td>
                            <td><span class='name'>${equipo.placa}</span></td>
                            <td class='rel'>    
                            
                             
                                <img class='Elimi task-delete' src='css/img/delete.png' width='15'>
                                <a href='#' class='updatEquipo absoluties' ><img class='absoluties' src='css/img/edit.png' width='15'> </a> 
                            </td>
                           
                            
                               
                            
                        </tr>
                       
                    `
                })
                $('#registros').html(template);
            }
        })
    }
    /**Luego de crearla, la llamamos. */
    listThem();

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
                url: "php/deviceSearch.php",
                
                data: {search: search},
                success: function (response) {
                   
                    /** Tomaremos el string de json y lo llevaremos de verdad a JSON. */
                    let tipos = JSON.parse(response);
                    console.log(tipos);
                    
                    /** Let's create a template in order to modify the HTML */
                    let template = '';
                    tipos.forEach(tipo => {
                        template += `
                        <tr deviceId='${tipo.deviceId}'>
                            <td>
                                <span class='name'>${tipo.deviceId}</span>
                         
                            </td>
                            <td class='dot difUpdate'>
                                <a class='name'>${tipo.name}</a>   
                               
                            </td>
                            <td><span class='name'>${tipo.marca}</span></td>
                            <td><span class='name'>${tipo.modelo}</span></td>
                            <td><span class='name'>${tipo.serial}</span></td>
                            <td><span class='name'>${tipo.arreglo}</span></td>
                            <td><span class='name'>${tipo.placa}</span></td>
                            <td class='rel'>
                               
                                <img class='Elimi task-delete' src='css/img/delete.png' width='15'>
                                <a href='#' class='updatEquipo absoluties' ><img class='absoluties' src='css/img/edit.png' width='15'> </a> 
                            </td>
                            
                           
                        </tr>
                        `
                    });
                    /** and use them (templates) */
                    // $('#show').show();
                    $('#registros').html(template);
                    
                }
            });
        } else{
            listThem();
            
           
        }
        
    
    });

    /** And grow a bit when entered */
    $( document ).on('mouseenter','.abs',function() {
        $( ".abs" ).animate({
          width: "60px"
        }, 500 );
    });
    /** And shrinks back when left */
    $( document ).on('mouseleave','.abs',function() {
        $( ".abs" ).animate({
          width: "40px"
        }, 500 );
      });
      

    /** Go to the add form */
    $(document).on('click', '.abs', function(){
        $("html, body").delay(100).animate({scrollTop: $('.addThem').offset().top }, 700);
    });

     /** Logic for the deleting row process */
     $(document).on('click', '.filteredTask-delete', function(){

        if(confirm('¿Desea eliminar?')){
            /**Hagámosle una confirmación a la eliminación 
            /** Let get the clicked element */
            let element = $(this)[0].parentElement.parentElement; /** Element 0 - cause it's an array - was the clicked element. */
            var id = $(element).attr('letId');
            console.log(id);
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            $.ajax({
                /** POST cause we gonna send that son some info. */
                type: "POST",
                url: "php/filteredTask-delete.php",
                
                data: {id: id},
                success: function (response) {
                
                    console.log(response);
                    listThem();
                }
            });
        

        }

    });

    /** Now we need to EDIT (UPDATE) again, by clickind EDIT */
    $(document).on('click', '.updatEquipo', function(){
        $("html, body").delay(100).animate({scrollTop: $('.addThem').offset().top }, 700);
        // lets pick the id
        let element = $(this)[0].parentElement.parentElement;
        
        let devId = $(element).attr('deviceId');
        console.log(devId);

        $.ajax({
            type: "POST",
            url: "php/getSingleTask.php",
            data: {devId:devId},
          
            success: function (response) {
                // Lets remember we are editing.
                edit = true;
                if (edit) {
                    $('#equipos').prop('disabled', 'disabled');
                  
                }
                
                   
                    
                
                let x = JSON.parse(response);

                console.log(x);
               
                x.forEach(element => {
                    $('#equipos option:selected').html(element.nombre); 
                    /** Trying to put its id */
                    $('#equipos').val(element.deviceId);
                    /** */
                    $('#marca').val(element.marca);
                    $('#modelo').val(element.modelo);
                    $('#serial').val(element.serial);
                    $('#arreglo').val(element.arreglo);
                    $('#placa').val(element.placa);
               
                    $('#fechaIngreso').val(element.fechaIngreso);
                    $('#kilometraje').val(element.kilometraje); 
                    $('#horasUso').val(element.horasUso);
                    $('#anoFabricacion').val(element.anoFabricacion);
                    $('#ubicacion').val(element.ubicacion);  
                    $('#filtroAceiteMotor').val(element.filtroAceiteMotor);      
                    $('#filtroAceiteHidraulico').val(element.filtroAceiteHidraulico);  
                    $('#filtroAirePrimario').val(element.filtroAirePrimario);  
                    $('#filtroAireSecundario').val(element.filtroAireSecundario);  
                    $('#filtroTransmision').val(element.filtroTransmision); 
                    $('#filtroTanqueHidraulico').val(element.filtroTanqueHidraulico);   
                    $('#filtroCombustiblePrimario').val(element.filtroCombustiblePrimario);  
                    $('#filtroCombustibleSecundario').val(element.filtroCombustibleSecundario);  
                    $('#filtroTanqueGasoil').val(element.filtroTanqueGasoil);  
                    $('#tipoAceiteHidraulico').val(element.tipoAceiteHidraulico);  
                    $('#tipoAceiteMotor').val(element.tipoAceiteMotor);  
                    $('#tipoAceiteTransmision').val(element.tipoAceiteTransmision);  
                    $('#tipoAceiteCaja').val(element.tipoAceiteCaja);  
                    $('#capacidadCarterMotor').val(element.capacidadCarterMotor);  
                    $('#capacidadTanqueCaja').val(element.capacidadTanqueCaja);  
                    $('#capacidadTanqueTransmision').val(element.capacidadTanqueTransmision);  
                    $('#capacidadTanqueHidraulico').val(element.capacidadTanqueHidraulico); 
                   
                });
            }
        }); 


        /** This one right here is just to check Session; can be ignored otherwise */
        $.ajax({
            type: "GET",
            url: "php/getSession.php",
            data: "data",
            
            success: function (response) {
                console.log(response);
            }
        });

    });

     /** Now we need to EDIT (UPDATE) again, by clickind EDIT */
     $(document).on('click', '.updatEquipoFiltrado', function(){
        // lets pick the id
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('LetId');
        console.log(id);
    

        $.ajax({
            type: "POST",
            url: "php/getSingleTaskFiltered.php",
            data: {id:id},
          
            success: function (response) {
                // Lets remember we are editing.
                edit = true;
                console.log(response)
                let x = JSON.parse(response);
                $("html, body").delay(100).animate({scrollTop: $('.addThem').offset().top }, 700);
                console.log(x);
                x.forEach(element => {
                    $('#equipos option:selected').html(element.tipoEquipo); 
                    $('#marca').val(element.marca);
                    $('#modelo').val(element.modelo);
                    $('#serial').val(element.serial);
                    $('#arreglo').val(element.arreglo);
                    $('#placa').val(element.placa);
                    
                    $('#fechaIngreso').val(element.fechaIngreso);
                    $('#kilometraje').val(element.kilometraje); 
                    $('#horasUso').val(element.horasUso);
                    $('#anoFabricacion').val(element.anoFabricacion);
                    $('#ubicacion').val(element.ubicacion);  
                    $('#filtroAceiteMotor').val(element.filtroAceiteMotor);      
                    $('#filtroAceiteHidraulico').val(element.filtroAceiteHidraulico);  
                    $('#filtroAirePrimario').val(element.filtroAirePrimario);  
                    $('#filtroAireSecundario').val(element.filtroAireSecundario);  
                    $('#filtroTransmision').val(element.filtroTransmision); 
                    $('#filtroTanqueHidraulico').val(element.filtroTanqueHidraulico);   
                    $('#filtroCombustiblePrimario').val(element.filtroCombustiblePrimario);  
                    $('#filtroCombustibleSecundario').val(element.filtroCombustibleSecundario);  
                    $('#filtroTanqueGasoil').val(element.filtroTanqueGasoil);  
                    $('#tipoAceiteHidraulico').val(element.tipoAceiteHidraulico);  
                    $('#tipoAceiteMotor').val(element.tipoAceiteMotor);  
                    $('#tipoAceiteTransmision').val(element.tipoAceiteTransmision);  
                    $('#tipoAceiteCaja').val(element.tipoAceiteCaja);  
                    $('#capacidadCarterMotor').val(element.capacidadCarterMotor);  
                    $('#capacidadTanqueCaja').val(element.capacidadTanqueCaja);  
                    $('#capacidadTanqueTransmision').val(element.capacidadTanqueTransmision);  
                    $('#capacidadTanqueHidraulico').val(element.capacidadTanqueHidraulico);  
                   
                });
               
            }
        }); 

        
        /** This one right here is just to check Session; can be ignored otherwise */
        $.ajax({
            type: "GET",
            url: "php/getSession.php",
            data: "data",
            
            success: function (response) {
                console.log(response);
            }
        });

    });



    /** Logic for the deleting row process */
    $(document).on('click', '.task-delete', function(){

        if(confirm('¿Desea eliminar?')){
            /**Hagámosle una confirmación a la eliminación 
            /** Let get the clicked element */
            let element = $(this)[0].parentElement.parentElement; /** Element 0 - cause it's an array - was the clicked element. */
            var id = $(element).attr('deviceId');
            console.log(id);
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            $.ajax({
                /** POST cause we gonna send that son some info. */
                type: "POST",
                url: "php/taskDelete.php",
                
                data: {id: id},
                success: function (response) {
                
                    console.log(response);
                    listThem();
                }
            });
        

        }

    });

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

    /** Logic for the adding Form process
     * (AND UPDATE)
     */
    $('#registerForm').submit(function (e) { 
        e.preventDefault();
        /** let actividades */
        let actividades = '';
        /** Y comentarios de estas */
        let comentariosActividades = ''; 
        /** Hold on for the 30 activities down here */
        /** First 5 */
        if ($('#a_1').is(":checked")){
            actividades += ' 1)Revisión del nivel de aceite del eje trasero y delantero.';
            if ( $('#act1').val() != '' ){
                comentariosActividades += '1) ' + $('#act1').val() + '  ';
            } else {
                comentariosActividades += '1) Actividad sin observación.  ';
            }
        }
        if ($('#a_2').is(":checked")){
            actividades += ' 2)Revisión del nivel de aceite de mandos finales.';
            if ( $('#act2').val() != '' ){
                comentariosActividades += '2)' + $('#act2').val() + '  ';
            } else {
                comentariosActividades += '2) Actividad sin observación.  ';
            }  
        }
        if ($('#a_3').is(":checked")){
            actividades += ' 3)Inspeccionar y limpiar filtro de aire primario y válvula de descarga de polvo.';
            if ( $('#act3').val() != '' ){
                comentariosActividades += '3)' + $('#act3').val() + '  ';
            } else {
                comentariosActividades += '3) Actividad sin observación.  ';
            }  
            
        }
        if ($('#a_4').is(":checked")){
            actividades += ' 4)Revisar y limpiar filtro separador de agua de sistemas combustible.';
            if ( $('#act4').val() != '' ){
                comentariosActividades += '4)' + $('#act4').val() + '  ';
            } else {
                comentariosActividades += '4) Actividad sin observación.  ';
            }  
           
        }
        if ($('#a_5').is(":checked")){
            actividades += ' 5)Revisión del nivel de electrolito y de los bornes de la batería.';
            if ( $('#act5').val() != '' ){
                comentariosActividades += '5)' + $('#act5').val() + '  ';
            } else {
                comentariosActividades += '5) Actividad sin observación.  ';
            }  
        }
        /** Five more (5-10) */
        if ($('#a_6').is(":checked")){
            actividades += ' 6)Revisión de niveles de aceite del sistemas hidráulico y transmisión.';
            if ( $('#act6').val() != '' ){
                comentariosActividades += '6)' + $('#act6').val() + '  ';
            } else {
                comentariosActividades += '6) Actividad sin observación.  ';
            }  
        }
        if ($('#a_7').is(":checked")){
            actividades += ' 7)Revisión del nivel de refrigerante. Estado del radiador y mangueras.';
            if ( $('#act7').val() != '' ){
                comentariosActividades += '7)' + $('#act7').val() + '  ';
            } else {
                comentariosActividades += '7) Actividad sin observación.  ';
            }     
        }
        if ($('#a_8').is(":checked")){
            actividades += ' 8)Revisión del estado de la(s) correa(s) del motor y comprobar tensión.';
            if ( $('#act8').val() != '' ){
                comentariosActividades += '8)' + $('#act8').val() + '  ';
            } else {
                comentariosActividades += '8) Actividad sin observación.  ';
            }    
        }
        if ($('#a_9').is(":checked")){
            actividades += ' 9)Cambio de aceite y del filtro del motor.';
            if ( $('#act9').val() != '' ){
                comentariosActividades += '9)' + $('#act9').val() + '  ';
            } else {
                comentariosActividades += '9) Actividad sin observación.  ';
            }    
        }
        if ($('#a_10').is(":checked")){
            actividades += ' 10)Lubricar puntos de pivote de cargadora, excavadora y estabilizadores.';
            if ( $('#act10').val() != '' ){
                comentariosActividades += '10)' + $('#act10').val() + '  ';
            } else {
                comentariosActividades += '10) Actividad sin observación.  ';
            }  
        }
        /** Five more (10-15)*/
        if ($('#a_11').is(":checked")){
            actividades += ' 11)Lubricar crucetas de cardanes.';
            if ( $('#act11').val() != '' ){
                comentariosActividades += '11)' + $('#act11').val() + '  ';
            } else {
                comentariosActividades += '11) Actividad sin observación.  ';
            } 
            
        }
        if ($('#a_12').is(":checked")){
            actividades += ' 12)Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas.';
            if ( $('#act12').val() != '' ){
                comentariosActividades += '12)' + $('#act12').val() + '  ';
            } else {
                comentariosActividades += '12) Actividad sin observación.  ';
            }   
        }
        if ($('#a_13').is(":checked")){
            actividades += ' 13)Chequeo de lineas hidráulicas por fugas, desgastes, etc.';
            if ( $('#act13').val() != '' ){
                comentariosActividades += '13)' + $('#act13').val() + '  ';
            } else {
                comentariosActividades += '13) Actividad sin observación.  ';
            } 
        }
        if ($('#a_14').is(":checked")){
            actividades += ' 14)Chequeo del sistema eléctrico y luces.';
            if ( $('#act14').val() != '' ){
                comentariosActividades += '14)' + $('#act14').val() + '  ';
            } else {
                comentariosActividades += '14) Actividad sin observación.  ';
            }           
        }
        if ($('#a_15').is(":checked")){
            actividades += ' 15)Limpieza general.';
            if ( $('#act15').val() != '' ){
                comentariosActividades += '15)' + $('#act15').val() + '  ';
            } else {
                comentariosActividades += '15) Actividad sin observación.  ';
            }  
        }
        /** Five more (15-20)*/
        if ($('#a_16').is(":checked")){
            actividades += ' 16)Revisión de la manguera de admisión de aire.';
            if ( $('#act16').val() != '' ){
                comentariosActividades += '16)' + $('#act16').val() + '  ';
            } else {
                comentariosActividades += '16) Actividad sin observación.  ';
            }   
        }
        if ($('#a_17').is(":checked")){
            actividades += ' 17)Cambio del filtro de aceite del sistema hidráulico.';
            if ( $('#act17').val() != '' ){
                comentariosActividades += '17)' + $('#act17').val() + '  ';
            } else {
                comentariosActividades += '17) Actividad sin observación.  ';
            }  
        }
        if ($('#a_18').is(":checked")){
            actividades += ' 18)Revisión del par de apriete del pasador entre el aguijón y el brazo.';
            if ( $('#act18').val() != '' ){
                comentariosActividades += '18)' + $('#act18').val() + '  ';
            } else {
                comentariosActividades += '18) Actividad sin observación.  ';
            }       
        }
        if ($('#a_19').is(":checked")){
            actividades += ' 19)Revisar funcionamiento de frenos de servicio y estacionamiento.';
            if ( $('#act19').val() != '' ){
                comentariosActividades += '19)' + $('#act19').val() + '  ';
            } else {
                comentariosActividades += '19) Actividad sin observación.  ';
            }   
        }
        if ($('#a_20').is(":checked")){
            actividades += ' 20)Cambio del filtro del combustible y separador de agua.';
            if ( $('#act20').val() != '' ){
                comentariosActividades += '20)' + $('#act20').val() + '  ';
            } else {
                comentariosActividades += '20) Actividad sin observación.  ';
            }   
        }
        /** Five more (20-25) */
        if ($('#a_21').is(":checked")){
            actividades += ' 21)Cambio del filtro de transmisión.';
            if ( $('#act21').val() != '' ){
                comentariosActividades += '21)' + $('#act21').val() + '  ';
            } else {
                comentariosActividades += '21) Actividad sin observación.  ';
            }   
            
        }
        if ($('#a_22').is(":checked")){
            actividades += ' 22)Cambio de aceite del eje delantero y trasero.';
            if ( $('#act22').val() != '' ){
                comentariosActividades += '22)' + $('#act22').val() + '  ';
            } else {
                comentariosActividades += '22) Actividad sin observación.  ';
            }  
            
        }
        if ($('#a_23').is(":checked")){
            actividades += ' 23)Revisión y ajuste del varillaje de control de velocidad del motor.';
            if ( $('#act23').val() != '' ){
                comentariosActividades += '23)' + $('#act23').val() + '  ';
            } else {
                comentariosActividades += '23) Actividad sin observación.  ';
            } 
            
        }
        if ($('#a_24').is(":checked")){
            actividades += ' 24)Cambio de aceite y filtro del sistema hidráulico.';
            if ( $('#act24').val() != '' ){
                comentariosActividades += '24)' + $('#act24').val() + '  ';
            } else {
                comentariosActividades += '24) Actividad sin observación.  ';
            } 
           
        }
        if ($('#a_25').is(":checked")){
            actividades += ' 25)Limpieza del tubo del respiradero del carter del motor.';
            if ( $('#act25').val() != '' ){
                comentariosActividades += '25)' + $('#act25').val() + '  ';
            } else {
                comentariosActividades += '25) Actividad sin observación.  ';
            } 
            
        }
        /** Last five up to 30 */
        if ($('#a_26').is(":checked")){
            actividades += ' 26)Cambio de aceite y filtro de la transmisión y convertidor de par.';
            if ( $('#act26').val() != '' ){
                comentariosActividades += '26)' + $('#act26').val() + '  ';
            } else {
                comentariosActividades += '26) Actividad sin observación.  ';
            }    
        }
        if ($('#a_27').is(":checked")){
            actividades += ' 27)Cambio de aceite de mandos finales.';
            if ( $('#act27').val() != '' ){
                comentariosActividades += '27)' + $('#act27').val() + '  ';
            } else {
                comentariosActividades += '27) Actividad sin observación.  ';
            }   
        }
        if ($('#a_28').is(":checked")){
            actividades += '28)Sustitución de los elementos del filtro del aire.';
            if ( $('#act28').val() != '' ){
                comentariosActividades += '28)' + $('#act28').val() + '  ';
            } else {
                comentariosActividades += '28) Actividad sin observación.  ';
            }  
            
        }
        if ($('#a_29').is(":checked")){
            actividades += ' 29)Drenaje y reemplazo de refrigerante motor.';
            if ( $('#act29').val() != '' ){
                comentariosActividades += '29)' + $('#act29').val() + '  ';
            } else {
                comentariosActividades += '29) Actividad sin observación.  ';
            }  
        }
        if ($('#a_30').is(":checked")){
            actividades += ' 30)Ajuste del juego de válvulas del motor.';
            if ( $('#act30').val() != '' ){
                comentariosActividades += '30)' + $('#act30').val() + '  ';
            } else {
                comentariosActividades += '30) Actividad sin observación.  ';
            } 
            
        }
        /** Creamos el objeto a enviar */
        const pack = {
            //Getting selected OPTION, not value.
            tipoEquipo: $('#equipos option:selected').html(),
            //We will still need it's value, tho.
            deviceId: $('#equipos').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            serial: $('#serial').val(),
            arreglo: $('#arreglo').val(),
            placa: $('#placa').val(),
            
            fechaIngreso: $('#fechaIngreso').val(),
            kilometraje: $('#kilometraje').val(),
            horasUso: $('#horasUso').val(),
            anoFabricacion: $('#anoFabricacion').val(),
            ubicacion: $('#ubicacion').val(),
            filtroAceiteMotor: $('#filtroAceiteMotor').val(),
            filtroAceiteHidraulico: $('#filtroAceiteHidraulico').val(),
            filtroAirePrimario: $('#filtroAirePrimario').val(),
            filtroAireSecundario: $('#filtroAireSecundario').val(),
            filtroTransmision: $('#filtroTransmision').val(),
            filtroTanqueHidraulico: $('#filtroTanqueHidraulico').val(),
            filtroCombustiblePrimario: $('#filtroCombustiblePrimario').val(),
            filtroCombustibleSecundario: $('#filtroCombustibleSecundario').val(),
            filtroTanqueGasoil: $('#filtroTanqueGasoil').val(),
            tipoAceiteHidraulico: $('#tipoAceiteHidraulico').val(),
            tipoAceiteMotor: $('#tipoAceiteMotor').val(),
            tipoAceiteTransmision: $('#tipoAceiteTransmision').val(),
            tipoAceiteCaja: $('#tipoAceiteCaja').val(),
            capacidadCarterMotor: $('#capacidadCarterMotor').val(),
            capacidadTanqueCaja: $('#capacidadTanqueCaja').val(),
            capacidadTanqueTransmision: $('#capacidadTanqueTransmision').val(),
            capacidadTanqueHidraulico: $('#capacidadTanqueHidraulico').val(),
            actividades : actividades,
            comentariosActividades :comentariosActividades
        }
        
        
        console.log(pack);
     
        /** Here we will decide wether it's adding or editing 
         * Url, if not editing, must be 'php/add.php'.
         * must be different otherwise...
         */
        let url = edit === false ? 'php/add.php' : 'php/update.php';

    
        $.post(url, pack, function(response){
            
            
            var answer = JSON.parse(response);
            console.log(answer.ok);
            console.log(answer.error)
            if (answer.ok){
                $('#registerForm').trigger("reset");
                $('#actividades').trigger("reset");
                $('html, body').animate({scrollTop: '0px'}, 420);

                $('.rut4,.ocultar').hide();/** Acá también ocultamos los comentarios por actividades. */
                //and back to normal size
                $('.g').height ($(document).height() + $('.navbar').outerHeight() );
                listThem();
                edit = false;
                $('#equipos').prop('disabled', false);
                $('#equipos option:selected').html('Equipo:')
            } 
       
        });
       
        
    });

 
    /** Logic for UPDATING row process BUT from the filtered list*/
    $(document).on('click', '.difUpdate', function(){

           
            let row=$(this)[0].parentElement;
            let aid = $(row).attr('deviceId');
            console.log(aid);
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            $.ajax({
                type: "POST",
                url: "php/goHours2.php",
                data: {aid:aid},
                
                success: function (response) {
                    console.log(response);
                    document.location = 'horasRestantes.php';
                }
            });

    });

 


    //Fill forms' Kilometraje and Horasdeuso from filtroPosicion table 
    $('#equipos').change(function(){
        let id = $(this).val();
        console.log(id);

        $.ajax({
            type: "POST",
            url: "php/obtenHorasyKilometros.php",
            data: {id:id},
            
            success: function (response) {
                let x = JSON.parse(response);
                console.log(x);
                //And get those values in the form
                x.forEach(y => {
                /** Here we will just fill the form data directly */
                    $('#kilometraje').val(y.km);
                    $('#horasUso').val(y.hs);
                    $('#marca').val(y.marca);
                    $('#modelo').val(y.modelo);
                    $('#serial').val(y.serial);
                    $('#arreglo').val(y.arreglo);
                    $('#placa').val(y.placa);
                /** And down here we will softly suggest it */
                /** At first, just checking */
                    console.log(y);
                /** Letting fecha in */
                    $('#fechaSugerida').show();
                    $('#fechaSugerida').html('Último registro: ' + y.fecha); 
                    $(document).on('click', '#fechaSugerida',function(){
                    /** and out... */
                        $('#fechaSugerida').hide();
                    });
                    /** Letting añoFabricacion in */
                    $('#anoSugerido').show();
                    $('#anoSugerido').html('Último registro: ' + y.anoFabricacion); 
                    $(document).on('click', '#anoSugerido',function(){
                    /** and out... */
                        $('#anoSugerido').hide();
                    });
                    /** Letting añoFabricacion in */
                    $('#ubicacionSugerida').show();
                    $('#ubicacionSugerida').html('Último registro: ' + y.ubicacion); 
                    $(document).on('click', '#ubicacionSugerida',function(){
                    /** and out... */
                        $('#ubicacionSugerida').hide();
                    });    
                    /** Letting filtro A. M. in */
                    $('#f_aceiteMotor').show();
                    $('#f_aceiteMotor').html('Último registro: ' + y.filtroAceiteMotor); 
                    $(document).on('click', '#f_aceiteMotor',function(){
                    /** and out... */
                        $('#f_aceiteMotor').hide();
                    });   
                    /** Letting filtro A. Hidraulico in */
                    $('#f_aceiteHidraulico').show();
                    $('#f_aceiteHidraulico').html('Último registro: ' + y.filtroAceiteHidraulico); 
                    $(document).on('click', '#f_aceiteHidraulico',function(){
                    /** and out... */
                        $('#f_aceiteHidraulico').hide();
                    });   
                    /** Letting filtro A. Primario in */
                    $('#f_airePrimario').show();
                    $('#f_airePrimario').html('Último registro: ' + y.filtroAirePrimario); 
                    $(document).on('click', '#f_airePrimario',function(){
                    /** and out... */
                        $('#f_airePrimario').hide();
                    });  
                    /** Letting filtro A. Secundario in */
                    $('#f_aireSecundario').show();
                    $('#f_aireSecundario').html('Último registro: ' + y.filtroAireSecundario); 
                    $(document).on('click', '#f_aireSecundario',function(){
                    /** and out... */
                        $('#f_aireSecundario').hide();
                    });  
                    /** Letting filtro Tranmision in */
                    $('#f_transmision').show();
                    $('#f_transmision').html('Último registro: ' + y.filtroTransmision); 
                    $(document).on('click', '#f_transmision',function(){
                    /** and out... */
                        $('#f_transmision').hide();
                    }); 
                    /** Letting filtro tanque hidraulico in */
                    $('#f_tanqueHidraulico').show();
                    $('#f_tanqueHidraulico').html('Último registro: ' + y.filtroTanqueHidraulico); 
                    $(document).on('click', '#f_tanqueHidraulico',function(){
                    /** and out... */
                        $('#f_tanqueHidraulico').hide();
                    }); 
                    /** Letting filtro combustible primario  in */
                    $('#f_combustiblePrimario').show();
                    $('#f_combustiblePrimario').html('Último registro: ' + y.filtroCombustiblePrimario); 
                    $(document).on('click', '#f_combustiblePrimario',function(){
                    /** and out... */
                        $('#f_combustiblePrimario').hide();
                    }); 
                    /** Letting filtro combustible secundario  in */
                    $('#f_combustibleSecundario').show();
                    $('#f_combustibleSecundario').html('Último registro: ' + y.filtroCombustibleSecundario); 
                    $(document).on('click', '#f_combustibleSecundario',function(){
                    /** and out... */
                        $('#f_combustibleSecundario').hide();
                    }); 
                    /** Letting filtro tanque gasoilf_tanqueGasoil  in */
                    $('#f_tanqueGasoil').show();
                    $('#f_tanqueGasoil').html('Último registro: ' + y.filtroTanqueGasoil); 
                    $(document).on('click', '#f_tanqueGasoil',function(){
                    /** and out... */
                        $('#f_tanqueGasoil').hide();
                    }); 
                    /** Letting tipoAceiteHidraulico  in */
                    $('#t_aceiteHidraulico').show();
                    $('#t_aceiteHidraulico').html('Último registro: ' + y.tipoAceiteHidraulico); 
                    $(document).on('click', '#t_aceiteHidraulico',function(){
                    /** and out... */
                        $('#t_aceiteHidraulico').hide();
                    }); 
                    /** Letting tipoAceiteMotor  in */
                    $('#t_aceiteMotor').show();
                    $('#t_aceiteMotor').html('Último registro: ' + y.tipoAceiteMotor); 
                    $(document).on('click', '#t_aceiteMotor',function(){
                    /** and out... */
                        $('#t_aceiteMotor').hide();
                    }); 
                    /** Letting tipoAceiteTransmision  in */
                    $('#t_aceiteTransmision').show();
                    $('#t_aceiteTransmision').html('Último registro: ' + y.tipoAceiteTransmision); 
                    $(document).on('click', '#t_aceiteTransmision',function(){
                    /** and out... */
                        $('#t_aceiteTransmision').hide();
                    }); 
                    /** Letting tipoAceiteCaja  in */
                    $('#t_aceiteCaja').show();
                    $('#t_aceiteCaja').html('Último registro: ' + y.tipoAceiteCaja); 
                    $(document).on('click', '#t_aceiteCaja',function(){
                    /** and out... */
                        $('#t_aceiteCaja').hide();
                    });
                    /** Letting capacidadCarterMotor  in */
                    $('#c_carterMotor').show();
                    $('#c_carterMotor').html('Último registro: ' + y.capacidadCarterMotor); 
                    $(document).on('click', '#c_carterMotor',function(){
                    /** and out... */
                        $('#c_carterMotor').hide();
                    });
                    /** Letting capacidadTanqueCaja  in */
                    $('#c_tanqueCaja').show();
                    $('#c_tanqueCaja').html('Último registro: ' + y.capacidadTanqueCaja); 
                    $(document).on('click', '#c_tanqueCaja',function(){
                    /** and out... */
                        $('#c_tanqueCaja').hide();
                    });
                    /** Letting capacidadTanqueTramision  in */
                    $('#c_tanqueTransmision').show();
                    $('#c_tanqueTransmision').html('Último registro: ' + y.capacidadTanqueTransmision); 
                    $(document).on('click', '#c_tanqueTransmision',function(){
                    /** and out... */
                        $('#c_tanqueTransmision').hide();
                    });
                    /** Letting c_tanqueHidraulico  in */
                    $('#c_tanqueHidraulico').show();
                    $('#c_tanqueHidraulico').html('Último registro: ' + y.capacidadTanqueHidraulico); 
                    $(document).on('click', '#c_tanqueHidraulico',function(){
                    /** and out... */
                        $('#c_tanqueHidraulico').hide();
                    });

                });
            }
        });

    });

    /** Let's repeat with the on 'change' event, shall we? */
    $('#tipoMantenimiento').change(function(){
    /** Rutina 1 */
        if($('#tipoMantenimiento').val() == '1'){
            /** Hidding them all */
            $('.rut2').hide();
            $('.rut3,.rut4').hide();
            $('#actividades').trigger("reset");
            /** Just to prevail */
            $('.rut1').show();
            //Trying to keep height
            $('.g').height($(document).height() + $('.navbar').outerHeight() );
           
        }
    /** Rutina 2 */
        if($('#tipoMantenimiento').val() == '2'){
            /** Hidding them all */
            $('.rut1').hide();
            $('.rut3,.rut4').hide();
            $('#actividades').trigger("reset");
            /** Just to prevail */
            $('.rut2').show();
            //Trying to keep height
            $('.g').height ($(document).height() + $('.navbar').outerHeight());
           
        }
    /** Rutina 3 */
        if($('#tipoMantenimiento').val() == '3'){
            /** Hidding them all */
            $('.rut1,.rut2,.rut4').hide();
            $('#actividades').trigger("reset");
            /** Just to prevail */
           
            $('.rut3').show();

             //Trying to keep 100% height
             $('.g').height($(document).height() + $('.navbar').outerHeight());
        }
    /** Rutina 4 */
    if($('#tipoMantenimiento').val() == '4'){
        /** None to hide; we all won. */
            //$('.rut1,.rut2').hide();
        /** Just to prevail */
        
        $('.rut4').show();

        //Trying to keep 100% height
        $('.g').height($(document).height() + $('.navbar').outerHeight() );
    }
    /** Now, if unpicked */
    if($('#tipoMantenimiento').val() == '0'){
        /** None to hide; we all won. */
            //$('.rut1,.rut2').hide();
        /** Just to prevail */
        $('#actividades').trigger("reset");
        $('.rut4').hide();
        
        // back to normal size
        $('.g').height($(document).height() + $('.navbar').outerHeight() -$('.full').outerHeight() );
    }



    });




    /** IT USED TO BE the logic for the updating process Part 1/2.
     *  It is now a redirect to horasRestantes.
     * */
    $(document).on('click', '.task-update', function(){
        /** The whole 'getting id' process is sortof important 
         *  you might want to take a good look at it.
        */
        let element = $(this)[0].parentElement;
        let id = $(element).attr('deviceId');
        console.log(id);
        
        $.ajax({
            type: "POST",
            url: "php/infoEquipo/detallesEquipo.php",
            data: {id:id},
            
            success: function (response) {
                console.log(response);
                document.location = 'infoEquipo.php';
            }
        });

       
    });

   

    /** Just to log out is SESSION's dead */
    $(document).ready(function(){
        function check_session(){
            /** Lets make an AJAX request each some seconds so we can see is $SESSION is still running */
            $.ajax({
                type: "POST",
                url: "php/checkSession.php",
              
                success: function (response) {
                    if(response == '1'){
                        alert('Sesión expirada');
                        window.location.href='index.php';
                    }
                }
            });

            
        }

        setInterval(() => {
            check_session(); 
         }, 40000); //40secs

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




    /** From doen this point I'll try to make some commentary logic */
    // Let me begin by detecting checkboxes changes
    /** Actividad 1 */
    $('#a_1').change(function(){
        if($(this).is(':checked')){
            $("#act1").fadeIn();
        }else{
            $("#act1").hide();
        }
    });
    /** Actividad 2 */
    $('#a_2').change(function(){
        if($(this).is(':checked')){
            $("#act2").fadeIn();
        }else{
            $("#act2").hide();
        }
    });
    /** Actividad 3 */
    $('#a_3').change(function(){
        if($(this).is(':checked')){
            $("#act3").fadeIn();
        }else{
            $("#act3").hide();
        }
    });
    /** Actividad 4 */
    $('#a_4').change(function(){
        if($(this).is(':checked')){
            $("#act4").fadeIn();
        }else{
            $("#act4").hide();
        }
    });
    /** Actividad 5 */
    $('#a_5').change(function(){
        if($(this).is(':checked')){
            $("#act5").fadeIn();
        }else{
            $("#act5").hide();
        }
    });
    /** Actividad 6 */
    $('#a_6').change(function(){
        if($(this).is(':checked')){
            $("#act6").fadeIn();
        }else{
            $("#act6").hide();
        }
    });
    /** Actividad 7 */
    $('#a_7').change(function(){
        if($(this).is(':checked')){
            $("#act7").fadeIn();
        }else{
            $("#act7").hide();
        }
    });
    /** Actividad 8 */
    $('#a_8').change(function(){
        if($(this).is(':checked')){
            $("#act8").fadeIn();
        }else{
            $("#act8").hide();
        }
    });
    /** Actividad 9 */
    $('#a_9').change(function(){
        if($(this).is(':checked')){
            $("#act9").fadeIn();
        }else{
            $("#act9").hide();
        }
    });
    /** Actividad 10 */
    $('#a_10').change(function(){
        if($(this).is(':checked')){
            $("#act10").fadeIn();
        }else{
            $("#act10").hide();
        }
    });
    /** Actividad 11 */
    $('#a_11').change(function(){
        if($(this).is(':checked')){
            $("#act11").fadeIn();
        }else{
            $("#act11").hide();
        }
    });
    /** Actividad 12 */
    $('#a_12').change(function(){
        if($(this).is(':checked')){
            $("#act12").fadeIn();
        }else{
            $("#act12").hide();
        }
    });
    /** Actividad 13 */
    $('#a_13').change(function(){
        if($(this).is(':checked')){
            $("#act13").fadeIn();
        }else{
            $("#act13").hide();
        }
    });
    /** Actividad 14 */
    $('#a_14').change(function(){
        if($(this).is(':checked')){
            $("#act14").fadeIn();
        }else{
            $("#act14").hide();
        }
    });
    /** Actividad 15 */
    $('#a_15').change(function(){
        if($(this).is(':checked')){
            $("#act15").fadeIn();
        }else{
            $("#act15").hide();
        }
    });
    /** Actividad 16 */
    $('#a_16').change(function(){
        if($(this).is(':checked')){
            $("#act16").fadeIn();
        }else{
            $("#act16").hide();
        }
    });
    /** Actividad 17 */
    $('#a_17').change(function(){
        if($(this).is(':checked')){
            $("#act17").fadeIn();
        }else{
            $("#act17").hide();
        }
    });
    /** Actividad 18 */
    $('#a_18').change(function(){
        if($(this).is(':checked')){
            $("#act18").fadeIn();
        }else{
            $("#act18").hide();
        }
    });
    /** Actividad 19 */
    $('#a_19').change(function(){
        if($(this).is(':checked')){
            $("#act19").fadeIn();
        }else{
            $("#act19").hide();
        }
    });
    /** Actividad 20 */
    $('#a_20').change(function(){
        if($(this).is(':checked')){
            $("#act20").fadeIn();
        }else{
            $("#act20").hide();
        }
    });
    /** Actividad 21 */
    $('#a_21').change(function(){
        if($(this).is(':checked')){
            $("#act21").fadeIn();
        }else{
            $("#act21").hide();
        }
    });
     /** Actividad 22 */
     $('#a_22').change(function(){
        if($(this).is(':checked')){
            $("#act22").fadeIn();
        }else{
            $("#act22").hide();
        }
    });
     /** Actividad 23 */
     $('#a_23').change(function(){
        if($(this).is(':checked')){
            $("#act23").fadeIn();
        }else{
            $("#act23").hide();
        }
    });
     /** Actividad 21 */
     $('#a_24').change(function(){
        if($(this).is(':checked')){
            $("#act24").fadeIn();
        }else{
            $("#act24").hide();
        }
    });
     /** Actividad 25 */
     $('#a_25').change(function(){
        if($(this).is(':checked')){
            $("#act25").fadeIn();
        }else{
            $("#act25").hide();
        }
    });
     /** Actividad 26 */
     $('#a_26').change(function(){
        if($(this).is(':checked')){
            $("#act26").fadeIn();
        }else{
            $("#act26").hide();
        }
    });
     /** Actividad 27 */
     $('#a_27').change(function(){
        if($(this).is(':checked')){
            $("#act27").fadeIn();
        }else{
            $("#act27").hide();
        }
    });
     /** Actividad 28 */
     $('#a_28').change(function(){
        if($(this).is(':checked')){
            $("#act28").fadeIn();
        }else{
            $("#act28").hide();
        }
    });
     /** Actividad 29 */
     $('#a_29').change(function(){
        if($(this).is(':checked')){
            $("#act29").fadeIn();
        }else{
            $("#act29").hide();
        }
    });
     /** Actividad 30 */
     $('#a_30').change(function(){
        if($(this).is(':checked')){
            $("#act30").fadeIn();
        }else{
            $("#act30").hide();
        }
    });
    
    /** Back to Dashboard */
    $(document).on('click', '.poin', function(){
        window.location.href='dashboard.php';
    })
    /** Back to Dashboard */
    $(document).on('click', '.dashi', function(){
        //window.location.href='dashboard.php';
    
        console.log('dashboard coming soon');
    })
    /** To show if not in dashboard */
    $(document).ready(function(){
        
        $('.poin').show();

    })
    /** show search */
    $(document).ready(function(){
        
        $('.hid').show();

    })
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
     $(document).on('click', '#mantenimiento', function(){
        document.location = 'vehiculos.php';
    })
    /** For navigation */
    $(document).on('click', '#usuarios', function(e){

        //e.preventDefault();
        window.location.href = 'usuarios.php';

    });
    /** For navigation END*/

})