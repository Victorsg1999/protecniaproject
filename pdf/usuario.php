<?php
/* REVISAR CLASE */
	require("conexion.php");

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


			function comprobar_registro_usuario($nombre,$apellidos,$email,$telefono,$ciudad,$cp,$tipo){
				
				$resultado="";
				$this->nombre = $nombre;
				$this->apellidos = $apellidos;
				$this->email = $email;
				$this->telefono = $telefono;
				$this->ciudad = $ciudad;
				$this->cp = $cp;
				$this->tipo = $tipo;

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
						$resultado.="El campo telefono debe contener 9 digitos y empezar por el numero 6.<br>"; 
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
					$this->registrar_nuevo_usuario();
				}else{
				echo '<div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">'.$resultado.'</div>';
				}
			}// fin funcion comprobar_registro_cliente


			function registrar_nuevo_usuario(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql ="INSERT INTO usuarios (nombre,apellidos,email,telefono,ciudad,cp,usuario,contraseña,tipo) VALUES ('$this->nombre','$this->apellidos', '$this->email','$this->telefono','$this->ciudad','$this->cp','$this->email','$this->email','$this->tipo')";
				if ($conexion->query($sql)) {
					$this->enviarcorreo_a_contacto();
					if($this->tipo=="Cliente"){
						echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">El cliente se ha registrado correctamente!</div>';
					}else if($this->tipo=="Admin"){
						echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">El nuevo empleado se ha registrado correctamente como Administrador!</div>';
					}else{
						echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">El nuevo empleado se ha registrado correctamente.!</div>';
					}
					
				}else{
					echo "no";
				}
				Conexion::desconectarBD($conexion);

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
						echo '<div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">No se ha actualizado ningun dato del usuario!</div>';
					}

				}
				
			}// fin funcion comprobacion_modificacion_datos_usuarios

			function insertarcambios(){

				$resultado="";
				$conexion = Conexion::conectarBD();
				$sql = "UPDATE usuarios SET nombre='$this->nombre',apellidos='$this->apellidos',email='$this->email', telefono='$this->telefono',ciudad='$this->ciudad',cp='$this->cp' WHERE id='$this->id'";

				if ($conexion->query($sql)) {
					Conexion::desconectarBD($conexion);
					echo '<div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">Se ha actualizado el usuario!</div>';
				}else{
					echo "no";
					Conexion::desconectarBD($conexion);
				}		

			}// fin funcion insertarcambios

			function enviarcorreo_a_contacto(){
				
				$to=$this->email;
		        $asunto = "Datos usuario Protecnia";
		        $headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: Protecnia <victorsempereguilaber1999@gmail.com>" . "\r\n";
				$headers .= "Cc: victorsempereguilaber1999@gmail.com" . "\r\n";
		        $contenido = "
		                <p>Sr./Sra. <strong>$this->nombre</strong>,</p>
		                <p>Sus datos de acceso para poder ver sus reformas es este mismo correo y contraseña, si desea puede cambiar los datos de acceso mediante la url.</p>
		                <p>Gracias por confiar en nuestro servicio.</p>
		                <p>Un cordial saludo.</p>
		                <img src='https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png' alt='LOGO' width='30%'>
		            	";

		        if (mail($to,$asunto,$contenido,$headers)) {
		            ?>
		            <div class="alert alert-success d-flex justify-content-center" role="alert" style="width:100%">
		                Se ha enviado el correo con los datos de login.
		            </div>
		        <?php
		        }else{
		        ?>
		            <div class="alert alert-danger d-flex justify-content-center" role="alert" style="width:100%">
		                El correo no ha sido enviado. Ha ocurrido un error. Vuelva a intentarlo o pongase en contacto con nosotros por otra via.
		            </div>
		        <?php
		        }
			}// fin funcion enviarcorreo_a_contacto

			function eliminarUsuario($id){
				$conexion = Conexion::conectarBD();
				$sql = "DELETE FROM usuarios WHERE id='$id'";
				if(!$conexion->query($sql)){
					echo "string";
				}
				Conexion::desconectarBD($conexion);
			}

		}// fin classe
?>

