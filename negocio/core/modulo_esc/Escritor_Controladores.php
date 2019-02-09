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
	
	public function escribirMetodoCrear(){
		return "public function crear{$this->Nombre}(){\n\${$this->nombre} = new {$this->Nombre}();\n{$this->setAtributosCrear}
		\${$this->nombre}Mapper = new {$this->Nombre}Mapper();\nreturn \${$this->nombre}Mapper->crear{$this->Nombre}(\${$this->nombre});\n}\n";
	}

	public function escribirMetodoListar(){
		return "public function listar{$this->Nombre}(){\n\${$this->nombre}Mapper = new {$this->Nombre}Mapper();\nreturn \${$this->nombre}Mapper->listar{$this->Nombre}();\n}\n";
	}

	public function obtenerClase(){
		return "<?php \n class {$this->Nombre}Controller{\n{$this->escribirMetodoListar()} \n {$this->escribirMetodoCrear()} \n}";
	}

	public function getNombre()
	{
		return $this->Nombre;
	}
	
	    function getExtension() {
        return $this->extension;
    }
}