<?php 
  class ejecutor{  
 private $idEJECUTOR ; 
 private $NOMBRE_EJECUTOR ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->idEJECUTOR = $data['idEJECUTOR']; 
$this->NOMBRE_EJECUTOR = $data['NOMBRE_EJECUTOR']; 
 

				        }

    }
public function setidEJECUTOR($idEJECUTOR){ 
 $this->idEJECUTOR = $idEJECUTOR; 
 return $this; 
}
public function setNOMBRE_EJECUTOR($NOMBRE_EJECUTOR){ 
 $this->NOMBRE_EJECUTOR = $NOMBRE_EJECUTOR; 
 return $this; 
}
public function getidEJECUTOR(){ 
 return $this->idEJECUTOR; 
}
public function getNOMBRE_EJECUTOR(){ 
 return $this->NOMBRE_EJECUTOR; 
}
}