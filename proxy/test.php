<?php
include_once 'Proxy.php';
//$json_str  =  file_get_contents ('php://input');
//$json_obj  =  json_decode ($json_str,true);
//var_dump($json_obj);
//$file = $json_obj['miSQL'];
$file = $_FILES['miSQL'];
$p = new Proxy();
$arr = array('success' => $p->subir($file), 'error' => 'Ocurrio un error');
echo json_encode($arr);