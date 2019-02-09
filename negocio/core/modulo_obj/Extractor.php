<?php
include_once '../negocio/core/util_conexion/DataBase.php';
include_once 'Entidad.php';
/**
 * 
 */
class Extractor 
{
	private $con;
	private $nombreBD;
	function __construct($nombreBD)
	{
		$this->nombreBD = $nombreBD;
		$this->con = new DataBase($nombreBD);
	}

	public function obtenerEntidades(){
		$nombres = $this->obtenerTablas($this->nombreBD);
		$entidades = array();
		foreach ($nombres as $key => $value) {
			$set = $this->obtenerColumnas($value);
			$atributos = array();
			for ($i = 0; $i < count($set); $i++) {
				array_push($atributos,$set[$i]['Field']);
        	}
			array_push($entidades,new Entidad($value,$atributos));
		}
		return $entidades;
	}


	private function obtenerTablas($nombre){
        $sql = "SHOW TABLES FROM $nombre";
        $tablas = $this->con->ejecutarConsulta($sql);
        $nombres = array();
        for ($i=0; $i < count($tablas) ; $i++) { 
            array_push($nombres, $tablas[$i]["Tables_in_$nombre"]);
        }
        return $nombres;
    }

 
 
    private function obtenerColumnas($tabla){
        $sql = "DESCRIBE ".$tabla;
        return $this->con->ejecutarConsulta($sql);
    }
}