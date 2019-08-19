$(function () { 
    /** needed edit var */
    edit = false;

    /** Show back arrow */
    $(document).ready(function () {

        $('.poin').show();

      })
    /** go back */
    $(document).on('click', '.poin', function(){

        document.location = 'dashboard.php';
    })  

    /** R from CRUD 
     * READING
     * ... Listing 
    */
    function listTem(){
        $.ajax({
            url: 'php/2/listing.php',
            type: 'GET',
            success: function(response){
                /** Lets convert the string-like response into an usable object */
                let trueLists = JSON.parse(response);
                /**Template that will be send to the HTML */
                console.log(trueLists);
                let template = '';
                trueLists.forEach(dato =>{
                    /** Some back-ticks magics */
                    
                    template+=`
                        <tr taskId=${dato.id} > <!-- PAY ATENTION HERE-->
                            <td>${dato.id}</td>
                            <td class='dot task-update'>
                                <a>${dato.propietario}</a>
                            </td>
                            <td>
                                ${dato.fecha}  
                            </td>
                            <td>${dato.kilometraje}</td>
                            <td>${dato.horasDeUso}</td>
                            <td>${dato.year}</td>
                            <td>${dato.ubicacion}</td>
                       
                            
                            <td>
                                <button class='pick4delete btn btn-danger'>Eliminar</img></button>
                            </td>
                        </tr>
                    `
                })
                $('#registros').html(template);
            }
        })
    }
    /**Luego de crearla, la llamamos. */
    listTem();




      /** Logic for the adding Form process
     * and updating
     */
    $('#registerForm').submit(function (e) { 
        e.preventDefault();
        
        /** Creamos el objeto a enviar */
        const pack = {
            fecha: $('#fechaIngreso').val(),
            kilometraje: $('#kilometraje').val(),
            horasUso: $('#horasUso').val(),
            anoF: $('#anoFabricacion').val(),
            ubicacion: $('#ubicacion').val(),
           
        }

        /** Here we will decide wether it's adding or editing 
         * Url, if not editing, must be 'php/add.php'.
         * must be different otherwise...
        */
        let url = edit === false ? 'php/2/add.php' : 'php/2/update.php';

    
        $.post(url, pack, function(response){
            
           
            console.log(pack);
            console.log(edit);
            var x = JSON.parse(response) 

            if (x.ok){
                $('#registerForm').trigger("reset");
                //listThem();
                edit = false;
            } 
            listTem();
        });
        
        
        
    });

    /** Log out */
    $(document).on('click','.logOut', function () {
        /** This is for log out */
        $.ajax({
            type: "GET",
            url: "php/logOut.php",
            
            
            success: function (response) {
                window.location.href='index.php';
            }
        });
      })

    /** Logic for the deleting row process  1 de 2*/
    $(document).on('click', '.pick4delete', function(){


        /**Hagámosle una confirmación a la eliminación 
        if(confirm('¿Seguro de que desea eliminar el dispositivo?')){}*/
            /** Let get the clicked element */
            let element = $(this)[0].parentElement.parentElement; /** Element 0 was the clicked element. */
            var id = $(element).attr('taskId');

            console.log(id);
            /** Hacemos una petición al servidor con AJAX desde Jquery */
            $.ajax({
                /** POST cause we gonna send that son some info. */
                type: "POST",
                url: "php/2/pick4delete.php",
                
                data: {id: id},
                success: function (response) {
                
                    console.log(response);
                    listTem();
                }
            });
        

       

    });


    /** Logic for the updating process.
     *  Part 1/2
     * */
    $(document).on('click', '.task-update', function(){
        /** The whole 'getting id' process is sortof important 
         *  you might want to take a good look at it.
        */
        let element = $(this)[0].parentElement;
        let id = $(element).attr('taskId');
        console.log(id);
        
        /** Ajax posting it */
        $.ajax({
            /** POST cause we gonna send that son some info. */
            type: "POST",
            url: "php/2/getSingle.php",
            
            data: {id: id},
            success: function (response) {
                edit = true;
            
         
                let xx = JSON.parse(response); 
                console.log(response);
                xx.forEach(dato => {
                    $('#fechaIngreso').val(dato.fecha);
                    $('#kilometraje').val(dato.kilometraje);
                    $('#horasUso').val(dato.horasDeUso);
                    $('#anoFabricacion').val(dato.anoF);
                    $('#ubicacion').val(dato.ubicacion);
   
                });
            
            }
       
        });

    });    

    /*Down here the filter process*/
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
                url: "php/2/filter.php",
                
                data: {search: search},
                success: function (response) {
                   
                    /** Tomaremos el string de json y lo llevaremos de verdad a JSON. */
                    let datos = JSON.parse(response);
                    console.log(datos);
                    
                    /** Let's create a template in order to modify the HTML */
                    let template = '';
                    datos.forEach(dato => {
                        template += `
                                <tr letId='${dato.id}'>
                                    <td>${dato.id}</td>
                                    <td class='dot difUpdate'>${dato.propietario}</td> 
                                    <td>
                                        <a>${dato.fecha}</a>   
                                    </td>
                                    <td>${dato.kilometraje}</td>
                                    <td>${dato.horasDeUso}</td>
                                    <td>${dato.anoF}</td>
                                    <td>${dato.ubicacion}</td>
                                   
                                  
                                    <td>
                                        <button class='task-delete btn btn-danger'>Eliminar</img></button>
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
            listTem();
            
           
        }
        
    
    }); 

    /** Logic for UPDATING row process BUT from the filtered list*/
    $(document).on('click', '.difUpdate', function(){

           
        let row=$(this)[0].parentElement;
        let aid = $(row).attr('letId');
        console.log(aid);
        /** Hacemos una petición al servidor con AJAX desde Jquery */
        $.ajax({
            type: "POST",
            url: "php/2/updateFiltered.php",
            data: {aid:aid},
            
            success: function (response) {
                edit = true;
                console.log(response);
                let answers = JSON.parse(response);
            
                answers.forEach(answer => {
                    $('#fechaIngreso').val(answer.fecha);
                    $('#kilometraje').val(answer.kilometraje);
                    $('#horasUso').val(answer.horasDeUso);
                    $('#anoFabricacion').val(answer.anoF);
                    $('#ubicacion').val(answer.ubicacion);
                   
            })

            }
        });
    

   

    });

    /** Just so we can navigate */
    $(document).on('click', '#register', function(e){
        
        window.location.href = 'register_app.php';

    });


    $(document).on('click', '#registrarVehiculo', function(){
        document.location = 'datosDeIngreso.php';
    })

     /** Navigating */
     $(document).on('click', '#vehiculo', function(){
        document.location = 'vehiculos.php';
    })

    /** Just so we can navigate END */

      /** show search */
    $(document).ready(function(){
        
        $('.hid').show();

    })

});