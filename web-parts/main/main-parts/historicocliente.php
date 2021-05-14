<?php

$nombre="";
$apellidos="";
$email="";
$telefono="";
$ciudad="";
$cp="";
$resultado="";
$id=$_GET['id'];
$resultado="";
$usuario = new Usuario();
$historico = new Historico();

$cabecera=false;
$conexion = Conexion::conectarBD();
$total = $conexion->query("SELECT id,fecharegistro,descripcionhistorico,idtrabajador from historicosclientes where idcliente=$id");
$total=$total->num_rows;
if (isset($_GET['inicioUsuarios'])) {
    $inicio = $_GET['inicioUsuarios'];
}else{
    $inicio = 0;
}
$cuantos = 5;
$paginas = ceil($total/$cuantos);


if (isset($_POST['guardar'])) {
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $idtrabajador=$_SESSION['id'];
    $historico->crear_nuevo_registro_historico($id,$descripcion,$idtrabajador);
}else{
    $resultado=$usuario->recuperartodoslosdatosusuario($id);
    if($resultado==""){
            $nombre=$usuario->get_nombre();
            $apellidos=$usuario->get_apellidos();
            //$NA = $nombre." ". $apellidos;
    }else{
        echo $resultado;
    }
}

?>
<section class="container">

	<div class="box">
        <div class="box-header separacionclienteh2">

        	<h2 class="clientes"><i class="fa fa-user"></i>Historico del cliente <?php echo "$nombre $apellidos"?></h2>
            <hr/>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                    <table class="table table-hover"style="text-align: center;">
                        <?php

                            $conexion = Conexion::conectarBD();
                            $result = $conexion->query("SELECT id,fecharegistro,descripcionhistorico,idtrabajador from historicosclientes where idcliente=$id limit $inicio,$cuantos");
                            while ($fila=$result->fetch_assoc()) {
                                if(!$cabecera){
                                    $cabecera=true;
                                    ?>
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Trabajador</th>
                                                <th scope="col">Opciones</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                <?php
                                }
                                ?>
                                    <tr>
                                        <?php
                                            foreach ($fila as $indice => $valor) {
                                                if($indice!='tipo'&&$indice!='id'&&$indice!='usuario'&&$indice!='contraseña'){
                                                    if ($indice=="idtrabajador") {
                                                        $trabajador = new Usuario();
                                                        $trabajador->recuperartodoslosdatosusuario($valor);
                                                        $nombre_apellido = $trabajador->get_nombre()." ".$trabajador->get_apellidos();
                                                        echo "<td>$nombre_apellido</td>";
                                                    }else{
                                                   echo "<td>$valor</td>";
                                                    }
                                                }
                                                if($indice=='id'){
                                                    $id_historico=$valor;
                                                }
                                                if($indice=='idtrabajador'){
                                                    echo "<td>";
                                                    echo '<a href="'.$_SERVER['PHP_SELF'].'?p=updatehistorico&id='.$id_historico.'"class="btn btn-secondary bg-primary" title="Ver historico"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                                                    if($_SESSION["usuario"]!="cliente"){
                                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?p=historico&id='.$id_historico.'"class="btn btn-warning" title="Imprimir Información cliente"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?p=confirmacioneliminarhistorico&id='.$id_historico.'"class="btn btn-danger text-dark" title="Borrar cliente"><i class="fa fa-trash-o"></i></a>';
                                                    }
                                                    echo "</td>";
                                                }
                                            }
                                            ?>                          
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <?php 
                if($cabecera){
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item
                            <?php if ($inicio==0){
                                echo "disabled";
                            }?>
                            ">
                            <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=historicocliente&id=<?php echo $id ?>&inicioUsuarios=<?php echo $inicio-$cuantos ?>"
                                <?php if ($inicio==0){
                                 echo "tabindex='-1' aria-disabled='true'";
                                }?>
                                >Anterior
                            </a>
                        </li>
                        <?php
                            for($i=1;$i<=$paginas;$i++) {
                        ?>
                                <li class="page-item <?php
                                    if (ceil($inicio/$cuantos)+1==$i){
                                        echo "active";
                                    }?>
                                    ">
                                    <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=historicocliente&id=<?php echo $id ?>&inicioUsuarios=<?php echo $cuantos*($i-1) ?>">
                                        <?php echo $i ?></a>
                                    </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php
                            if ($inicio>=$total-$cuantos){
                                echo "disabled";
                            }?>
                            ">
                                <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=historicocliente&id=<?php echo $id ?>&inicioUsuarios=<?php echo $inicio+$cuantos ?>"
                                    <?php if ($inicio>=$total-$cuantos){
                                        echo "tabindex='-1' aria-disabled='true'";
                                    }?>
                                    >Siguiente</a>
                        </li>
                    </ul>
                </nav>
                <?php 
                }else{
                ?>
                <div class="alert alert-warning d-flex justify-content-center" role="alert">
                    <b>No hay ningun historico del cliente.</b>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
  	</div>
<?php 
if($_SESSION["usuario"]!="cliente"){
?>
	<div class="box mt-3">
		<div class="box-body">
            <h3>Añadir nuevo registro</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <textarea align="justify" class="form-control" maxlength="350" name="descripcion" rows="3" required autofocus></textarea>
                    </div>
                    <div class="row separacioncontroles">
                        <div class="col-md-12">
                            <a href="index.php?p=clientes" type="reset" title="Atras" class="btn btn-secondary separacioncontrol"><i class="fa fa-backward" aria-hidden="true"></i></a>
                            <button type="submit" name="guardar" title="Guardar Registro" class="btn btn-success separacioncontrol"><i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
<?php
}
?>
</section>
 