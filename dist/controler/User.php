<?php 
 class UserController{
public function listarUser(){
$userMapper = new UserMapper();
return $userMapper->listarUser();
}
 
 public function crearUser(){
$user = new User();
$user->setUsername($_POST['username']);
$user->setEmail($_POST['email']);
$user->setPassword($_POST['password']);
$user->setCreate_time($_POST['create_time']);

		$userMapper = new UserMapper();
return $userMapper->crearUser($user);
}
 
}