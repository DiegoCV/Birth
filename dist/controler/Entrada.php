<?php 
 class EntradaController{
public function listarEntrada(){
$entradaMapper = new EntradaMapper();
return $entradaMapper->listarEntrada();
}
 
 public function crearEntrada(){
$entrada = new Entrada();
$entrada->setEntrada_id($_POST['entrada_id']);
$entrada->setEntrada_titulo($_POST['entrada_titulo']);
$entrada->setEntrada_contenido($_POST['entrada_contenido']);
$entrada->setEntrada_enlace($_POST['entrada_enlace']);
$entrada->setEntrada_autor($_POST['entrada_autor']);

		$entradaMapper = new EntradaMapper();
return $entradaMapper->crearEntrada($entrada);
}
 
}