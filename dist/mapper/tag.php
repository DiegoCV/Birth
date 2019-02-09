<?php 
 class TagMapper extends Mapper{ 
 public function listarTag(){ 
 $sql ="SELECT tag_id, tag_nombre FROM tag; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new tag($fila));
}return $results;
 
 
 public function crearTag(Tag $tag){ 
 $sql = $sql ="SELECT tag_id, tag_nombre FROM tag; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
 $tag_id = $tag->getTag_id();
$tag_nombre = $tag->getTag_nombre();
 $sentencia->execute();
 } 
}