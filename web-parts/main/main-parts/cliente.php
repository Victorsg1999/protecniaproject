
<?php
/*if($_SESSION["usuario"] == "cliente"){
header("Location: index.php?p=clientes");
}*/

function eliminarUsuario(){
    $usuario = new Usuario();
    $usuario->eliminarUsuario($id);
}
if(isset($_REQUEST["condicion"])){
    if($_REQUEST["condicion"] == "eliminarUsuario" ){
       echo eliminarUsuario();
       exit();
    }
}


?>
<section class="container">
<?php
    $cabecera=false;
?>
	<div class="container"><!-- my-5 mb-5-->
		<div class="box">
            <div class="box-header separacionclienteh2">
                <h2 id="tipoempleado" class="clientes"><i class="fa fa-users"></i>Usuarios</h2>
                <hr/>
                <form id="mostrar" action="<?php echo $_SERVER['PHP_SELF'] ?>?p=clientes" method="POST">
                    <div id="perfiles">
                        <button type="submit" name='usuarios'>Clientes</button>
                        <?php
                        if($_SESSION['id']==1||$_SESSION["usuario"] ="Admin"){
                        ?>
                        <button type="submit" name='empleado'>Empleado</button>
                        <!--<button type="submit" name='administrador'>Administrador</button>-->
                        <?php
                    	}
                        ?>
                    </div>
                </form>
            </div>
<?php 
if (isset($_POST['usuarios'])||isset($_POST['empleado'])||isset($_GET['administrador'])) {
?>
            <div class="box-body mt-5">
        		<div class="table-responsive">
                    <table class="table table-hover"style="text-align: center;">
                    	<?php
                            if(isset($_POST['usuarios'])){
                                $conexion = Conexion::conectarBD();
                                $total = $conexion->query("SELECT * FROM usuarios WHERE tipo ='cliente'");
                                $total=$total->num_rows;
                                if (isset($_GET['inicioUsuarios'])) {
                                    $inicio = $_GET['inicioUsuarios'];
                                }else{
                                    $inicio = 0;
                                }
                                $cuantos = 10;
                                $paginas = ceil($total/$cuantos);
                                $result = $conexion->query("SELECT * FROM usuarios where tipo='cliente' limit $inicio,$cuantos");  
                            }

                            if(isset($_POST['empleado'])){
                                $conexion = Conexion::conectarBD();
                                $total = $conexion->query("SELECT * FROM usuarios where tipo='Trabajador'");
                                $total=$total->num_rows;
                                if (isset($_GET['inicioUsuarios'])) {
                                    $inicio = $_GET['inicioUsuarios'];
                                }else{
                                    $inicio = 0;
                                }
                                $cuantos = 10;
                                $paginas = ceil($total/$cuantos);
                                $result = $conexion->query("SELECT * FROM usuarios where tipo='Trabajador' limit $inicio,$cuantos");  
                            }

                            if(isset($_POST['administrador'])){
                                $conexion = Conexion::conectarBD();
                                $total = $conexion->query("SELECT * FROM usuarios where tipo='Admin'");
                                $total=$total->num_rows;
                                if (isset($_GET['inicioUsuarios'])) {
                                    $inicio = $_GET['inicioUsuarios'];
                                }else{
                                    $inicio = 0;
                                }
                                $cuantos = 10;
                                $paginas = ceil($total/$cuantos);
                                $result = $conexion->query("SELECT * FROM usuarios where tipo='Admin' limit $inicio,$cuantos");  
                            }
                        	
                        	while ($fila=$result->fetch_assoc()) {
                				if(!$cabecera){
                					$cabecera=true;
                					?>
                    					<thead>
                                    		<tr>
                    						    <?php
                    						        foreach ($fila as $indice => $valor) {
                    							        if($indice!='tipo'&&$indice!='id'&&$indice!='usuario'&&$indice!='contraseña'){
                    							        ?>
                    						                <th scope="col"><?php echo $indice ?></th>
                    							        <?php
                    							        }
                    						        }
                    						    ?>
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
                            					   echo "<td>$valor</td>";
                            					}
                            					if($indice=='id'){
                            						$id=$valor;
                            					}
                            					if($indice=='cp'){
                            						echo "<td>";
                            						echo '<a href="'.$_SERVER['PHP_SELF'].'?p=fichaupdate&id='.$id.'"class="btn btn-secondary" title="Editar Información del cliente"><i class="fa fa-user text-dark"></i>  </a>';
                            						echo '<a href="'.$_SERVER['PHP_SELF'].'?p=historicocliente&id='.$id.'"class="btn btn-warning" title="Historico Cliente"><i class="fa fa-book"></i></a>';
                                                    echo '<a target="_blank" href="pdf/generarPDF.php?id='.$id.'"class="btn btn-info" title="Imprimir Información cliente"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>';
                                                    /*
                                                    echo '<a href=""id="delete_product" data-id="'.$id.'"class="btn btn-danger text-dark" title="Borrar cliente"><i class="fa fa-trash-o"></i></a>';
                                                    */
                                                    echo '<a href="'.$_SERVER['PHP_SELF'].'?p=confirmacioneliminarcliente&id='.$id.'"class="btn btn-danger text-dark" title="Borrar cliente"><i class="fa fa-trash-o"></i></a>';
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
            </div>
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
    		    	<a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=clientes&inicioUsuarios=<?php echo $inicio-$cuantos ?>"
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
                            <a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=clientes&inicioUsuarios=<?php echo $cuantos*($i-1) ?>">
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
                    	<a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] ?>?p=clientes&inicioUsuarios=<?php echo $inicio+$cuantos ?>"
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
            <?php
            if(isset($_POST['usuarios'])){
            ?>
                <b>No hay ningun cliente registrado.</b>
            <?php
            }else if(isset($_POST['empleado'])){
            ?>
                <b>No hay ningun empleado registrado.</b>
            <?php
            }else{
            ?>
                <b>No hay ningun administrador registrado.</b>
            <?php
            }
            ?>
        </div>
        <?php
        Conexion::desconectarBD($conexion);
        }
}
        ?>
    </div>
</div>
</section>