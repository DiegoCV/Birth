<?php
/**
* Clase para la persistencia de los datos
*/
class DataBase {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $bdd;
    private static $instancia;


    public function __construct($nombreBD)
    {
        $ini_array = parse_ini_file('config.ini');
        $this->host = $ini_array['host'];
        $this->username = $ini_array['username'];
        $this->password = $ini_array['password'];      
          $this->dbname = $nombreBD;
        $this->obtenerConector();
    }
 
    private function obtenerConector(){
        try{
            $this->bdd = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8",$this->username,$this->password);
        }catch(Exception $e){
            die('Error : '.$e->getMessage());
        }
    }


    public function obtenerConexion()
    {
        return $this->bdd;
    }

    public function setNombreBD($nombreBD){
        $this->dbname = $nombreBD;
    }

     // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

     public function ejecutarConsulta($sql){
        //Inicializa el punto de conexion
        $conn = $this->bdd;
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Primero prepara la sentencia y eso es lo que ejecuta
        $sentencia=$conn->prepare($sql);
        $sentencia->execute(); 
        $data = $sentencia->fetchAll();
        $sentencia = null;
        $conn = null;
        return $data;
    }

}

?>