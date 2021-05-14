<?php



		Class Historico{

			private $idcliente;
			private $idhistorico;
			private $descripcionhistorico;
			private $idtrabajador;
			private $fecharegistro;
			private $nombre_apellido_trabajador;

			function __construct($idcliente="",$idhistorico="",$descripcionhistorico="",$idtrabajador="",$fecharegistro="",$nombre_apellido_trabajador=""){
				$this->idcliente = $idcliente;
				$this->idhistorico=$idhistorico;
				$this->descripcionhistorico = $descripcionhistorico;
				$this->idtrabajador=$idtrabajador;
				$this->fecharegistro = $fecharegistro;
				$this->nombre_apellido_trabajador = $nombre_apellido_trabajador;
			}

			function get_idcliente(){
				return $this->idcliente;
			}

			function get_idhistorico(){
				return $this->idhistorico;
			}

			function get_descripcionhistorico(){
				return $this->descripcionhistorico;
			}

			function get_idtrabajador(){
				return $this->idtrabajador;
			}

			function get_fecharegistro(){
				return $this->fecharegistro;
			}

			function get_nombre_apellido_trabajador(){
				return $this->nombre_apellido_trabajador;
			}

			function crear_nuevo_registro_historico($id,$descripcion,$idtrabajador){
				
				$resultado="";
				$this->descripcionhistorico = $descripcion;

				if(strlen($descripcion)>2800){
					$resultado.="error";
				}

				if($resultado==""){
					$this->idcliente = $id;
					$this->idtrabajador=$idtrabajador;
					$this->registrar_comentantario_nuevo();
				}else{
				echo '<div class=" container-fluid alert alert-danger d-flex justify-content-center" role="alert">Los siguientes campos son erroneos: '.$resultado.'.</div>';
				}
			}// fin funcion registrocliente

			function registrar_comentantario_nuevo(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$this->fecharegistro=$this->fecha();
				$sql ="INSERT INTO historicosclientes (idcliente, descripcionhistorico, idtrabajador, fecharegistro) VALUES ('$this->idcliente','$this->descripcionhistorico', '$this->idtrabajador','$this->fecharegistro')";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">Se ha añadido el nuevo historico correctamente!</div>';
				}else{
					echo "no";
					Conexion::desconectarBD($conexion);
				}		

			}

			function fecha (){
   				$fecha=date("Y-m-d H:i:s");
   				return ($fecha);
			}// fin funcion fecha

			function recuperarhistorico($id){
				$this->idhistorico=$id;
				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ='SELECT usuarios.nombre,usuarios.apellidos,descripcionhistorico,fecharegistro  FROM usuarios INNER JOIN historicosclientes on historicosclientes.idtrabajador = usuarios.id WHERE historicosclientes.id='.$this->idhistorico;

				if ($resultadonombre = $conexion->query($sql)) {
					if($resultadonombre->num_rows>0){
						while ($fila = $resultadonombre->fetch_assoc()){
							$this->descripcionhistorico = $fila['descripcionhistorico'];
							$this->fecharegistro = $fila['fecharegistro'];
							$this->nombre_apellido_trabajador = $fila['nombre']." ".$fila['apellidos'];

						}
						$resultado="";
						return $resultado;
					}else{
						$resultado='<div class=" container-fluid alert alert-danger" role="alert">No existe ese usuario</div>';
						return $resultado;
					}
					Conexion::desconectarBD($conexion);
				}else{
					$resultado="<p class='error'><b>Ha ocurrido un error al intentar recuperar tus datos, prueba de nuevo.</b></p>";
					return $resultado;
					Conexion::desconectarBD($conexion);
				}
			}// fin funcion recuperartodoslosdatosusuario

			function comprobacion_modificacion_datos_historico($id,$descripcion){

				$resultado=$this->recuperarhistorico($id);
				$cambios=0;

				if($resultado==""){

					if($this->descripcionhistorico!=$descripcion){
						$cambios=1;

					}
					if($cambios==1){
						$this->idhistorico = $id;
						$this->descripcionhistorico = $descripcion;
						$this->actualizar_historico();
					}else{
						echo '<div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">No se ha actualizado la descripcion del historico!</div>';
					}

				}
				
			}// fin funcion comprobacion_modificacion_datos_historico

			function actualizar_historico(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql = "UPDATE historicosclientes SET descripcionhistorico='$this->descripcionhistorico'WHERE id='$this->idhistorico'";

				if ($conexion->query($sql)) {
					echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">Se ha actualizado el historico correctamente!</div>';
					
				}else{
					echo '<div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">Ha ocurrido un error al intentar actualizar el historico.</div>';
				}
				Conexion::desconectarBD($conexion);
			}// fin funcion actualizar_historico




		}// fin classe
?>

