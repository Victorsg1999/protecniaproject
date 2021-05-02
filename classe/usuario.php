<?php
/* REVISAR CLASE */
	require("conexion/conexion.php");

		Class Usuario{

			private $nombre;
			private $apellidos;
			private $email;
			private $telefono;
			private $ciudad;
			private $cp;
			private $usuario;
			private $contraseña;

			function __construct($nombre="",$apellidos="",$email="",$telefono="",$ciudad="",$cp="",$usuario="",$contraseña=""){
				$this->nombre = $nombre;
				$this->apellidos=$apellidos;
				$this->email = $email;
				$this->telefono = $telefono;
				$this->ciudad = $ciudad;
				$this->cp = $cp;
				$this->usuario = $usuario;
				$this->contraseña = $contraseña;			
			}

			function get_nombre(){
				return $this->nombre;
			}

			function get_apellidos(){
				return $this->apellidos;
			}

			function get_email(){
				return $this->email;
			}

			function get_telefono(){
				return $this->telefono;
			}

			function get_ciudad(){
				return $this->ciudad;
			}

			function get_cp(){
				return $this->cp;
			}

			function get_usuario(){
				return $this->usuario;
			}

			function get_contraseña(){
				return $this->contraseña;
			}

			function existeusuario($usuariolg,$passlg){

				$resultado="";
				$this->usuario = $usuariolg;
				$this->contraseña = $passlg;
				$conexion = Conexion::conectarBD();
				echo $this->usuario;
				echo $this->contraseña;
				$sql ="Select usuario,tipo From usuarios Where usuario='".$this->usuario."'AND contraseña='".$this->contraseña."'";

				if ($totalemail=$conexion->query($sql)) {
					$cantidademail = $totalemail->num_rows;
					if($cantidademail>0){
						$datos= $totalemail->fetch_assoc();
						Conexion::desconectarBD($conexion);
						$resultado="ok";
						return $resultado;
    					/*echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));*/
					}else{
						Conexion::desconectarBD($conexion);
						$resultado="nook";
						return $resultado;
						/*echo json_encode(array('error'=>true));*/
					}
				}else{
					Conexion::desconectarBD($conexion);
				}		
			}// fin funcion existeusuario


			function registrocliente($nombre,$apellidos,$email,$telefono,$ciudad,$cp){
				
				$resultado="";
				$this->nombre = $nombre;
				$this->apellidos = $apellidos;
				$this->email = $email;
				$this->telefono = $telefono;
				$this->ciudad = $ciudad;
				$this->cp = $cp;

				if(strlen($nombre)==0){
					$resultado.=" Nombre,";
				}

				if(strlen($apellidos)==0){
					$resultado.=" Apellidos,";
				}

				if(strlen($email)==0){
					$resultado.=" Email,";
				}

				if(strlen($telefono)==0){
					$resultado.=" Telefono,";
				}

				if(strlen($ciudad)==0){
					$resultado.=" C.P";
				}

				if($resultado==""){
					$this->registrar();
				}else{
				echo '<div class=" container-fluid alert alert-danger" role="alert">Los siguientes campos son erroneos: '.$resultado.'.</div>';
				}
			}// fin funcion registrocliente

			function registrar(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ="INSERT INTO usuarios (nombre,apellidos,email,telefono,ciudad,cp,usuario,contraseña,tipo) VALUES ('$this->nombre','$this->apellidos', '$this->email','$this->telefono','$this->ciudad','$this->cp','','','cliente')";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class=" container-fluid alert alert-success" role="alert">El cliente se ha registrado correctamente!</div>';
				}else{
					echo "no";
					Conexion::desconectarBD($conexion);
				}		

			}




			function contacto($nombre,$apellidos,$email,$telefono,$mensaje){
				
				$resultado="";
				$this->nombre = $nombre;
				$this->apellidos = $apellidos;
				$this->email = $email;
				$this->telefono = $telefono;
				$this->mensaje = $mensaje;

				if(strlen($this->nombre)==0){
					$resultado.=" Nombre,";
				}

				if(strlen($this->apellidos)==0){
					$resultado.=" Apellidos,";
				}

				if(strlen($this->email)==0){
					$resultado.=" Email,";
				}

				if(strlen($this->telefono)==0){
					$resultado.=" Telefono,";
				}

				if(strlen($this->mensaje)==0){
					$resultado.=" Mensaje,";
				}

				if($resultado==""){
					$this->guardarpregunta();
				}else{
				echo '<div class=" container-fluid alert alert-success" role="alert">Los siguientes campos son erroneos: '.$resultado.'.</div>';
				}
			}// fin funcion contacto
/*
			function guardarpregunta(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ="INSERT INTO contacto (nombre,apellidos,email,telefono,mensaje) VALUES ('$this->nombre', '$this->apellidos', '$this->email','$this->telefono','$this->mensaje')";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo "si";
					$this->enviarcorreo_a_contacto();
				}else{
					//echo "no";
					Conexion::desconectarBD($conexion);
				}		

			}// fin funcion guardarpregunta

			function enviarcorreo_a_contacto(){
				
				$to=$this->email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <you@yourwebsite.com>' . "\r\n";
				$headers .= 'Cc: v.semgui@gmail.com' . "\r\n";
				$contenido='<table width="100%" border="1" cellspacing="1" cellpadding="2">
				<tr><td colspan="2">Someone Contacted You On Your Website</td></tr>
				<tr><td>Subject</td><td>'.$this->email.'</td></tr>
				<tr><td>Message</td><td>'.$this->mensaje.'</td></tr>
				<tr><td colspan="2"><img src="https://a1websitepro.com/wp-content/uploads/2014/09/logo200.png" width="300px"/></td></tr>
				</table>';
				mail($to,$this->email,$contenido,$headers);
				//send message back to AJAX
				echo '<div class="alert alert-success">Thank you for contacting us. Someone will get back to you within 1 Business Day.</div>';


			}// fin funcion enviarcorreo_a_contacto
*/
		}// fin classe
?>

