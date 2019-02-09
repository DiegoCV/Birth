<?php 
 class User{ 
 private $username; 
private $email; 
private $password; 
private $create_time; 
 
 public function getUsername(){ 
 return $this->username; 
 } 
public function getEmail(){ 
 return $this->email; 
 } 
public function getPassword(){ 
 return $this->password; 
 } 
public function getCreate_time(){ 
 return $this->create_time; 
 } 
 
 public function setUsername($Username){ 
 $this->Username = $Username; 
 } 
public function setEmail($Email){ 
 $this->Email = $Email; 
 } 
public function setPassword($Password){ 
 $this->Password = $Password; 
 } 
public function setCreate_time($Create_time){ 
 $this->Create_time = $Create_time; 
 } 
 
} 
