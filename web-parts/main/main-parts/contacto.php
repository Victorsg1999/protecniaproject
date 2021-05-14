<?php

$nombre="";
$apellidos="";
$email="";
$telefono="";
$mensaje="";
$email="";
$usuario = new Usuario();
if (isset($_POST['guardar'])) {
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$mensaje = htmlspecialchars(trim($_POST['mensaje']));
	$usuario->contactosoporte($nombre,$apellidos,$email,$telefono,$mensaje);
}else{
    if($_SESSION["usuario"]=="cliente"){
        $id= $_SESSION['id'];
        $resultado=$usuario->recuperartodoslosdatosusuario($id);
        $email=$usuario->get_email();
    }
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
                                    <div class="col-md-9">
                                        <input id="fname" name="nombre" type="text" placeholder="Nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user iconocontacto"></i></span>
                                    <div class="col-md-9">
                                        <input id="lname" name="apellidos" type="text" placeholder="Apellidos" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o iconocontacto"></i></span>
                                    <div class="col-md-9">
                                        <input id="email" name="email" type="email" placeholder="Correo electronico" class="form-control" value="<?php echo $email?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square iconocontacto"></i></span>
                                    <div class="col-md-9">
                                        <input id="phone" name="telefono" type="number" placeholder="telefono" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o iconocontacto"></i></span>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe la pregunta deseada. Te contestaremos lo antes posible." rows="9" cols="24"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="guardar" class="btn btn-primary btn-lg enviar">Enviar</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
