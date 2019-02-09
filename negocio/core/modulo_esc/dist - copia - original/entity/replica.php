<?php 
  class replica{  
 private $idREPLICA ; 
 private $DESCRIPCION_REPLICA ; 
 private $ACTIVIDAD_idACTIVIDAD ; 
  public function __construct(array $data = null) { 
 if (!is_null($data)) { 

				            if (array_key_exists('id', $data)) { 

				                 

				            }

				            $this->idREPLICA = $data['idREPLICA']; 
$this->DESCRIPCION_REPLICA = $data['DESCRIPCION_REPLICA']; 
$this->ACTIVIDAD_idACTIVIDAD = $data['ACTIVIDAD_idACTIVIDAD']; 
 

				        }

    }
public function setidREPLICA($idREPLICA){ 
 $this->idREPLICA = $idREPLICA; 
 return $this; 
}
public function setDESCRIPCION_REPLICA($DESCRIPCION_REPLICA){ 
 $this->DESCRIPCION_REPLICA = $DESCRIPCION_REPLICA; 
 return $this; 
}
public function setACTIVIDAD_idACTIVIDAD($ACTIVIDAD_idACTIVIDAD){ 
 $this->ACTIVIDAD_idACTIVIDAD = $ACTIVIDAD_idACTIVIDAD; 
 return $this; 
}
public function getidREPLICA(){ 
 return $this->idREPLICA; 
}
public function getDESCRIPCION_REPLICA(){ 
 return $this->DESCRIPCION_REPLICA; 
}
public function getACTIVIDAD_idACTIVIDAD(){ 
 return $this->ACTIVIDAD_idACTIVIDAD; 
}
}