/*
jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'procesos/validacionlogin.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  /*if (respuesta.tipo=='Admin') {
                    /*location='user/admin.php';*/
                  /*  location='index.php';
                  }else if (respuesta.tipo=='Usuario') {*/
/*                    location='index.php';
                    /*location='index.php';*/
                  /*}*/
/*                }else {
                  /*$("#id").css("display", "block");*/
/*                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                  /*$("#div3").slideUp(6000);*/
/*                },4000);
                $('.botonlg').val('Iniciar Sesion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
*/