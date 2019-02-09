<?php
/**
 * 
 */
class Entidad
{
	private $nombre;
	private $atributos;
	function __construct($nombre,$atributos)
	{
		$this->nombre = $nombre;
		$this->atributos = $atributos;
	}

	public function getAtributos()
	{
		return $this->atributos;
	}

	public function getNombre(){
		return $this->nombre;
	}
}