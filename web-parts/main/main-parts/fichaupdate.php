<?php

$nombre="";
$apellidos="";
$email="";
$telefono="";
$ciudad="";
$cp="";
$resultado="";
$id=$_GET['id'];
$usuario = new Usuario();

if (!isset($_POST['guardar'])) {
	$resultado=$usuario->recuperartodoslosdatosusuario($id);
		if($resultado==""){
			$nombre=$usuario->get_nombre();
			$apellidos=$usuario->get_apellidos();
			$email=$usuario->get_email();
			$telefono=$usuario->get_telefono();
			$telefono=$usuario->get_telefono();
			$ciudad=$usuario->get_ciudad();
			$cp=$usuario->get_cp();
			/*$tipo=$usuario->get_tipo();
    		$tipo=strtolower($tipo);*/
		}else{
			echo $resultado;
		}
}else{
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$apellidos = htmlspecialchars(trim($_POST['apellidos']));
	$email = htmlspecialchars(trim($_POST['email']));
	$telefono = htmlspecialchars(trim($_POST['telefono']));
	$ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cp = htmlspecialchars(trim($_POST['cp']));
	$usuario->comprobacion_modificacion_datos_usuarios($id,$nombre,$apellidos,$email,$telefono,$ciudad,$cp);
}

?>
<section class="container">


	<div class="box">

		<div class="box-header separacionclienteh2">
			<?php
			if ($_SESSION["usuario"]=="cliente"||$_SESSION['id']==$id) {
			?>
			<h2 class="clientes">Estás editando tu ficha</h2>
			<?php
			}else{
			?>
			<h2 class="clientes">Estás editando el cliente <?php echo " $nombre $apellidos"?></h2>
			<?php
			}
			?>
			<hr/>
		</div>
		<div class="box-body">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-6">
						<label for="name">Nombre</label>
						<input class="form-control" id="nombre" name="nombre" type="text" required autofocus value="<?php echo $nombre  ?>">
					</div>
					<div class="col-md-6">
						<label for="name">Apellidos</label>
						<input class="form-control" id="apellidos" name="apellidos" type="text" required autofocus value="<?php echo $apellidos  ?>">
					</div>
					<div class="col-md-6">
						<label for="name">Correo Electronico</label>
						<input class="form-control" id="email" name="email" type="text" autofocus value="<?php echo $email?>">
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
							<?php 
							if($_SESSION["usuario"]!="cliente"){
							?>
							<a href="index.php?p=clientes" type="reset" title="Atras" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<?php 
							}else{
							?>
							<a href="index.php?p=historicocliente&id=<?php echo $_SESSION['id'] ?>" type="reset" title="Atras" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<?php
							}
							?>
							<button type="submit" name="guardar" class="btn btn-success separacioncontrol">Guardar</button>
							<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</form>
</section>
