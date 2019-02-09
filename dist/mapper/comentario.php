<?php 
 class ComentarioMapper extends Mapper{ 
 public function listarComentario(){ 
 $sql ="SELECT comentario_id, comentario_autor, comentario_email, comentario_contenido, comentario_create_date, entrada_entrada_id, comentario_padre FROM comentario; " 
 
 $results = array(); 
 foreach($this->db->query($sql) as $fila){ 
 array_push($results, new comentario($fila));
}return $results;
 
 
 public function crearComentario(Comentario $comentario){ 
 $sql = $sql ="SELECT comentario_id, comentario_autor, comentario_email, comentario_contenido, comentario_create_date, entrada_entrada_id, comentario_padre FROM comentario; " 
; 
 $sentencia = $this->db->prepare($sql); 
 $sentencia->bindParam(1, $atributo);
$sentencia->bindParam(2, $atributo);
$sentencia->bindParam(3, $atributo);
$sentencia->bindParam(4, $atributo);
$sentencia->bindParam(5, $atributo);
$sentencia->bindParam(6, $atributo);
$sentencia->bindParam(7, $atributo);
 $comentario_id = $comentario->getComentario_id();
$comentario_autor = $comentario->getComentario_autor();
$comentario_email = $comentario->getComentario_email();
$comentario_contenido = $comentario->getComentario_contenido();
$comentario_create_date = $comentario->getComentario_create_date();
$entrada_entrada_id = $comentario->getEntrada_entrada_id();
$comentario_padre = $comentario->getComentario_padre();
 $sentencia->execute();
 } 
}