<?php

if($_SESSION["usuario"] != "admin"){
header("Location:index.php");
}

$nombre="";
$apellidos="";
$email="";
$telefono="";
$ciudad="";
$cp="";

if (isset($_POST['guardarcliente'])) {
	$usuario = new Usuario();
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$usuario->registrocliente($nombre,$apellidos,$email,$telefono,$ciudad,$cp);
}

?>
<div id="resultado"></div>
<section class="container">

	<div class="box">
		<div class="box-header separacionclienteh2">
			<h2 class="clientes">Nuevo cliente</h2>
			<hr/>
		</div>
		<div class="box-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label for="name">Nombre</label>
						<input class="form-control" id="nombre" name="nombre" type="text" required autofocus value="<?php echo $nombre?>">
					</div>
					<div class="col-md-6">
						<label for="name">Apellidos</label>
						<input class="form-control" id="apellidos" name="apellidos" type="text" required autofocus value="<?php echo $apellidos?>">
					</div>
					<div class="col-md-6">
						<label for="name">Correo Electronico</label>
						<input class="form-control" id="email" name="email" type="text" required autofocus value="<?php echo $email?>">
					</div>
					<div class="col-md-6">
						<label for="name">Telefono</label>
						<input class="form-control" id="telefono" name="telefono" type="text" required autofocus value="<?php echo $telefono?>">
					</div>
					<div class="col-md-6">
						<label for="name">Ciudad</label>
						<input class="form-control" id="ciudad" name="ciudad" type="text" required autofocus value="<?php echo $ciudad?>">
					</div>
					<div class="col-md-6">
						<label for="name">C.P</label>
						<input class="form-control" id="cp" name="cp" type="text" required autofocus value="<?php echo $cp?>">
					</div>
					<div class="row separacioncontroles">
						<div class="col-md-12">
							<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<button type="submit" name="guardarcliente" id="guardarcliente" class="btn btn-success separacioncontrol">Guardar</button>
							<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
