<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\ejecutor_has_actividad.php';

         class ejecutor_has_actividadMapper extends Mapper{  
  public function listarejecutor_has_actividad() {  

						$sql = "SELECT EJECUTOR_idEJECUTOR, ACTIVIDAD_idACTIVIDAD FROM ejecutor_has_actividad" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new ejecutor_has_actividad($fila)); 

				        } 

				        return $results; 

			    	}    public function crearejecutor_has_actividad(ejecutor_has_actividad $ejecutor_has_actividad) {
$EJECUTOR_idEJECUTOR = $ejecutor_has_actividad->getEJECUTOR_idEJECUTOR(); 
$ACTIVIDAD_idACTIVIDAD = $ejecutor_has_actividad->getACTIVIDAD_idACTIVIDAD(); 
 

        			$sql = "INSERT INTO ejecutor_has_actividad (EJECUTOR_idEJECUTOR,ACTIVIDAD_idACTIVIDAD) VALUES ('$EJECUTOR_idEJECUTOR','$ACTIVIDAD_idACTIVIDAD')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(ejecutor_has_actividad $ejecutor_has_actividad) {
                    $EJECUTOR_idEJECUTOR = $ejecutor_has_actividad->getEJECUTOR_idEJECUTOR();
$ACTIVIDAD_idACTIVIDAD = $ejecutor_has_actividad->getACTIVIDAD_idACTIVIDAD();


                    $sql = "DELETE FROM ejecutor_has_actividad WHERE EJECUTOR_idEJECUTOR = $EJECUTOR_idEJECUTOR AND ACTIVIDAD_idACTIVIDAD = $ACTIVIDAD_idACTIVIDAD ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }