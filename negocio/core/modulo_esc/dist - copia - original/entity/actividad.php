<?php 
  class actividad{  
 private $idACTIVIDAD ; 
 private $FECHACREACION_ACTIVIDAD ; 
 private $CLIENTE_idCLIENTE ; 
 private $ASUNTO_ACTIVIDAD ; 
 private $DESCRIPCION_ACTIVIDAD ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->idACTIVIDAD = $data['idACTIVIDAD']; 
$this->FECHACREACION_ACTIVIDAD = $data['FECHACREACION_ACTIVIDAD']; 
$this->CLIENTE_idCLIENTE = $data['CLIENTE_idCLIENTE']; 
$this->ASUNTO_ACTIVIDAD = $data['ASUNTO_ACTIVIDAD']; 
$this->DESCRIPCION_ACTIVIDAD = $data['DESCRIPCION_ACTIVIDAD']; 
 

				        }

    }
public function setidACTIVIDAD($idACTIVIDAD){ 
 $this->idACTIVIDAD = $idACTIVIDAD; 
 return $this; 
}
public function setFECHACREACION_ACTIVIDAD($FECHACREACION_ACTIVIDAD){ 
 $this->FECHACREACION_ACTIVIDAD = $FECHACREACION_ACTIVIDAD; 
 return $this; 
}
public function setCLIENTE_idCLIENTE($CLIENTE_idCLIENTE){ 
 $this->CLIENTE_idCLIENTE = $CLIENTE_idCLIENTE; 
 return $this; 
}
public function setASUNTO_ACTIVIDAD($ASUNTO_ACTIVIDAD){ 
 $this->ASUNTO_ACTIVIDAD = $ASUNTO_ACTIVIDAD; 
 return $this; 
}
public function setDESCRIPCION_ACTIVIDAD($DESCRIPCION_ACTIVIDAD){ 
 $this->DESCRIPCION_ACTIVIDAD = $DESCRIPCION_ACTIVIDAD; 
 return $this; 
}
public function getidACTIVIDAD(){ 
 return $this->idACTIVIDAD; 
}
public function getFECHACREACION_ACTIVIDAD(){ 
 return $this->FECHACREACION_ACTIVIDAD; 
}
public function getCLIENTE_idCLIENTE(){ 
 return $this->CLIENTE_idCLIENTE; 
}
public function getASUNTO_ACTIVIDAD(){ 
 return $this->ASUNTO_ACTIVIDAD; 
}
public function getDESCRIPCION_ACTIVIDAD(){ 
 return $this->DESCRIPCION_ACTIVIDAD; 
}
}