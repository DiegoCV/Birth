<?php

abstract class Mapper {
	public $config = array('localhost:3306','root','Soporte','clases');

    protected $db;

    public function __construct() {
    $pdo = new PDO("mysql:host=" . $this->config[0] . ";dbname=" . $this->config[3],
        $this->config[1], $this->config[2]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->db = $pdo;

    
    }

}
