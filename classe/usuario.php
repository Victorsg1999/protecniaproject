<?php
/* REVISAR CLASE */
	require("conexion/conexion.php");

		Class Usuario{

			private $id;
			private $nombre;
			private $apellidos;
			private $email;
			private $telefono;
			private $ciudad;
			private $cp;
			private $usuario;
			private $contraseña;

			function __construct($id="",$nombre="",$apellidos="",$email="",$telefono="",$ciudad="",$cp="",$usuario="",$contraseña="",$tipo=""){
				$this->id = $id;
				$this->nombre = $nombre;
				$this->apellidos=$apellidos;
				$this->email = $email;
				$this->telefono = $telefono;
				$this->ciudad = $ciudad;
				$this->cp = $cp;
				$this->usuario = $usuario;
				$this->contraseña = $contraseña;
				$this->tipo = $tipo;		
			}

			function get_id(){
				return $this->id;
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

			function get_tipo(){
				return $this->tipo;
			}

			function existeusuario($usuariolg,$passlg){

				$resultado="";
				$this->usuario = $usuariolg;
				$this->contraseña = $passlg;
				$conexion = Conexion::conectarBD();
				echo $this->usuario;
				echo $this->contraseña;
				$sql ="Select id,usuario,tipo,contraseña From usuarios Where usuario='".$this->usuario."'AND contraseña='".$this->contraseña."'";

				if ($result=$conexion->query($sql)) {
					if($result->num_rows>0){
						$fila = $result->fetch_assoc();
						$this->id = $fila['id'];
						$this->tipo = $fila['tipo'];
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

				if(strlen($this->nombre)==0){
					$resultado.="El nombre debe contener al menos tres caracteres.<br>";
				}else{
					if (!preg_match("/^[A-Z||a-z]{3,12}$/", $nombre)) {
						$resultado.="El nombre debe contener al menos tres caracteres.<br>";
					}
				}

				if(strlen($this->apellidos)==0){
					$resultado.="Debes incluir los dos apellidos.<br>  ";
				}else{
					if (!preg_match("/^[A-Z||a-z]{1,10}\s[A-Z||a-z]{1,10}$/", $this->apellidos)) {
						$resultado.="Debes incluir los dos apellidos separados por un espacio.<br>";
					}
				}
				if(strlen($this->email)==0){
					$resultado.=" El email no puede estar vacio. <br> ";
				}else{
					if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$this->email)) { 
						$resultado.=" El email debe contener una @ y el resto del email. <br>  ";
					}
				}

				if(strlen($this->telefono)==0){
					$resultado.="El campo telefono debe contener 9 digitos.<br>";
				}else{
					if (!preg_match("/^6[0-9]{8}$/", $this->telefono)) {
						$resultado.="El campo telefono debe contener 9 digitos y empezar por el numero.<br>"; 
					}
				}

				if(strlen($this->ciudad)==0){
					$resultado.="El campo ciudad debe contener al menos 3 caracteres.<br>";
				}else{
					if (!preg_match("/^[aA-zZ]{3,20}$/", $this->ciudad)) {
						$resultado.="El campo ciudad debe contener al menos 3 caracteres.<br>";
					}
				}
				if(strlen($this->cp)==0){
					$resultado.="El codigo postal no puede estar vacio.<br>";
				}else{
					if (!preg_match("/^[0-9]{5}$/", $this->cp)) {
						$resultado.=" El codigo postal debe contener 5 digitos.<br>"; 
					}
				}

				if($resultado==""){
					$this->registrar();
				}else{
				echo '<div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">'.$resultado.'</div>';
				}
			}// fin funcion registrocliente

			function registrar(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ="INSERT INTO usuarios (nombre,apellidos,email,telefono,ciudad,cp,usuario,contraseña,tipo) VALUES ('$this->nombre','$this->apellidos', '$this->email','$this->telefono','$this->ciudad','$this->cp','$this->email','$this->email','cliente')";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">El cliente se ha registrado correctamente!</div>';
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
				echo '<div class=" container-fluid alert alert-danger" role="alert">Los siguientes campos son erroneos: '.$resultado.'.</div>';
				}
			}// fin funcion contacto

			function recuperartodoslosdatosusuario($id){

				$this->id = $id;
				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ='SELECT * FROM usuarios WHERE id='.$this->id;

				if ($resultadonombre = $conexion->query($sql)) {
					if($resultadonombre->num_rows>0){
						while ($fila = $resultadonombre->fetch_assoc()){
							$this->nombre = $fila['nombre'];
							$this->apellidos = $fila['apellidos'];
							$this->email = $fila['email'];
							$this->telefono = $fila['telefono'];
							$this->ciudad = $fila['ciudad'];
							$this->cp = $fila['cp'];
							$this->tipo = $fila['tipo'];
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

			function comprobacion_modificacion_datos_usuarios($id,$nombre,$apellidos,$email,$telefono,$ciudad,$cp){

				$resultado=$this->recuperartodoslosdatosusuario($id);
				$cambios=0;

				if($resultado==""){

					if($this->nombre!=$nombre||$this->apellidos!=$apellidos||$this->email!=$email||$this->telefono!=$telefono||$this->ciudad!=$ciudad||$this->cp!=$cp){
						$cambios=1;
						$this->nombre=$nombre;
						$this->apellidos=$apellidos;
						$this->email=$email;
						$this->telefono=$telefono;
						$this->ciudad=$ciudad;
						$this->cp=$cp;

					}
					if($cambios==1){
						$this->insertarcambios();
					}else{
						echo '<div class=" container-fluid alert alert-danger" role="alert">No se ha actualizado ningun dato del usuario!</div>';
					}

				}
				
			}// fin funcion comprobacion_modificacion_datos_usuarios

			function insertarcambios(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql = "UPDATE usuarios SET nombre='$this->nombre',apellidos='$this->apellidos',email='$this->email', telefono='$this->telefono',ciudad='$this->ciudad',cp='$this->cp' WHERE id='$this->id'";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class=" container-fluid alert alert-success" role="alert">Se ha actualizado el usuario!</div>';
				}else{
					echo "no";
					Conexion::desconectarBD($conexion);
				}		

			}// fin funcion insertarcambios








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

