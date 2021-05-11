<?php

$fecharesgistro="";
$descripcion="";
$resultado="";
$id=$_GET['id'];
$cabecera=false;
$historico = new Historico();

if (isset($_POST['guardar'])) {
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $historico->actualizar_historico($id,$descripcion);
    $resultado=$historico->recuperarhistorico($id);
    $descripcion=$historico->get_descripcionhistorico();
    $fecharesgistro=$historico->get_fecharegistro();
}else{
    $resultado=$historico->recuperarhistorico($id);
    if($resultado==""){
        $descripcion=$historico->get_descripcionhistorico();
        $fecharesgistro=$historico->get_fecharegistro();
    }
}

?>
<section class="container">
	<div class="box">
        <div class="box-header separacionclienteh2">
        	<h2 class="clientes"><i class="fa fa-user"></i>Actualización de historico</h2>
            <hr/>
        </div>
        <div class="box-body">
        	    		<form action="" method="post">
				<div class="row">
					<div class="col-md-6">
						<label for="name">Fecha Registro</label>
						<input class="form-control" name="resgistro" type="text" disabled value="<?php echo $fecharesgistro  ?>">
					</div>
					<div class="col-md-6">
						<label for="name">Registrado por</label>
						<input class="form-control" id="name" name="trabajador" type="text" disabled value="<?php echo $fecharesgistro?>">
					</div>
					<div class="col-md-12">
						<label for="name">Descripción actual</label>
						<textarea align="justify" class="form-control" maxlength="350" name="descripcion" rows="3" disabled><?php echo htmlspecialchars($descripcion); ?></textarea>
					</div>
				</div>
			</form>
      		<h3 class="separacionclienteh2">Actualizar Registro</h3>
      		<form action="" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<textarea align="justify" class="form-control" maxlength="350" name="descripcion" rows="3" required autofocus><?php echo htmlspecialchars($descripcion); ?></textarea>
					</div>
		    		<!--<div class="col-md-12">
		     			<button type="submit" class="btn btn-success btn-lg" name="guardar" title="Guardar Histórico"><i class="fa fa-save"></i></button>
	    			</div>-->
	    			<div class="row separacioncontroles">
						<div class="col-md-12">
							<a href="index.php?p=clientes" type="reset" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
							<!--
							<button type="submit" name="" class="btn btn-secondary"><a><i class="fa fa-backward" aria-hidden="true"></i></button>-->
							<button type="submit" name="guardar" class="btn btn-success separacioncontrol">Guardar</button>
							<a href="" type="reset" class="btn btn-danger separacioncontrol">Cancelar</a>
						</div>
					</div>
						</div>
					</div>
	    		</div>
    		</form>
      	</div>    
  	</div>
</div>
</section>

