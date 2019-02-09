<?php
include_once('IServicios.php');
include_once('../negocio/core/modulo_bd/Elevador.php');
include_once('../negocio/core/modulo_obj/Extractor.php');
include_once('../negocio/core/modulo_esc/Escritor.php');
include_once('../negocio/core/modulo_file/Secretario.php');
include_once('../negocio/core/modulo_comp/Compresor.php');

/**
 *  
 */
class Servicios implements IServicios
{
	private static $instancia;

	public function cargarSql($sql){
		$elevador = new Elevador($sql);
		$elevador->subirBD();
	}

	public function descargarProyecto($nombre){
		$extractor = new Extractor($nombre);
		$escritor = new Escritor($extractor->obtenerEntidades());
        $secretario = new Secretario(); 
		//Construyo entidades
        foreach ($escritor->getSetEntidades() as $entidad) {
            $secretario->transcribirEntidad($entidad);
        }                        
		//Construyo controladores
        foreach ($escritor->getSetControladores() as $controlador) {
            $secretario->transcribirControlador($controlador);
        }  
		//Contruyo mappers
        foreach ($escritor->getSetMappers() as $mapper) {
            $secretario->transcribirMapper($mapper);
        } 
        $ruta = dirname(__FILE__,3)."/dist/";
        $comp = new Compresor();
        $comp->comprimir($ruta,dirname(__FILE__,3),"dist.zip");
       /** header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename=dist.zip");
        // leemos el archivo creado
        readfile(dirname(__FILE__,3)."/dist.zip");
        // Por último eliminamos el archivo temporal creado
        unlink('dist.zip');//Destruye el archivo temporal*/
	}

	 public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        } 
        return self::$instancia;
    }
}