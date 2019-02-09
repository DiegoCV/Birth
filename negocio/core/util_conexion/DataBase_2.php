<?php
/**
* Clase para la persistencia de los datos
*/
class DataBase_2 {

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $bdd;
    private static $instancia;


    function __construct()
    {
        $ini_array = parse_ini_file('config.ini');
        $this->host = $ini_array['host'];
        $this->username = $ini_array['username'];
        $this->password = $ini_array['password'];
        $this->obtenerConector();
    }
 
    private function obtenerConector(){
        try{
            $this->bdd = new PDO("mysql:host=$this->host;",$this->username,$this->password);
        }catch(Exception $e){
            die('Error : '.$e->getMessage());
        }
    }

    public function obtenerConexion()
    {
        return $this->bdd;
    }

     // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

}

?>