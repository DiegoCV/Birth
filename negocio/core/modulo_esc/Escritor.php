<?php

include_once 'Escritor_Entidades.php';
include_once 'Escritor_Mappers.php';
include_once 'Escritor_Controladores.php';
include_once 'Escritor_Proxy.php';

/**
 * 
 */
class Escritor {

    private $entidades;
    private $setEntidades;
    private $setMappers;
    private $setControladores;

    function __construct($entidades) {
        $this->entidades = $entidades;
        $this->setEntidades = array();
        $this->setMappers = array();
        $this->setControladores = array();
         $this->setProxys = array();
        $this->escribir();
    }

    private function escribir() {
        foreach ($this->entidades as $key => $entidad) {
            
            $escritor_Entidades = new Escritor_Entidades($entidad->getNombre(),$entidad->getPk());

            $escritor_Mappers = new Escritor_Mappers($entidad->getNombre());

            $escritor_Controladores = new Escritor_Controladores($entidad->getNombre());

            $escritor_Proxy = new Escritor_Proxy($entidad->getNombre());
            
            foreach ($entidad->getAtributos() as $key => $atributo) {
                //Escribo las entidades
                $escritor_Entidades->escribir($atributo);
                //Escribo los mapper
                $escritor_Mappers->escribir($atributo);
                //Escribo los controladores
               $escritor_Controladores->escribir($atributo); 
            }
            //Entidades
            array_push($this->setEntidades, $escritor_Entidades);
            //mappers
           array_push($this->setMappers, $escritor_Mappers);
            //Controladores
           array_push($this->setControladores, $escritor_Controladores);
           //Proxys
           array_push($this->setProxys, $escritor_Proxy);
        }
    }



    public function getSetEntidades() {
        return $this->setEntidades;
    }

    public function getSetMappers() {
        return $this->setMappers;
    }

    public function getSetControladores() {
        return $this->setControladores;
    }

     public function getSetProxys() {
        return $this->setProxys;
    }

}
