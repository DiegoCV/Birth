<?php
include_once '../negocio/servicios/Servicios.php';
/**
 * 
 */
class Proxy 
{
	public function subir($file)
	{	
	$nombre = $file['name']; 
	$nombre = strtolower($nombre);
	$tipo_archivo = $file['type']; 
	$tamano_archivo = $file['size']; 
	$dir_subida = '../tmp/';
	$fichero_subido = $dir_subida . $nombre; 
	move_uploaded_file($file['tmp_name'], $fichero_subido);	
	$this->crearSesion($nombre); 
	return file_exists ( $fichero_subido );
	} 

	public function descargarProyecto($sesion)
	{
		$servicios = new Servicios();
		$servicios->cargarSql($sesion);
		$servicios->descargarProyecto($sesion);

	}

	private function crearSesion($value){
		session_start();
  		$_SESSION['base'] = $this->getBase($value);
	}

	private function getBase($value){
		return substr($value,0,count($value)-5);
	}

}



