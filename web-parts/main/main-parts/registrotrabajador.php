<?php

if($_SESSION["usuario"] != "admin"){
header("Location:index.php");
}

$resultado="";
if (isset($_POST['guardaradministrador'])) {
	$usuario = new Usuario();
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$tipo="Admin";
	$resultado=$usuario->comprobar_registro_usuario($nombre,$apellidos,$email,$telefono,$ciudad,$cp,$tipo);
}

if (isset($_POST['guardartrabajador'])) {
	$usuario = new Usuario();
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$tipo="Trabajador";
	$resultado=$usuario->comprobar_registro_usuario($nombre,$apellidos,$email,$telefono,$ciudad,$cp,$tipo);
}

?>
<section class="container">
<!--class='mt-5 d-flex justify-content-center'-->

	<div class="box">
		<div class="box-header separacionclienteh2">
				<h2 id="tipoempleado" class="clientes"><i class="fa fa-user"></i>Añadir Perfil</h2>
			<hr/>
			<div id="perfiles">
				<button id="administrador">Administrador</button>
				<button id="trabajador">Empleado</button>
			</div>
		</div>
		<?php
		if (isset($_POST['guardaradministrador'])||isset($_POST['guardartrabajador'])) {
		?>
		<div class="box-body mt-5">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label for="name">Nombre</label>
						<input class="form-control" id="nombre" name="nombre" type="text" required autofocus>
					</div>
					<div class="col-md-6">
						<label for="name">Apellidos</label>
						<input class="form-control" id="apellidos" name="apellidos" type="text" required autofocus>
					</div>
					<div class="col-md-6">
						<label for="name">Correo Electronico</label>
						<input class="form-control" id="email" name="email" type="text" required autofocus>
					</div>
					<div class="col-md-6">
						<label for="name">Telefono</label>
						<input class="form-control" id="telefono" name="telefono" type="text" required autofocus>
					</div>
					<div class="col-md-6">
						<label for="name">Ciudad</label>
						<input class="form-control" id="ciudad" name="ciudad" type="text" required autofocus>
					</div>
					<div class="col-md-6">
						<label for="name">C.P</label>
						<input class="form-control" id="cp" name="cp" type="text" required autofocus>
					</div>
					<div class="row separacioncontroles">
						<div class="col-md-12">
							<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<?php 
							if (isset($_POST['guardaradministrador'])) {
							?>
								<button name="guardaradministrador" id="guardaradministrador" class="btn btn-success separacioncontrol" onclick="guardardatos()">Guardar</button>
								<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
							<?php
							}
							if(isset($_POST['guardartrabajador'])){
							?>
								<button name="guardartrabajador" id="guardartrabajador" class="btn btn-success separacioncontrol" onclick="guardardatos()">Guardar</button>
								<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
							<?php
							}
			}
							?>
						</div>
					</div>
				</div>
<?php  
if($resultado=="no"){
	echo "<script>
		var tipotrabajador=localStorage.getItem('trabajador');
    	$('#tipoempleado').val(tipotrabajador);
 		var nombrerecuperado=localStorage.getItem('nombre');
    	$('#nombre').val(nombrerecuperado);
    	var apellidorecuperado=localStorage.getItem('apellidos');
    	$('#apellidos').val(apellidorecuperado);
    	var correorecuperado=localStorage.getItem('email');
    	$('#email').val(correorecuperado);
    	var telefonorecuperado=localStorage.getItem('telefono');
    	$('#telefono').val(telefonorecuperado);
    	var ciudadrecuperado=localStorage.getItem('ciudad');
    	$('#ciudad').val(ciudadrecuperado);
    	var cprecuperado=localStorage.getItem('cp');
    	$('#cp').val(cprecuperado);
	</script>";
}
?>		
	</div>
</section>
