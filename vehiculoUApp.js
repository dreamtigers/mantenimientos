$(function(){


    /** Listing process, at least the FIRST PART
     * This mtrfckr was way harder than other normal Listings; pay attention to the source (php) code.
     */
    function listThem(){
       
       
        $.ajax({
            url: 'php/vehiculosU/listing.php',
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

        //** Coloring */
        function colorIt(){
            let color = '';
           
            $.ajax({
                type: "GET",
                url: "php/vehiculosU/colorful.php",
                data: "data",
                
                success: function (response) {
                    
                    let dinamica = JSON.parse(response);     
                    console.log(response);
                    // I don't really know how, but i did it               
                    $(".colorFul").each(function(i, elem){
                            var colorFul = $(this);
                                if (dinamica[i] <= 86400) {
                                    //console.log(elem); Nicely green
                                    color = 'rgba(40, 255, 126, 0.734)';
                                    $(this).css("background-color",color);
                                }
                                else if ((dinamica[i] > 86400) && (dinamica[i] < 172800)) {
                                    //console.log(elem); Yellow
                                    color = 'rgba(242, 255, 3, 0.686)';
                                    $(this).css("background-color",color);
                                }
                                else if (dinamica[i] >= 172800) {
                                    //console.log(elem); Rojo
                                    color = 'rgba(255, 36, 36, 0.752)';
                                    $(this).css("background-color",color);
                                }
                                
                    });
        
                }
                
            })
           
            
        }
        colorIt();
        //* Listing again
        function listing2(){
            $.ajax({
                type: "GET",
                url: "php/vehiculosU/listing2.php",
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
    }
    listThem();// Here we won't be listing anymore.

    // HORAS; nueva vista para usuarios    
    $(document).on('click', '.horasM', function(){
        /** The whole 'getting id' process is sortof important 
        *  you might want to take a good look at it.
        */

        let element = $(this)[0].parentElement;
        let id = $(element).attr('taskId');
        console.log(id);

        $.ajax({
            type: "POST",
            url: "php/vehiculosU/goHours.php",
            data: {id:id},
            
            success: function (response) {
               console.log(response);
               document.location = 'horasRestantesU.php';
            }
        });
   
    });

    /** Now logging out */
   
    $(document).on('click', '.logOut', function(){
        $.ajax({
            type: "GET",
            url: "php/vehiculos/logOut.php",
            
            success: function (response) {
                window.location.href='index.php';
            }
        });
    });
     

});