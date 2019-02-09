<?php 
 class TagController{
public function listarTag(){
$tagMapper = new TagMapper();
return $tagMapper->listarTag();
}
 
 public function crearTag(){
$tag = new Tag();
$tag->setTag_id($_POST['tag_id']);
$tag->setTag_nombre($_POST['tag_nombre']);

		$tagMapper = new TagMapper();
return $tagMapper->crearTag($tag);
}
 
}