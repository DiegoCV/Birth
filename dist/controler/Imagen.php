<?php 
 class ImagenController{
public function listarImagen(){
$imagenMapper = new ImagenMapper();
return $imagenMapper->listarImagen();
}
 
 public function crearImagen(){
$imagen = new Imagen();
$imagen->setImagen_id($_POST['imagen_id']);
$imagen->setImagen($_POST['imagen']);
$imagen->setImagen_tipo($_POST['imagen_tipo']);
$imagen->setEntrada_entrada_id($_POST['entrada_entrada_id']);

		$imagenMapper = new ImagenMapper();
return $imagenMapper->crearImagen($imagen);
}
 
}