<?php
include_once substr(getcwd(), 0,26).'\entity\replica.php';
include_once substr(getcwd(), 0,26).'\mapper\replicaMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class replicaController{

	/**
     * Permite guardar un objeto tipo replica.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$replica       = new replica($_POST['data']);
        $replicaMapper = new replicaMapper();
        var_dump($replicaMapper->crearreplica($replica));
	}
	public function listar(){;
		$replicaMapper = new replicaMapper();
		$replica = $replicaMapper->listarreplica();
		$render = new Render('listados/replicaList',$replica);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $replica = new replica();

        $replica->setidREPLICA($_POST['data']['idREPLICA']);

        $replicaMapper = new replicaMapper();
        $replicaMapper->eliminar($replica);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/replicaEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/replicaform');
    $render->mostrar();
    }
}