<?php 
 class Comentario{ 
 private $comentario_id; 
private $comentario_autor; 
private $comentario_email; 
private $comentario_contenido; 
private $comentario_create_date; 
private $entrada_entrada_id; 
private $comentario_padre; 
 
 public function getComentario_id(){ 
 return $this->comentario_id; 
 } 
public function getComentario_autor(){ 
 return $this->comentario_autor; 
 } 
public function getComentario_email(){ 
 return $this->comentario_email; 
 } 
public function getComentario_contenido(){ 
 return $this->comentario_contenido; 
 } 
public function getComentario_create_date(){ 
 return $this->comentario_create_date; 
 } 
public function getEntrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
 } 
public function getComentario_padre(){ 
 return $this->comentario_padre; 
 } 
 
 public function setComentario_id($Comentario_id){ 
 $this->Comentario_id = $Comentario_id; 
 } 
public function setComentario_autor($Comentario_autor){ 
 $this->Comentario_autor = $Comentario_autor; 
 } 
public function setComentario_email($Comentario_email){ 
 $this->Comentario_email = $Comentario_email; 
 } 
public function setComentario_contenido($Comentario_contenido){ 
 $this->Comentario_contenido = $Comentario_contenido; 
 } 
public function setComentario_create_date($Comentario_create_date){ 
 $this->Comentario_create_date = $Comentario_create_date; 
 } 
public function setEntrada_entrada_id($Entrada_entrada_id){ 
 $this->Entrada_entrada_id = $Entrada_entrada_id; 
 } 
public function setComentario_padre($Comentario_padre){ 
 $this->Comentario_padre = $Comentario_padre; 
 } 
 
} 
