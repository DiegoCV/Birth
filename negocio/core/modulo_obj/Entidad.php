<?php
/**
 * 
 */
class Entidad
{
	private $nombre;
	private $atributos;
	private $pk;
	private $fk;
	
	function __construct($nombre,$atributos,$pk)
	{
		$this->nombre = $nombre;
		$this->atributos = $atributos;
		$this->pk = $pk;
	}

	public function getAtributos()
	{
		return $this->atributos;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getPk(){
		return $this->pk;
	}
}