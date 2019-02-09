<?php 
 class UserMapper extends Mapper{ 
 public function listarUser(){ 
 $sql ="SELECT username, email, password, create_time FROM user; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new user($fila));
}return $results;
 
 
 public function crearUser(User $user){ 
 $sql = $sql ="SELECT username, email, password, create_time FROM user; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
$sentencia->bindParam(3, $atributo);
$sentencia->bindParam(4, $atributo);
 $username = $user->getUsername();
$email = $user->getEmail();
$password = $user->getPassword();
$create_time = $user->getCreate_time();
 $sentencia->execute();
 } 
}