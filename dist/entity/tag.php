<?php 
 class Tag{ 
 private $tag_id; 
private $tag_nombre; 
 
 public function getTag_id(){ 
 return $this->tag_id; 
 } 
public function getTag_nombre(){ 
 return $this->tag_nombre; 
 } 
 
 public function setTag_id($Tag_id){ 
 $this->Tag_id = $Tag_id; 
 } 
public function setTag_nombre($Tag_nombre){ 
 $this->Tag_nombre = $Tag_nombre; 
 } 
 
} 
