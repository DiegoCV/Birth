<?php 

            include_once dirname(__FILE__) . '\Mapper.php';

            include_once substr(getcwd(), 0,26).'\entity\cliente.php';

         class clienteMapper extends Mapper{  
  public function listarcliente() {  

						$sql = "SELECT idCLIENTE, NOMBRE_CLIENTE FROM cliente" ;  
				        
				        $results = array();  

				        foreach ($this->db->query($sql) as $fila) { 

				            array_push($results, new cliente($fila)); 

				        } 

				        return $results; 

			    	}    public function crearcliente(cliente $cliente) {
$idCLIENTE = $cliente->getidCLIENTE(); 
$NOMBRE_CLIENTE = $cliente->getNOMBRE_CLIENTE(); 
 

        			$sql = "INSERT INTO cliente (idCLIENTE,NOMBRE_CLIENTE) VALUES ('$idCLIENTE','$NOMBRE_CLIENTE')"; 

        			$stmt   = $this->db->prepare($sql);

    				$result = $stmt->execute();

					    if (!$result) {

					        throw new Exception("couldnotsaverecord");

					    } else {

					        echo "GUARDADOBIEN";

					    }

					}
public function eliminar(cliente $cliente) {
                    $idCLIENTE = $cliente->getidCLIENTE();


                    $sql = "DELETE FROM cliente WHERE idCLIENTE = $idCLIENTE ";
                    $stmt = $this->db->prepare($sql);
                    $result = $stmt->execute();
                    if (!$result) {
                        throw new Exception("No se pudo eliminar");
                    } else {
                        echo "eliminado con exito";
                    }
                }
            }