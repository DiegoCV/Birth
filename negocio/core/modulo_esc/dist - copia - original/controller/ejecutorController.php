<?php
include_once substr(getcwd(), 0,26).'\entity\ejecutor.php';
include_once substr(getcwd(), 0,26).'\mapper\ejecutorMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class ejecutorController{

	/**
     * Permite guardar un objeto tipo ejecutor.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$ejecutor       = new ejecutor($_POST['data']);
        $ejecutorMapper = new ejecutorMapper();
        var_dump($ejecutorMapper->crearejecutor($ejecutor));
	}
	public function listar(){;
		$ejecutorMapper = new ejecutorMapper();
		$ejecutor = $ejecutorMapper->listarejecutor();
		$render = new Render('listados/ejecutorList',$ejecutor);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $ejecutor = new ejecutor();

        $ejecutor->setidEJECUTOR($_POST['data']['idEJECUTOR']);

        $ejecutorMapper = new ejecutorMapper();
        $ejecutorMapper->eliminar($ejecutor);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/ejecutorEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/ejecutorform');
    $render->mostrar();
    }
}