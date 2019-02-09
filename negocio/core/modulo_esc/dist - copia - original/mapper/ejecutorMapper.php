<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\ejecutor.php';

         class ejecutorMapper extends Mapper{  
  public function listarejecutor() {  

						$sql = "SELECT idEJECUTOR, NOMBRE_EJECUTOR FROM ejecutor" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new ejecutor($fila)); 

				        } 

				        return $results; 

			    	}    public function crearejecutor(ejecutor $ejecutor) {
$idEJECUTOR = $ejecutor->getidEJECUTOR(); 
$NOMBRE_EJECUTOR = $ejecutor->getNOMBRE_EJECUTOR(); 
 

        			$sql = "INSERT INTO ejecutor (idEJECUTOR,NOMBRE_EJECUTOR) VALUES ('$idEJECUTOR','$NOMBRE_EJECUTOR')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(ejecutor $ejecutor) {
                    $idEJECUTOR = $ejecutor->getidEJECUTOR();


                    $sql = "DELETE FROM ejecutor WHERE idEJECUTOR = $idEJECUTOR ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }