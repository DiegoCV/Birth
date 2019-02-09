<?php 
  class cliente{  
 private $idCLIENTE ; 
 private $NOMBRE_CLIENTE ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->idCLIENTE = $data['idCLIENTE']; 
$this->NOMBRE_CLIENTE = $data['NOMBRE_CLIENTE']; 
 

				        }

    }
public function setidCLIENTE($idCLIENTE){ 
 $this->idCLIENTE = $idCLIENTE; 
 return $this; 
}
public function setNOMBRE_CLIENTE($NOMBRE_CLIENTE){ 
 $this->NOMBRE_CLIENTE = $NOMBRE_CLIENTE; 
 return $this; 
}
public function getidCLIENTE(){ 
 return $this->idCLIENTE; 
}
public function getNOMBRE_CLIENTE(){ 
 return $this->NOMBRE_CLIENTE; 
}
}