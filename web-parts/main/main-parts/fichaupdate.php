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

if (!isset($_POST['guardar'])||isset($_POST['cancelar'])) {
	$resultado=$usuario->recuperartodoslosdatosusuario($id);
		if($resultado==""){
			$nombre=$usuario->get_nombre();
			$apellidos=$usuario->get_apellidos();
			$email=$usuario->get_email();
			$telefono=$usuario->get_telefono();
			$telefono=$usuario->get_telefono();
			$ciudad=$usuario->get_ciudad();
			$cp=$usuario->get_cp();
			$tipo=$usuario->get_tipo();
    		$tipo=strtolower($tipo);
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
			if($tipo=="cliente"){ 
			?>
			<h2 class="clientes">Estás editando tu ficha</h2>
			<?php
			}else{
			?>
			<h2 class="clientes">Estás editando el cliente <?php echo $nombre, $apellidos?></h2>
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
						<input class="form-control" id="name" name="nombre" type="text" required autofocus value="<?php echo $nombre  ?>">
					</div>
					<div class="col-md-6">
						<label for="name">Apellidos</label>
						<input class="form-control" id="name" name="apellidos" type="text" required autofocus value="<?php echo $apellidos  ?>">
					</div>
					<div class="col-md-6">
						<label for="name">Correo Electronico</label>
						<input class="form-control" id="name" name="email" type="text" autofocus value="<?php echo $email?>">
					</div>
					<div class="col-md-6">
						<label for="name">Telefono</label>
						<input class="form-control" id="name" name="telefono" type="text" required autofocus value="<?php echo $telefono?>">
					</div>
					<!--
					<div class="col-md-6">
						<label for="name">Fax</label>
						<input class="form-control" id="name" name="fax" type="text" autofocus>
					</div>-->
					<div class="col-md-6">
						<label for="name">Ciudad</label>
						<input class="form-control" id="name" name="ciudad" type="text" required autofocus value="<?php echo $ciudad?>">
					</div>
					<div class="col-md-6">
						<label for="name">C.P</label>
						<input class="form-control" id="name" name="cp" type="text" required autofocus value="<?php echo $cp?>">
					</div>
					<!--
					<div class="col-md-3">
						<label for="name">Fijo</label>
						<input class="form-control" id="name" name="fijo" type="text" autofocus>
					</div>-->
					<div class="row separacioncontroles">
						<div class="col-md-12">
							<a href="index.php?p=clientes" type="reset" title="Atras" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<!--
							<button type="submit" name="" class="btn btn-secondary"><a><i class="fa fa-backward" aria-hidden="true"></i></button>-->
							<button type="submit" name="guardar" class="btn btn-success separacioncontrol">Guardar</button>
							<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<!--
	<div align="right">
		<button type="submit" class="btn btn-success btn-lg" title="Guardar cliente"><i class="fa fa-save"></i></button>
		<a href="imprimircadastrotudo.php?idc=298" target="_blank" class="btn btn-info" title="Imprimir Información cliente"><i class="fa fa fa-print"></i></a>|
		<a href="delcliente.php?idc=298" action="delcliente.php" onclick="return deleta_cliente();" class="btn btn-danger" title="Borrar cliente"><i class="fa fa-trash-o"></i></a>
	</div>
	    <form  method="post" action="ainstbh.php">

  <input type="hidden"  name="nome" value="mirian prata">
  <input type="hidden"  name="log" value="fabricio">
      <input type="hidden"  class="form-control" name="idc" value=298>
    <div class="form-group col-md-50"><div id="aqui"></div> 
      <label for="campo2"><h3>Histórico</h3></label>
    <textarea align="justify" class="form-control" id="alvo" maxlength="350" name="descricao" rows="3" required></textarea>
      </div>    
  </div>
     <div class="col-md-12">
     <button type="submit" class="btn btn-success btn-lg" title="Salvar Histórico"><i class="fa fa-save"></i></button>
    </div>
</form>
<br>
<table class="table table-hover"><th width="15%" align="left">Data</th><th width="70%" align="left">Descrição</th><th width="15%" align="left">Usuário</th><th width="10%" align="right">Opções</th><th width="10%" align="right">Deletar</th></table>
<form  method="post" action="ainstbh.php">
<input type="hidden"  name="log" value="fabricio">
<table class="table table-hover">
<thead>
<tr>
<tr class="actions text-right">
<td width="15%" align="left" valign="middle">08/02/2021 15:33:31</td>
<td width="50%" align="left"><a href="historicoalterar.php?idh=349&idc=298" title="Editar">Rio de Janeiro da Silva Oliveira</a></td>
<td width="15%" align="left"><a href="historicoalterar.php?idh=349&idc=298" title="Editar">admin</a></td>
</tr>
</tr>
</thead>
</table>
</form>-->
</section>
<!--
<section class="content">
	
	<table class="table table-hover table-sm">
		<thead>
			<tr>
				<th class="text-center">123456</th>
				<th class="text-center">123456</th>
				<th class="text-center">123456</th>
				<th class="text-center">123456</th>
				<th class="text-center">123456</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">123456</td>
				<td class="text-center">123456</td>
				<td class="text-center">123456</td>
				<td class="text-center">123456</td>
				<td class="text-center">123456</td>
				
			</tr>
		</tbody>
	</table>
</section>--->
