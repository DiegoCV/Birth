<?php

class Escritor_Proxy {

    private $nombre;
    private $extension;

    function __construct($nombre) {
        $this->nombre = $nombre;
        $this->extension = ".php";
    }

    public function escribirProxyInsert(){
        return $this->obtenerClase($this->escribirProxy("insert",$this->nombre));
    }

    public function escribirProxyUpdate(){
        return $this->obtenerClase($this->escribirProxy("update",$this->nombre));
    }

    private function escribirProxy($tipo,$nombre){
        return "\$array_$nombre = \$_POST['{$nombre}']; \n \$$nombre = new ".ucfirst($nombre)."(); \n \$".$nombre."->set_Meta_Columnas(\$array_$nombre); \n echo ".ucfirst($nombre)."Controler::$tipo($$nombre);";
    }

    public function obtenerClase($contenido) {
        return "<?php \n include_once realpath('../../controler/".ucfirst($this->nombre)."Controler.php'); \n require_once realpath('../../entity/".ucfirst($this->nombre).".php'); \n $contenido\n ?>";
    }
 function getNombre() {
        return $this->nombre;
    }


    function getExtension() {
        return $this->extension;
    }
}
