<?php

if($_SESSION["usuario"] != "admin"){
header("Location:index.php");
}
?>
<section class="container">
<?php
$cabecera=false;
$conexion = new mysqli("localhost", "root", "", "login");
	$result = $conexion->query("SELECT * FROM usuarios");
	/*echo "<center><table border='1'>";
	while ($fila=$result->fetch_assoc()) {
		if(!$cabecera){
		echo "<tr>";
			foreach ($fila as $indice => $valor) {
				echo "<td>";
				echo $indice;
				echo "</td>";
			}
			echo "</tr>";
			$cabecera=true;	
		}
	echo "<tr>";
		foreach ($fila as $indice => $valor) {
			echo "<td>";
			echo $valor;
			echo "</td>";
		}
	echo "</tr>";
	}
	echo "</table></center>";		
	$result->free();
	$conexion->close();	*/
?>


<div class="table-responsive">

        <table class="table table-hover">
        	<?php
        	while ($fila=$result->fetch_assoc()) {
				if(!$cabecera){
					$cabecera=true;
					?>
					<thead>
                		<tr>
						<?php
						foreach ($fila as $indice => $valor) {
							?>
							<th scope="col"><?php echo $indice ?></th>
							<?php
						}
						?>
                		</tr>
            		</thead>
            		<tbody>
            		<?php
            	}else{
            		?>
            			<tr>
            				<?php
            				foreach ($fila as $indice => $valor) {
            					echo "<td>$valor</td>";
            				}
            				?>
            			</tr>
            		<?php
            	}
            	?>

            	
				<?php
			}
			?>
            		</tbody>
		</table>
</div>







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
