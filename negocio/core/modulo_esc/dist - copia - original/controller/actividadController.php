<?php
include_once substr(getcwd(), 0,26).'\entity\actividad.php';
include_once substr(getcwd(), 0,26).'\mapper\actividadMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class actividadController{

	/**
     * Permite guardar un objeto tipo actividad.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$actividad       = new actividad($_POST['data']);
        $actividadMapper = new actividadMapper();
        var_dump($actividadMapper->crearactividad($actividad));
	}
	public function listar(){;
		$actividadMapper = new actividadMapper();
		$actividad = $actividadMapper->listaractividad();
		$render = new Render('listados/actividadList',$actividad);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $actividad = new actividad();

        $actividad->setidACTIVIDAD($_POST['data']['idACTIVIDAD']);

        $actividadMapper = new actividadMapper();
        $actividadMapper->eliminar($actividad);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/actividadEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/actividadform');
    $render->mostrar();
    }
}