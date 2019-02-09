<?php 
 class Imagen{ 
 private $imagen_id; 
private $imagen; 
private $imagen_tipo; 
private $entrada_entrada_id; 
 
 public function getImagen_id(){ 
 return $this->imagen_id; 
 } 
public function getImagen(){ 
 return $this->imagen; 
 } 
public function getImagen_tipo(){ 
 return $this->imagen_tipo; 
 } 
public function getEntrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
 } 
 
 public function setImagen_id($Imagen_id){ 
 $this->Imagen_id = $Imagen_id; 
 } 
public function setImagen($Imagen){ 
 $this->Imagen = $Imagen; 
 } 
public function setImagen_tipo($Imagen_tipo){ 
 $this->Imagen_tipo = $Imagen_tipo; 
 } 
public function setEntrada_entrada_id($Entrada_entrada_id){ 
 $this->Entrada_entrada_id = $Entrada_entrada_id; 
 } 
 
} 
