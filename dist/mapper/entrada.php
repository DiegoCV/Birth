<?php 
 class EntradaMapper extends Mapper{ 
 public function listarEntrada(){ 
 $sql ="SELECT entrada_id, entrada_titulo, entrada_contenido, entrada_enlace, entrada_autor FROM entrada; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new entrada($fila));
}return $results;
 
 
 public function crearEntrada(Entrada $entrada){ 
 $sql = $sql ="SELECT entrada_id, entrada_titulo, entrada_contenido, entrada_enlace, entrada_autor FROM entrada; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
$sentencia->bindParam(3, $atributo);
$sentencia->bindParam(4, $atributo);
$sentencia->bindParam(5, $atributo);
 $entrada_id = $entrada->getEntrada_id();
$entrada_titulo = $entrada->getEntrada_titulo();
$entrada_contenido = $entrada->getEntrada_contenido();
$entrada_enlace = $entrada->getEntrada_enlace();
$entrada_autor = $entrada->getEntrada_autor();
 $sentencia->execute();
 } 
}