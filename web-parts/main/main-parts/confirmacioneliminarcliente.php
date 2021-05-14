<?php

$id=$_GET['id'];

if (isset($_POST['si'])) {
	$usuario = new Usuario();
	$resultado=$usuario->eliminarUsuario($id);
}
if (isset($_POST['si'])||isset($_POST['no'])) {
	header("Location: index.php?p=clientes");
}
?>

<div class="alert alert-warning" role="alert">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>?p=confirmacioneliminarcliente&id=<?php echo $id ?>" method="POST" id="formularioeliminar">
		<p id="preguntacentrada">¿Desea eliminar este usuario?</p>
		<div id="confirmacion">
			<button type="submit" name='si'>Sí</button>
			<button type="submit" name='no'>No</button>
		</div>
	</form>
</div>
