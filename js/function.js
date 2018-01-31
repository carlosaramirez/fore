function item_menu(id)
    {

                   
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#city').val($(this).text());
                    //Hacemos desaparecer el resto de sugerencias
                    $('#opcs').fadeOut(1000);
                    $.ajax({
                        type: "POST",
                        url: "Forecast/get/"+id,
                        
                        success: function(data) {
                            
                            $('#forecast').html(data);
                                          
                         }
                        });
                
    }

function menu_fav()
    {
        $.ajax({
            type: "POST",
            url: "City/menu_favoritos/",
             dataType: 'html',
             context: this,           
            success: function(data) {

                $('div .dropdown').append(data);
                //$(this).dropdown('toggle')
                //$('#user').popover('hide');
            }
        });
    }


function favorito ($id)
    {   $( "button" ).click(function() {});
        $(this).addClass( "favori" );
        $.ajax({
            type: "POST",
            url: "Forecast/set_favorito/"+id,
             dataType: 'html',
             context: this,           
            success: function(data) {
                menu_fav()
                //$('#central').html(data);
                //$('#user').popover('hide');
            }
        });
    }

function butn_register (){ 
     
        $.ajax({
            type: "POST",
            url: "User/frmregister/",
             dataType: 'html',
             context: this,           
            success: function(data) {
                $('#central').html(data);
                $('#user').popover('hide');
            }
        });
    }

function butn_login (){ 
     
        $.ajax({
            type: "POST",
            url: "User/frmlogin/",
             dataType: 'html',
             context: this,           
            success: function(data) {
                $('#central').html(data);
                $('#user').popover('hide');
            }
        });
    }

$(document).ready(function() {   
    //$('[data-toggle="popover"]').popover();
    menu_fav()
    $('.dropdown-toggle').dropdown()
    $('#user').popover({"trigger": "manual", "html":"true"});
    $('#city').keypress(function(){
       
        city = $(this).val();  
        n = city.length      
        if (n>1)
        {
            $.ajax({
            type: "POST",
            url: "City/opciones/"+city,
            
            success: function(data) {
                
                $('#opcs').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('a').click(function() { 
                    //Obtenemos la id unica de la sugerencia pulsada
                    
                    id = $(this).attr('id');
                    //salert(id);
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#city').val($(this).text());
                    //Hacemos desaparecer el resto de sugerencias
                    $('#opcs').fadeOut(1000);
                    $.ajax({
                        type: "POST",
                        url: "Forecast/get/"+id,
                        
                        success: function(data) {
                            
                            $('#forecast').html(data);
                                          
                         }
                        });
                });              
             }
            });
        }else
        {
            $('#opcs').fadeOut(1000);
        }

        
        
    });

    $('#user').click(function(){
        $.ajax({
            type: "POST",
            url: "User/vtnlogin/",
             dataType: 'html',
                      
            success: function(data) {
                            
               
               $('#user').attr('title','<button type="button" class="close" data-dismiss="popover" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
               $('#user').attr('data-content', data);
               $('#user').popover('show');
                                          
                }
        });
        
    });

    $('#btnregister').click(function(){
         $('#user').popover('hide');
        $.ajax({
            type: "POST",
            url: "User/frmregister/",
             dataType: 'html',
             context: this,           
            success: function(data) {
                $('central').html(data);
                $('#user').popover('hide');
            }
        });
    });


    
           
});    

