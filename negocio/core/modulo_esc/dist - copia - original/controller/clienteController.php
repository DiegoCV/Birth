<?php
include_once substr(getcwd(), 0,26).'\entity\cliente.php';
include_once substr(getcwd(), 0,26).'\mapper\clienteMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class clienteController{

	/**
     * Permite guardar un objeto tipo cliente.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$cliente       = new cliente($_POST['data']);
        $clienteMapper = new clienteMapper();
        var_dump($clienteMapper->crearcliente($cliente));
	}
	public function listar(){;
		$clienteMapper = new clienteMapper();
		$cliente = $clienteMapper->listarcliente();
		$render = new Render('listados/clienteList',$cliente);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $cliente = new cliente();

        $cliente->setidCLIENTE($_POST['data']['idCLIENTE']);

        $clienteMapper = new clienteMapper();
        $clienteMapper->eliminar($cliente);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/clienteEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/clienteform');
    $render->mostrar();
    }
}