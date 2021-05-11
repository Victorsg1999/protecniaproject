<?php



		Class Historico{

			private $idcliente;
			private $idhistorico;
			private $descripcionhistorico;
			private $idtrabajador;
			private $fecharegistro;

			function __construct($idcliente="",$idhistorico="",$descripcionhistorico="",$idtrabajador="",$fecharegistro=""){
				$this->idcliente = $idcliente;
				$this->idhistorico=$idhistorico;
				$this->descripcionhistorico = $descripcionhistorico;
				$this->idtrabajador=$idtrabajador;
				$this->fecharegistro = $fecharegistro;	
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

			function crear_nuevo_registro_historico($id,$descripcion){
				
				$resultado="";
				$this->descripcion = $descripcion;

				if(strlen($descripcion)>2800){
					$resultado.="error";
				}

				if($resultado==""){
					$this->idcliente = $id;
					$this->registrar_comentantario_nuevo();
				}else{
				echo '<div class=" container-fluid alert alert-danger" role="alert">Los siguientes campos son erroneos: '.$resultado.'.</div>';
				}
			}// fin funcion registrocliente

			function registrar_comentantario_nuevo(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$this->fecharegistro=$this->fecha();
				$sql ="INSERT INTO historicosclientes (idcliente, descripcionhistorico, idtrabajador, fecharegistro) VALUES ('$this->idcliente','$this->descripcion', '$this->idcliente','$this->fecharegistro')";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class=" container-fluid alert alert-success" role="alert">El cliente se ha registrado correctamente!</div>';
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
				//SELECT fecharegistro,nombre,apellidos,descripcionhistorico FROM usuarios INNER JOIN historicosclientes on historicosclientes.idcliente = usuarios.id WHERE historicosclientes.idtrabajador="44" and historicosclientes.id=10
				$sql ='SELECT descripcionhistorico,fecharegistro FROM historicosclientes WHERE id='.$this->idhistorico;

				if ($resultadonombre = $conexion->query($sql)) {
					if($resultadonombre->num_rows>0){
						while ($fila = $resultadonombre->fetch_assoc()){
							$this->descripcionhistorico = $fila['descripcionhistorico'];
							$this->fecharegistro = $fila['fecharegistro'];
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

			function actualizar_historico($id,$descripcion){

				$this->idhistorico=$id;
				$this->descripcion=$descripcion;
				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql = "UPDATE historicosclientes SET descripcionhistorico='$this->descripcion'WHERE id='$this->idhistorico'";

				if ($conexion->query($sql)) {
					echo "string";
					Conexion::desconectarBD($conexion);
				}else{
					$resultado="<p class='error'><b>Ha ocurrido un error al intentar recuperar tus datos, prueba de nuevo.</b></p>";
					return $resultado;
					Conexion::desconectarBD($conexion);
				}
			}// fin funcion recuperartodoslosdatosusuario




		}// fin classe
?>

