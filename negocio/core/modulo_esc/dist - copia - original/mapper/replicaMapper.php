<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\replica.php';

         class replicaMapper extends Mapper{  
  public function listarreplica() {  

						$sql = "SELECT idREPLICA, DESCRIPCION_REPLICA, ACTIVIDAD_idACTIVIDAD FROM replica" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new replica($fila)); 

				        } 

				        return $results; 

			    	}    public function crearreplica(replica $replica) {
$idREPLICA = $replica->getidREPLICA(); 
$DESCRIPCION_REPLICA = $replica->getDESCRIPCION_REPLICA(); 
$ACTIVIDAD_idACTIVIDAD = $replica->getACTIVIDAD_idACTIVIDAD(); 
 

        			$sql = "INSERT INTO replica (idREPLICA,DESCRIPCION_REPLICA,ACTIVIDAD_idACTIVIDAD) VALUES ('$idREPLICA','$DESCRIPCION_REPLICA','$ACTIVIDAD_idACTIVIDAD')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(replica $replica) {
                    $idREPLICA = $replica->getidREPLICA();


                    $sql = "DELETE FROM replica WHERE idREPLICA = $idREPLICA ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }