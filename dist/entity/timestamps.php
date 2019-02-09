<?php 
 class Timestamps{ 
 private $entrada_entrada_id; 
private $create_time; 
private $update_time; 
 
 public function getEntrada_entrada_id(){ 
 return $this->entrada_entrada_id; 
 } 
public function getCreate_time(){ 
 return $this->create_time; 
 } 
public function getUpdate_time(){ 
 return $this->update_time; 
 } 
 
 public function setEntrada_entrada_id($Entrada_entrada_id){ 
 $this->Entrada_entrada_id = $Entrada_entrada_id; 
 } 
public function setCreate_time($Create_time){ 
 $this->Create_time = $Create_time; 
 } 
public function setUpdate_time($Update_time){ 
 $this->Update_time = $Update_time; 
 } 
 
} 
