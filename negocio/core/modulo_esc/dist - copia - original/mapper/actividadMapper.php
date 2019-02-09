<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\actividad.php';

         class actividadMapper extends Mapper{  
  public function listaractividad() {  

						$sql = "SELECT idACTIVIDAD, FECHACREACION_ACTIVIDAD, CLIENTE_idCLIENTE, ASUNTO_ACTIVIDAD, DESCRIPCION_ACTIVIDAD FROM actividad" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new actividad($fila)); 

				        } 

				        return $results; 

			    	}    public function crearactividad(actividad $actividad) {
$idACTIVIDAD = $actividad->getidACTIVIDAD(); 
$FECHACREACION_ACTIVIDAD = $actividad->getFECHACREACION_ACTIVIDAD(); 
$CLIENTE_idCLIENTE = $actividad->getCLIENTE_idCLIENTE(); 
$ASUNTO_ACTIVIDAD = $actividad->getASUNTO_ACTIVIDAD(); 
$DESCRIPCION_ACTIVIDAD = $actividad->getDESCRIPCION_ACTIVIDAD(); 
 

        			$sql = "INSERT INTO actividad (idACTIVIDAD,FECHACREACION_ACTIVIDAD,CLIENTE_idCLIENTE,ASUNTO_ACTIVIDAD,DESCRIPCION_ACTIVIDAD) VALUES ('$idACTIVIDAD','$FECHACREACION_ACTIVIDAD','$CLIENTE_idCLIENTE','$ASUNTO_ACTIVIDAD','$DESCRIPCION_ACTIVIDAD')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(actividad $actividad) {
                    $idACTIVIDAD = $actividad->getidACTIVIDAD();


                    $sql = "DELETE FROM actividad WHERE idACTIVIDAD = $idACTIVIDAD ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }