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
    private $pk;

    function __construct($nombre,$pk) {
        $this->nombre = $nombre;
        $this->extension = ".php";
        $this->pk = $pk;
    }
 
    public function escribir($atributo) {
        $this->escribirMetodoGet($atributo);
        $this->escribirMetodoSet($atributo);
    }

    private function escribirConstructor() {
        return "public function __construct(){\n \$this->NOMBRE = \"$this->nombre\"; \n \$this->COLUMNAS = array(); \n \$this->PK = array('".implode("','",$this->pk)."'); \n }";
    }

    private function escribirMetodoGet($atributo) {
        $this->gets .= "public function get".ucfirst($atributo)."(){ \n return \$this->COLUMNAS['{$atributo}']; \n } \n";
    }

    private function escribirMetodoSet($atributo) {
        $atr = ucfirst($atributo);
        $this->sets .= "public function set{$atr}(\${$atributo}){ \n if(is_null(\${$atributo})) \${$atributo} = 'null'; \n \$this->COLUMNAS['{$atributo}'] = \${$atributo}; \n } \n";
    } 


    public function obtenerClase() {
        $entidad = ucfirst($this->nombre);
        return "<?php \n class {$entidad}{ \n {$this->escribirConstructor()} \n {$this->gets} \n {$this->sets} \n public function set_Meta_Columnas(\$columnas){ \n \$this->COLUMNAS = \$columnas;\n foreach (\$this->PK as \$key => \$value) {\n \$this->PK[\$key] = \$this->COLUMNAS[\$key];\n}\n}\n}\n";
    }

    function getNombre() {
        return $this->nombre;
    }

    function getExtension() {
        return $this->extension;
    }

}
