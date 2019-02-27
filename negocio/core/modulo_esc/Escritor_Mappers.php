<?php
/**
 * 
 */
class Escritor_Mappers
{
	private $nombre;
	//atributos en general
	private $setAtributos = NULL;
	//estructura usada en crear	
	private $bindParam_text;
	//estructura usada para crear
	private $asignacionAtributos;
	private $cantAtributos;
 private $extension;
	function __construct($nombre)
	{ 
		$this->nombre = $nombre;
		$this->cantAtributos = 0;
		 $this->extension = ".php";
	}


	public function escribir($atributo){
		$this->escribirAtributo($atributo);
		$this->escribirBindParam_text($atributo);
		$this->escribirAsignacionAtributos($atributo);
	}

	private function escribirAtributo($atributo){
		if(isset($this->setAtributos)){
			$this->setAtributos .= ", {$atributo}";
		}else{
			$this->setAtributos .= $atributo;
		}
		$this->cantAtributos++;
	}

	private function escribirBindParam_text($atributo){
		$this->bindParam_text .= "\$sentencia->bindParam({$this->cantAtributos}, \$atributo);\n";		
	}

	private function escribirAsignacionAtributos($atributo){
		$this->asignacionAtributos .= "\${$atributo} = \${$this->nombre}->get".ucfirst($atributo)."();\n";
	}

	private function escribirMetodo_Listar(){
		$nombre = ucfirst($this->nombre);
		return "public function listar{$nombre}(){ \n {$this->getQueryListar()} \n {$this->getProcesoListar()} }\n";
	}

	private function getQueryListar(){
		return "\$sql =\"SELECT {$this->setAtributos} FROM {$this->nombre}; \" \n" ;  
	}

	private function getProcesoListar(){
		return "\$results = array(); \n foreach(\$this->db->query(\$sql) as \$fila){ \n array_push(\$results, new {$this->nombre}(\$fila));\n}return \$results;\n" ;  
	}

	private function escribirMetodo_crear(){
		$nombre = ucfirst($this->nombre);
		return "public function insert{$nombre}({$nombre} \${$this->nombre}){ \n 
			\$sentencia = \$this->db->prepare(SqlQuery::getSQLInsertPreparado(\$$nombre));\n
			\$parametros = SqlQuery::getArrayParametros(\$$nombre);\n
			foreach (\$parametros as \$key => &\$val) { \n
				\$sentencia->bindParam(\$key, \$val);\n}\n
			\$sentencia->execute(); 
      		return \$this->db->lastInsertId();\n }";
	}

	private function escribirMetodo_update(){
		$nombre = ucfirst($this->nombre);
		return "public function update{$nombre}({$nombre} \${$this->nombre}){ \n 
			\$sentencia = \$this->db->prepare(SqlQuery::getSQLUpdatePreparado(\$$nombre));\n
			\$parametros = SqlQuery::getArrayParametros(\$$nombre);\n
			foreach (\$parametros as \$key => &\$val) { \n
				\$sentencia->bindParam(\$key, \$val);\n}\n
			\$sentencia->execute(); 
      		return \$this->db->lastInsertId();\n }";
	}

	private function getQueryCrear(){
		return "\$sql =\"INSERT INTO {$this->nombre} ({$this->setAtributos}) VALUES ({$this->getMarcadores()});\" \n ";

	}

	private function getMarcadores(){
		$cant = $this->cantAtributos-1;
		$marcador = '?';
		while($cant > 0){
			$marcador .= ', ?';
			$cant--;
		} 
		 return $marcador;
	}

	public function obtenerClase(){
		$entidad = ucfirst($this->nombre);
		return "<?php \n class {$entidad}Mapper extends Mapper{ \n
		 	{$this->escribirMetodo_Listar()} \n
		  	{$this->escribirMetodo_crear()} \n
		  	{$this->escribirMetodo_update()} \n
		}";
	}

	function getNombre() {
        return $this->nombre;
    }


    function getExtension() {
        return $this->extension;
    }
/*

Esto es para mas adelante, identificar las llaves primarias
$sql = "DELETE FROM movies WHERE filmID =  :filmID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':filmID', $_POST['filmID'], PDO::PARAM_INT);   
$stmt->execute();*/

}