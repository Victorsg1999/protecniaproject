<?php

$nombre="";
$apellidos="";
$email="";
$telefono="";
$mensaje="";
if (isset($_POST['guardar'])) {
	$usuario = new Usuario();
	/*var_dump($_POST);*/
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$mensaje = htmlspecialchars(trim($_POST['mensaje']));
	$usuario->contacto($nombre,$apellidos,$email,$telefono,$mensaje);
}

?>

    <section id="formulariocontacto">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="contactolegend">Contactanos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user iconocontacto"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="nombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user iconocontacto"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="apellidos" type="text" placeholder="Apellidos" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o iconocontacto"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="email" placeholder="Correo electronico" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square iconocontacto"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="telefono" type="number" placeholder="telefono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o iconocontacto"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe la pregunta deseada. Te contestaremos lo antes posible." rows="8" cols="24"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="guardar" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<!--      <div class="wrapper">
      <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
      </div>
        <div class="imagen">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png" class="formimagencentrada">
        </div>
        <form method="POST">
          <div class="field">
            <input type="text" required name="usuariolg">
            <label>Usuario</label>
          </div>
          <div class="field">
            <input type="password" required name="passlg">
            <label>Contraseña</label>
          </div>

          <div class="field">
            <input type="submit" name="registro" value="Iniciar Sesion" class="botonlg">
          </div>
        </form>
      </div>-->
    </section>
           <!--   <div class="alert alert-danger formularioincorrecto" role="alert">
        <strong>El usuario y la contraseña no son validos.</strong>
      </div>--->