<?php
include_once 'File.php';

/**
 * Description of Secretario
 *
 * @author DiegoCarrascal
 */
class Secretario {
    
    private $file;
    private $ruta;
    
    function __construct() {
        $this->file = new File();
        $this->ruta = [
        	"entidad"=>dirname(__FILE__,4)."/dist/entity/",
        	"controlador" =>dirname(__FILE__,4)."/dist/controler/",
            "mapper" => dirname(__FILE__,4)."/dist/mapper/"
        ];
    }

    
    public function transcribirEntidad($entidad) {
        $this->file->escribirFile(
        	$this->ruta["entidad"],
        	$entidad->getNombre(),
        	$entidad->getExtension(),
        	$entidad->obtenerClase()
        );
    }

      public function transcribirControlador($controlador) {
        $this->file->escribirFile(
            $this->ruta["controlador"],
            $controlador->getNombre(),
            $controlador->getExtension(),
            $controlador->obtenerClase()
        );
    }

     public function transcribirMapper($mapper) {
        $this->file->escribirFile(
            $this->ruta["mapper"],
            $mapper->getNombre(),
            $mapper->getExtension(),
            $mapper->obtenerClase()
        );
    }
}
