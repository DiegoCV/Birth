<?php
/**
 * 
 */
class Escritor_Controladores 
{
	private $nombre;
	private $Nombre;
	private $extension;
	//atributos en general
	private $setAtributosCrear = NULL;

	function __construct($nombre)
	{
		$this->nombre = $nombre;
		$this->Nombre = ucfirst($nombre);
		$this->extension = ".php";
	}

	public function escribir($atributo){
		$this->escribirAtributo($atributo); 
	}

	private function escribirAtributo($atributo){

		$this->setAtributosCrear .= "\${$this->nombre}->set".ucfirst($atributo)."(\$_POST['{$atributo}']);\n";
	}

    private function escribirControlador($tipo,$nombre){
        return "public function $tipo(\$$nombre){\n\${$nombre}Mapper = new ".ucfirst($nombre)."Mapper();\nreturn \$$nombre"."Mapper->$tipo(\$$nombre);\n}\n";
    }

    public function obtenerClase($contenido) {
        return "<?php \n include_once realpath('../mapper/".ucfirst($this->nombre)."Mapper.php'); \n 
        class ".$this->nombre."Controller{ \n $contenido\n }?>";
    }

    public function getContenido() {
        $contenido = $this->escribirControlador("insert",$this->nombre);
        $contenido .= $this->escribirControlador("update",$this->nombre);
        return $this->obtenerClase($contenido);
    }


	public function getNombre()
	{
		return $this->Nombre;
	} 
	
	    function getExtension() {
        return $this->extension;
    }
}