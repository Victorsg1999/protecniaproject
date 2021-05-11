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

$(function() {

    $("#administrador").click(function(){

    	if ($(".box-body")) {
    		$(".box-body").remove();
    	}
    	var animacion="";
    		animacion+="<div id='animacion'class='mt-5 d-flex justify-content-center' width:100%;'>";
    		animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
    		animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
    		animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
    		animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
    		animacion+="</div>"
    	$(".box-header").after(animacion);
        setTimeout(function(){
          $("#animacion").remove();
       	}, 1800);
     	setTimeout(function(){
    	var componente="";
    	componente+='<div class="box-body mt-5">';
    		componente+='<form action="" method="post" enctype="multipart/form-data">';
    			componente+='<div class="row">';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">Nombre</label>';
    					componente+='<input class="form-control" id="name" name="nombre" type="text" required autofocus>';
    				componente+='</div>';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">Apellidos</label>';
    					componente+='<input class="form-control" id="name" name="apellidos" type="text" required autofocus>';
    				componente+='</div>';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">Correo Electronico</label>';
    					componente+='<input class="form-control" id="name" name="email" type="text" autofocus>';
    				componente+='</div>';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">Telefono</label>';
    					componente+='<input class="form-control" id="name" name="telefono" type="text" required autofocus>';
    				componente+='</div>';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">Ciudad</label>';
    					componente+='<input class="form-control" id="name" name="ciudad" type="text" required autofocus>';
    				componente+='</div>';
    				componente+='<div class="col-md-6">';
    					componente+='<label for="name">C.P</label>';
    					componente+='<input class="form-control" id="name" name="cp" type="text" required autofocus>';
    				componente+='</div>';
            componente+='<div class="col-md-12">';
              componente+='<label for="name">Cuenta Banco</label>';
              componente+='<input class="form-control" id="cuentabanco" name="cuentabanco" type="text" required autofocus>';
            componente+='</div>';
    				componente+='<div class="row separacioncontroles">';
    					componente+='<div class="col-md-12">';
    						componente+='<a href="index.php?p=clientes" type="reset" class="btn btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>';
    						componente+='<button type="submit" name="guardaradministrador" class="btn btn-success separacioncontrol">Guardar</button>';
    						componente+='<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>';
    					componente+='</div>';
    				componente+='</div>';
    			componente+='</div>';
    		componente+='</form>';
    	componente+='</div>';
    	$(".box-header").after(componente);
      $(tipoempleado).text("Nuevo Administrador");
    	}, 1802);

    });

    $("#trabajador").click(function(){

      if ($(".box-body")) {
        $(".box-body").remove();
      }
      var animacion="";
        animacion+="<div id='animacion'class='mt-5 d-flex justify-content-center' width:100%;'>";
        animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
        animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
        animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
        animacion+="<div class='spinner-grow text-primary' role='status'><span class='visually-hidden'>Loading...</span></div>";
        animacion+="</div>"
      $(".box-header").after(animacion);
        setTimeout(function(){
          $("#animacion").remove();
        }, 1800);
      setTimeout(function(){
      var componente="";
      componente+='<div class="box-body mt-5">';
        componente+='<form action="" method="post" enctype="multipart/form-data">';
          componente+='<div class="row">';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Nombre</label>';
              componente+='<input class="form-control" id="name" name="nombre" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Apellidos</label>';
              componente+='<input class="form-control" id="name" name="apellidos" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Correo Electronico</label>';
              componente+='<input class="form-control" id="name" name="email" type="text" autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Telefono</label>';
              componente+='<input class="form-control" id="name" name="telefono" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Ciudad</label>';
              componente+='<input class="form-control" id="name" name="ciudad" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">C.P</label>';
              componente+='<input class="form-control" id="name" name="cp" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-12">';
              componente+='<label for="name">Cuenta Banco</label>';
              componente+='<input class="form-control" id="cuentabanco" name="cuentabanco" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="row separacioncontroles">';
              componente+='<div class="col-md-12">';
                componente+='<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>';
                componente+='<button type="submit" name="guardartrabajador" class="btn btn-success separacioncontrol">Guardar</button>';
                componente+='<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>';
              componente+='</div>';
            componente+='</div>';
          componente+='</div>';
        componente+='</form>';
      componente+='</div>';
      $(".box-header").after(componente);
      $(tipoempleado).text("Nuevo Empleado");
      }, 1802);
    });
/*
    $("#trabajador").click(function(){

    });
*/


});
