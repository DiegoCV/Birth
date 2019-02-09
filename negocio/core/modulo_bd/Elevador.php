<?php
	include_once('../negocio/core/util_conexion/DataBase_2.php');
	/**
	 * Encargada de subir y bajar la base de datos del usuario
	 */
	class Elevador 
	{
		private $con;
		private $nombre;

		function __construct($nombre)
		{
			$d =  new DataBase_2();
			$this->con = $d->obtenerConexion();
			$this->nombre = $nombre;
		}

		public function subirBD()
		{
			$nn = $this->nombre;
			$coman = "CREATE DATABASE IF NOT EXISTS ". $nn ." COLLATE utf8_spanish_ci";
			$crear_db = $this->con->prepare($coman);
			$crear_db->execute();
			if($crear_db):
				 $dir = dirname(__FILE__,4)."/tmp/".$nn.".sql";
				 echo($dir);
				exec("C:\\xampp\\mysql\\bin\\mysql -uroot -pSoporte {$this->nombre} < {$dir}", $output);
			endif;
		}

		private function getBase(){
		return substr($this->nombre,0,count($this->nombre)-5);
	}

	}