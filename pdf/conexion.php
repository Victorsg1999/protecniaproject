<?PHP

Class Conexion{

	public static function conectarBD(){
		$server="";
		$usr="root";
		$pass="";
		$bd="protecnia";
		/*$usr="protecni_victoradmin";
		$pass="protecnia2021!";
		$bd="protecni_administration";*/
		
		$mysqli = new mysqli($server, $usr, $pass, $bd); 
		if ($mysqli->connect_errno) { 
			echo "Error: Fallo al conectarse a MySQL debido a: \n"; 
			echo "Errno: " . $mysqli->connect_errno . "\n"; 
			echo "Error: " . $mysqli->connect_error . "\n"; 
			exit;
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}

	public static function desconectarBD($conexion){
  		$conexion->close();
	}
}



?>