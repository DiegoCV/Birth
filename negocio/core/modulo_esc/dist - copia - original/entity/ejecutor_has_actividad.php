<?php 
  class ejecutor_has_actividad{  
 private $EJECUTOR_idEJECUTOR ; 
 private $ACTIVIDAD_idACTIVIDAD ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->EJECUTOR_idEJECUTOR = $data['EJECUTOR_idEJECUTOR']; 
$this->ACTIVIDAD_idACTIVIDAD = $data['ACTIVIDAD_idACTIVIDAD']; 
 

				        }

    }
public function setEJECUTOR_idEJECUTOR($EJECUTOR_idEJECUTOR){ 
 $this->EJECUTOR_idEJECUTOR = $EJECUTOR_idEJECUTOR; 
 return $this; 
}
public function setACTIVIDAD_idACTIVIDAD($ACTIVIDAD_idACTIVIDAD){ 
 $this->ACTIVIDAD_idACTIVIDAD = $ACTIVIDAD_idACTIVIDAD; 
 return $this; 
}
public function getEJECUTOR_idEJECUTOR(){ 
 return $this->EJECUTOR_idEJECUTOR; 
}
public function getACTIVIDAD_idACTIVIDAD(){ 
 return $this->ACTIVIDAD_idACTIVIDAD; 
}
}