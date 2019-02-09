<?php
/**
* Esta se encarga de crear la estructura basica sobre la que estara el codigo
*/
class Carpeta 
{
	private $raiz = "dist";
	private $estructura = array(
		'/controller',
		'/core',
		'/entity',
		'/mapper',
		'/vista',
		'/vista/formulario',
		'/vista/formuEliminar',
		'/vista/js',
		'/vista/listados'
	);	

	function __construct(){
		$this->crearCarpeta($this->raiz);
		foreach ($this->estructura as $key => $value) {
			$this->crearCarpeta($this->raiz.$value);
		}	
	}


	private function crearCarpeta($carpeta){
		if (!file_exists($carpeta)) {
		    mkdir($carpeta,0777);
		}
	}

}