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
            "mapper" => dirname(__FILE__,4)."/dist/mapper/",
            "proxy" => dirname(__FILE__,4)."/dist/proxy/"
        ];
    }

    private function transcribir($objeto,$ruta){
        $this->file->escribirFile(
            $this->ruta[$ruta].$objeto->getNombre()."/",
            $objeto->getNombre(),
            $objeto->getExtension(),
            $objeto->getContenido()
        );
    }

    public function copiarMapper(){
        copy("C:\\xampp\htdocs\birth\\negocio\core\modulo_file\Mapper.php",
            "C:\\xampp\htdocs\birth\dist\mapper\Mapper.php");
    }


      public function transcribirProxy($proxy) {
        $this->file->escribirFile(
            $this->ruta["proxy"].$proxy->getNombre()."/",
            $proxy->getNombre()."Insert",
            $proxy->getExtension(),
            $proxy->escribirProxyInsert()
        );

        //Escribir Update
        $this->file->escribirFile(
            $this->ruta["proxy"].$proxy->getNombre()."/",
            $proxy->getNombre()."Update",
            $proxy->getExtension(),
            $proxy->escribirProxyUpdate()
        );
    }

    public function transcribirControlador($controlador) {
        $this->file->escribirFile(
            $this->ruta["controlador"],
            $controlador->getNombre()."Controler",
            $controlador->getExtension(),
            $controlador->getContenido()
        );
    }

    public function transcribirEntidad($entidad) {
        $this->file->escribirFile(
            $this->ruta["entidad"],
            $entidad->getNombre(),
            $entidad->getExtension(),
            $entidad->obtenerClase()
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
