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
if (isset($_POST['guardaradministrador'])) {
	$usuario = new Usuario();
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$usuario->registrotrabajador($nombre,$apellidos,$email,$telefono,$ciudad,$cp);
}

if (isset($_POST['guardartrabajador'])) {
	$usuario = new Usuario();
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$usuario->registrotrabajador($nombre,$apellidos,$email,$telefono,$ciudad,$cp);
}

?>
<section class="container">
<!--class='mt-5 d-flex justify-content-center'-->

	<div class="box">
		<div class="box-header separacionclienteh2">
			<h2 id="tipoempleado" class="clientes">Añadir Perfil</h2>
			<hr/>
			<div id="perfiles">
				<button id="administrador">Administrador</button>
				<button id="trabajador">Empleado</button>
			</div>
		</div>
	</div>
</section>
