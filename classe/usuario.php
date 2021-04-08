<?php
require('../conexion/conexion.php');

		Class Usuario{
			private $usuario;
			private $contraseña;

			function __construct($usuario="",$contraseña=""){
				$this->usuario = $usuario;
				$this->contraseña = $contraseña;
			}

			function get_usuario(){
				return $this->usuario;
			}

			function get_contraseña(){
				return $this->contraseña;
			}

			function comprobarvaloresformulario($nombre,$contraseña){
				
				$resultado="";
				$this->usuario = $nombre;
				$this->contraseña = $contraseña;
/*
				if(strlen($this->usuario)==0)&&(strlen($this->contraseña)==0){
					$('.error').slideDown('slow');
                  	setTimeout(function(){
                  	$('.error').slideUp('slow');
                  /*$("#div3").slideUp(6000);*/
                /*	},8500);*/
				/*})*/

				$conexion = Conexion::conectarBD();
				$sql ="Select nombres,tipo From usuarios Where usuario='".$this->usuario."'AND password='".$this->contraseña."'";

				if ($totalemail=$conexion->query($sql)) {
					$cantidademail = $totalemail->num_rows;
					if($cantidademail>0){
						$datos= $totalemail->fetch_assoc();
    					echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
					}else{
						/*$resultado="";*/
						echo json_encode(array('error'=>true));
					}
					$totalemail->free();
					Conexion::desconectarBD($conexion);
					return $resultado;
				}else{
					$resultado="";
					$totalemail->free();
					Conexion::desconectarBD($conexion);
					return $resultado;
				}		
			}// fin funcion comprobarvaloresformulario

		}// fin classe
?>

