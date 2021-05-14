$(function() {

    $("#administrador").click(function(){

    	if ($(".box-body")) {
    		$(".box-body").remove();
    	}
    	var animacion="";
    		animacion+="<div id='animacion'class='mt-5 d-flex justify-content-center' style='width:100%';'>";
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
              componente+='<input class="form-control" id="nombre" name="nombre" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Apellidos</label>';
              componente+='<input class="form-control" id="apellidos" name="apellidos" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Correo Electronico</label>';
              componente+='<input class="form-control" id="email" name="email" type="text" autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Telefono</label>';
              componente+='<input class="form-control" id="telefono" name="telefono" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Ciudad</label>';
              componente+='<input class="form-control" id="ciudad" name="ciudad" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">C.P</label>';
              componente+='<input class="form-control" id="cp" name="cp" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="row separacioncontroles">';
              componente+='<div class="col-md-12">';
                componente+='<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>';
                componente+='<button id="guardaradministrador" onclick="guardardatos()" name="guardaradministrador" class="btn btn-success separacioncontrol">Guardar</button>';
                componente+='<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>';
              componente+='</div>';
            componente+='</div>';
          componente+='</div>';
        componente+='</form>';
      componente+='</div>';
    	$(".box-header").after(componente);
      		$(tipoempleado).text("Nuevo Administrador");
          localStorage.setItem("trabajador","Nuevo Administrador");
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
              componente+='<input class="form-control" id="nombre" name="nombre" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Apellidos</label>';
              componente+='<input class="form-control" id="apellidos" name="apellidos" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Correo Electronico</label>';
              componente+='<input class="form-control" id="email" name="email" type="text" autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Telefono</label>';
              componente+='<input class="form-control" id="telefono" name="telefono" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">Ciudad</label>';
              componente+='<input class="form-control" id="ciudad" name="ciudad" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="col-md-6">';
              componente+='<label for="name">C.P</label>';
              componente+='<input class="form-control" id="cp" name="cp" type="text" required autofocus>';
            componente+='</div>';
            componente+='<div class="row separacioncontroles">';
              componente+='<div class="col-md-12">';
                componente+='<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>';
                componente+='<button id="guardartrabajador" onclick="guardardatos()" name="guardartrabajador" class="btn btn-success separacioncontrol">Guardar</button>';
                componente+='<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>';
              componente+='</div>';
            componente+='</div>';
          componente+='</div>';
        componente+='</form>';
      componente+='</div>';
      $(".box-header").after(componente);
      $(tipoempleado).text("Nuevo Empleado");
      localStorage.setItem("trabajador","Nuevo Empleado");
      }, 1802);
    });
function guardardatos() {
    localStorage.setItem("nombre",$("#nombre").val());
    //localStorage.removeItem("nombre");
    localStorage.setItem("apellidos",$("#apellidos").val());
    localStorage.setItem("email",$("#email").val());
    localStorage.setItem("telefono",$("#telefono").val());
    localStorage.setItem("ciudad",$("#ciudad").val());
    localStorage.setItem("cp",$("#cp").val());

}
});

