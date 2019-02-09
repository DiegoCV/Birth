<?php 
 class ImagenMapper extends Mapper{ 
 public function listarImagen(){ 
 $sql ="SELECT imagen_id, imagen, imagen_tipo, entrada_entrada_id FROM imagen; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new imagen($fila));
}return $results;
 
 
 public function crearImagen(Imagen $imagen){ 
 $sql = $sql ="SELECT imagen_id, imagen, imagen_tipo, entrada_entrada_id FROM imagen; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
$sentencia->bindParam(3, $atributo);
$sentencia->bindParam(4, $atributo);
 $imagen_id = $imagen->getImagen_id();
$imagen = $imagen->getImagen();
$imagen_tipo = $imagen->getImagen_tipo();
$entrada_entrada_id = $imagen->getEntrada_entrada_id();
 $sentencia->execute();
 } 
}