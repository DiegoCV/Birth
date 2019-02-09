<?php 
 class Tag_has_entradaController{
public function listarTag_has_entrada(){
$tag_has_entradaMapper = new Tag_has_entradaMapper();
return $tag_has_entradaMapper->listarTag_has_entrada();
}
 
 public function crearTag_has_entrada(){
$tag_has_entrada = new Tag_has_entrada();
$tag_has_entrada->setTag_tag_id($_POST['tag_tag_id']);
$tag_has_entrada->setEntrada_entrada_id($_POST['entrada_entrada_id']);

		$tag_has_entradaMapper = new Tag_has_entradaMapper();
return $tag_has_entradaMapper->crearTag_has_entrada($tag_has_entrada);
}
 
}