<?php
include_once substr(getcwd(), 0,26).'\entity\ejecutor_has_actividad.php';
include_once substr(getcwd(), 0,26).'\mapper\ejecutor_has_actividadMapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class ejecutor_has_actividadController{

	/**
     * Permite guardar un objeto tipo ejecutor_has_actividad.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		$ejecutor_has_actividad       = new ejecutor_has_actividad($_POST['data']);
        $ejecutor_has_actividadMapper = new ejecutor_has_actividadMapper();
        var_dump($ejecutor_has_actividadMapper->crearejecutor_has_actividad($ejecutor_has_actividad));
	}
	public function listar(){;
		$ejecutor_has_actividadMapper = new ejecutor_has_actividadMapper();
		$ejecutor_has_actividad = $ejecutor_has_actividadMapper->listarejecutor_has_actividad();
		$render = new Render('listados/ejecutor_has_actividadList',$ejecutor_has_actividad);
        $render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        $ejecutor_has_actividad = new ejecutor_has_actividad();

        $ejecutor_has_actividad->setEJECUTOR_idEJECUTOR($_POST['data']['EJECUTOR_idEJECUTOR']);
$ejecutor_has_actividad->setACTIVIDAD_idACTIVIDAD($_POST['data']['ACTIVIDAD_idACTIVIDAD']);

        $ejecutor_has_actividadMapper = new ejecutor_has_actividadMapper();
        $ejecutor_has_actividadMapper->eliminar($ejecutor_has_actividad);
    }

    public function formeliminar() {
    $render = new Render('formuEliminar/ejecutor_has_actividadEliminar');
    $render->mostrar();
    }

    public function crearForm() {
    $render = new Render('formulario/ejecutor_has_actividadform');
    $render->mostrar();
    }
}