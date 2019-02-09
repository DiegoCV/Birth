<?php 
 class TimestampsMapper extends Mapper{ 
 public function listarTimestamps(){ 
 $sql ="SELECT entrada_entrada_id, create_time, update_time FROM timestamps; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new timestamps($fila));
}return $results;
 
 
 public function crearTimestamps(Timestamps $timestamps){ 
 $sql = $sql ="SELECT entrada_entrada_id, create_time, update_time FROM timestamps; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
$sentencia->bindParam(3, $atributo);
 $entrada_entrada_id = $timestamps->getEntrada_entrada_id();
$create_time = $timestamps->getCreate_time();
$update_time = $timestamps->getUpdate_time();
 $sentencia->execute();
 } 
}