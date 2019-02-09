<?php
include_once 'Proxy.php';
session_start();
$sesion = $_SESSION['base'];
$p = new Proxy();
$p->descargarProyecto($sesion);