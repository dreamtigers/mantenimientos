$(function () { 
  
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
    /** Back to Dashboard */
    $(document).on('click', '.poin', function(){
        window.location.href='dashboard.php';
    })
    /** Back to Dashboard */
    $(document).on('click', '.dashi', function(){
       // window.location.href='dashboard.php';
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
     $(document).on('click', '#mantenimientos', function(){
        document.location = 'vehiculos.php';
    })
    /** For navigation */
    $(document).on('click', '#usuarios', function(e){

        //e.preventDefault();
        window.location.href = 'usuarios.php';

    });
    /** For navigation END*/

    //Listing
    function list(){

        $.ajax({
            type: "GET",
            url: "php/historial/list.php",
            
            success: function (response) {
                // Receiving JSON
                let equipos = JSON.parse(response);
                console.log(equipos);

                $template = '';

                equipos.forEach(x => {
                //some back-ticks magics
                $template += `
                        <tr class='hover' id=${x.id}>
                                <!-- they wanted ids gone; I'll just comment them, tho. They might be useful-->
                                <!--td>${x.id}</td-->

                            <td class='horasM'>
                               <a href='#' > ${x.nombre} </a>
                            </td>
                            <td>${x.tiempoMotor}</td>
                            
                        </tr>
                            `
                });

                $('#registros').html($template);
            }
        });

    }
    list();
    // used to go to the hours count
    // now goes to 'mantenimientos.php'
    $(document).on('click', '.horasM', function(){

        let element = $(this)[0].parentElement;
        let id = $(element).attr('id');
        let name = $(this)[0].innerText;
        console.log(id, name);
        $.ajax({
            type: "POST",
            url: "php/historial/goHoras.php",
            data: {id:id,name:name},
           
            success: function (response) {
                console.log(response);
                document.location = 'mantenimientos.php';
            }
        });

    });

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
                url: "php/historial/filter.php",
                data: {search: search},
                success: function (response) {
                   
                    /** Tomaremos el string de json y lo llevaremos de verdad a JSON. */
                    let equipos = JSON.parse(response);
                    console.log(equipos);
                    
                    let template = ''

                    equipos.forEach(element => {
                        //back tick
                        template += `

                            <tr class='hover' hoursId='${element.id}' id='${element.id}'>
                            <!-- they wanted ids gone; I'll just comment them, tho. They might be useful-->
                                <!--td>${element.id}</td-->
                                <td class='irHoras'>
                                    <a href='#'>${element.nombre}</a>    
                                </td>
                                <td>${element.tiempoMotor}</td>
                              
                            </tr>

                                    `;
                    });
                    // Apply the created template
                    $('#registros').html(template);
                   
                    
                }
            });
        } else{
            list();
            
           
        }
        
    
    });

     // Go to the hours count from filtered list,
     /** Or at least it USED TO do that */
     $(document).on('click', '.irHoras', function(){

        let element = $(this)[0].parentElement;
        let id = $(element).attr('id');
        let name = $(this)[0].innerText;
        console.log(id, name);
        $.ajax({
            type: "POST",
            url: "php/historial/goHoras.php",
            data: {id:id,name:name},
           
            success: function (response) {
                console.log(response);
                document.location = 'mantenimientos.php';
            }
        });
    });

 })