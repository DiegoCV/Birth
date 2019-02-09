<?php 
 class Entrada{ 
 private $entrada_id; 
private $entrada_titulo; 
private $entrada_contenido; 
private $entrada_enlace; 
private $entrada_autor; 
 
 public function getEntrada_id(){ 
 return $this->entrada_id; 
 } 
public function getEntrada_titulo(){ 
 return $this->entrada_titulo; 
 } 
public function getEntrada_contenido(){ 
 return $this->entrada_contenido; 
 } 
public function getEntrada_enlace(){ 
 return $this->entrada_enlace; 
 } 
public function getEntrada_autor(){ 
 return $this->entrada_autor; 
 } 
 
 public function setEntrada_id($Entrada_id){ 
 $this->Entrada_id = $Entrada_id; 
 } 
public function setEntrada_titulo($Entrada_titulo){ 
 $this->Entrada_titulo = $Entrada_titulo; 
 } 
public function setEntrada_contenido($Entrada_contenido){ 
 $this->Entrada_contenido = $Entrada_contenido; 
 } 
public function setEntrada_enlace($Entrada_enlace){ 
 $this->Entrada_enlace = $Entrada_enlace; 
 } 
public function setEntrada_autor($Entrada_autor){ 
 $this->Entrada_autor = $Entrada_autor; 
 } 
 
} 
