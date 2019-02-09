<?php 
 class Tag_has_entradaMapper extends Mapper{ 
 public function listarTag_has_entrada(){ 
 $sql ="SELECT tag_tag_id, entrada_entrada_id FROM tag_has_entrada; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new tag_has_entrada($fila));
}return $results;
 
 
 public function crearTag_has_entrada(Tag_has_entrada $tag_has_entrada){ 
 $sql = $sql ="SELECT tag_tag_id, entrada_entrada_id FROM tag_has_entrada; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
 $tag_tag_id = $tag_has_entrada->getTag_tag_id();
$entrada_entrada_id = $tag_has_entrada->getEntrada_entrada_id();
 $sentencia->execute();
 } 
}