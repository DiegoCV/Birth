<?php

/**
 * 
 */
class Escritor_Entidades {

    private $nombre;
    private $atributos;
    private $gets;
    private $sets;
    private $extension;

    function __construct($nombre) {
        $this->nombre = $nombre;
        $this->extension = ".php";
    }
 
    public function escribir($atributo) {
        $this->escribirAtributo($atributo);
        $this->escribirMetodoGet($atributo);
        $this->escribirMetodoSet($atributo);
    }

    private function escribirAtributo($atributo) {
        $this->atributos .= "private \${$atributo}; \n";
    }

    private function escribirMetodoGet($atributo) {
        $this->gets .= "public function get".ucfirst($atributo)."(){ \n return \$this->{$atributo}; \n } \n";
    }

    private function escribirMetodoSet($atributo) {
        $atributo = ucfirst($atributo);
        $this->sets .= "public function set{$atributo}(\${$atributo}){ \n \$this->{$atributo} = \${$atributo}; \n } \n";
    }

    public function obtenerClase() {
        $entidad = ucfirst($this->nombre);
        return "<?php \n class {$entidad}{ \n {$this->atributos} \n {$this->gets} \n {$this->sets} \n} \n";
    }

    function getNombre() {
        return $this->nombre;
    }

    function getExtension() {
        return $this->extension;
    }

}
