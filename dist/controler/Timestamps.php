<?php 
 class TimestampsController{
public function listarTimestamps(){
$timestampsMapper = new TimestampsMapper();
return $timestampsMapper->listarTimestamps();
}
 
 public function crearTimestamps(){
$timestamps = new Timestamps();
$timestamps->setEntrada_entrada_id($_POST['entrada_entrada_id']);
$timestamps->setCreate_time($_POST['create_time']);
$timestamps->setUpdate_time($_POST['update_time']);

		$timestampsMapper = new TimestampsMapper();
return $timestampsMapper->crearTimestamps($timestamps);
}
 
}