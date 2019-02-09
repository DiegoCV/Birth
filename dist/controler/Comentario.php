<?php 
 class ComentarioController{
public function listarComentario(){
$comentarioMapper = new ComentarioMapper();
return $comentarioMapper->listarComentario();
}
 
 public function crearComentario(){
$comentario = new Comentario();
$comentario->setComentario_id($_POST['comentario_id']);
$comentario->setComentario_autor($_POST['comentario_autor']);
$comentario->setComentario_email($_POST['comentario_email']);
$comentario->setComentario_contenido($_POST['comentario_contenido']);
$comentario->setComentario_create_date($_POST['comentario_create_date']);
$comentario->setEntrada_entrada_id($_POST['entrada_entrada_id']);
$comentario->setComentario_padre($_POST['comentario_padre']);

		$comentarioMapper = new ComentarioMapper();
return $comentarioMapper->crearComentario($comentario);
}
 
}