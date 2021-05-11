<?php

if($_SESSION["usuario"] != "admin"){
header("Location:cliente.php");
}
?>
<section class="container">
<?php
    $cabecera=false;
	$conexion = Conexion::conectarBD();
	$total = $conexion->query("SELECT * FROM usuarios WHERE tipo ='cliente'");
/*print_r($total);*/
	$total=$total->num_rows;
    if (isset($_GET['inicioUsuarios'])) {
        $inicio = $_GET['inicioUsuarios'];
    }else{
        $inicio = 0;
    }
   /* echo"<br>".$total;*/
    $cuantos = 10;
    $paginas = ceil($total/$cuantos);
  /*  echo"<br>".$paginas;*/
?>

	<div class="container"><!-- my-5 mb-5-->
		<div class="box">
            <div class="box-header separacionclienteh2">
                <h2 class="clientes"><i class="fa fa-users"></i>  Clientes</h2>
                <hr/>
            </div>
            <div class="box-body">
        		<div class="table-responsive">
                    <table class="table table-hover"style="text-align: center;">
                    	<?php
                        	$result = $conexion->query("SELECT * FROM usuarios where tipo='cliente' limit $inicio,$cuantos");
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
                            						echo '<a href="'.$_SERVER['PHP_SELF'].'?p=historicocliente&id='.$id.'"class="btn btn-warning" title="Imprimir Información cliente"><i class="fa fa-book"></i></a>';
                            						echo '<a href="imprimircliente.php?id='.$id.'" target="_blank" class="btn btn-info" title="Imprimir Información cliente"><i class="fa fa fa-print text-dark"></i></a>  ';
                            						echo '<a href="eliminarcliente.php?id='.$id.'" target="_blank" class="btn btn-danger text-dark" title="Borrar cliente"><i class="fa fa-trash-o"></i></a>';
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
    </div>
</div>
</section>