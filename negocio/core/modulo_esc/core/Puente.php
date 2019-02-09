<?php
require_once 'DataBase.php';
/**
 *
 */
class Puente {

    public function obtenerTablas() {
        $con = new DataBase();
        return $con->obtenerTablas();
    }
    public function obtenerColumnas($tabla) {
        $con                 = new DataBase();
        $set                 = $con->obtenerColumnas($tabla);
        $cont                = "";
        $atributoNormal      = "";
        $atributoIncremental = "";
        $getters             = "";
        $setters             = "";

        $const = " public function __construct(array \$data = null) { \n";
        for ($i = 0; $i < count($set); $i++) {
            $columna = $set[$i]['Field'];
            if ($set[$i]['Extra'] == 'auto_increment') {
                $atributoIncremental .= "\$this->$columna = \$data['$columna']; \n";
            } else {
                $atributoNormal .= "\$this->$columna = \$data['$columna']; \n";
            }

            $cont .= "private \$$columna ; \n ";
            $setters .= "public function set$columna($" . $columna . "){ \n " . "$" . "this" . "->$columna = $" . $columna . "; \n return " . "$" . "this" . "; \n}\n";
            $getters .= "public function get$columna(){ \n return " . "$" . "this" . "->$columna; \n}\n";

        }
        $const .= " if (!is_null(\$data)) { \n
				            if (array_key_exists('id', \$data)) { \n
				                $atributoIncremental \n
				            }\n
				            $atributoNormal \n
				        }\n
    }\n";
        return $cont . $const . $setters . $getters;
    }

    public function metodos($tabla) {
        $con     = new DataBase();
        $set     = $con->obtenerColumnas($tabla);
        $inicial = substr($tabla, 0, 1);
        $select  = "";
        $co      = count($set);
        for ($i = 0; $i < $co; $i++) {
            $columna = $set[$i]['Field'];
            $select .= "$columna, ";
        }

        $len = strlen($select);

        $select = substr($select, 0, $len - 2);

        $select .= " FROM $tabla\"";

        $funcion = " public function listar" . $tabla . "() {  \n
						\$sql = \"SELECT " . $select . " ;  \n				        
				        \$results = array();  \n
				        foreach (\$this->db->query(\$sql) as \$fila) { \n
				            array_push(\$results, new $tabla(\$fila)); \n
				        } \n
				        return \$results; \n
			    	}    ";

        return $funcion;
    }

    public function getMetodoCrear($tabla) {
        $con        = new DataBase();
        $set        = $con->obtenerColumnas($tabla);
        $funcion    = "public function crear$tabla($tabla \$$tabla) {\n";
        $variables  = "";
        $variables2 = "";
        $variables3 = "";

        for ($i = 0; $i < count($set); $i++) {
            $columna = $set[$i]['Field'];
            if ($set[$i]['Extra'] != 'auto_increment') {
                $variables .= "\$$columna = \$".$tabla."->get$columna(); \n";
                $variables2 .= "$columna,";
                $variables3 .= "'\$$columna',";
            }
        }
        $variables2 = $this->eliminarComa($variables2);
        $variables3 = $this->eliminarComa($variables3);
        $funcion .= "$variables \n
        			\$sql = \"INSERT INTO $tabla ($variables2) VALUES ($variables3)\"; \n
        			\$stmt   = \$this->db->prepare(\$sql);\n
    				\$result = \$stmt->execute();\n
					    if (!\$result) {\n
					        throw new Exception(\"couldnotsaverecord\");\n
					    } else {\n
					        echo \"GUARDADOBIEN\";\n
					    }\n
					}\n";

        return $funcion;
    }

    public function getMetodoEliminar($tabla){
        $con        = new DataBase();
        $set        = $con->obtenerColumnas($tabla);
        $llaves = "";
        $condicion ="";
        for ($i = 0; $i < count($set); $i++) {
            if ($set[$i]['Key'] == 'PRI') {
                $columna = $set[$i]['Field'];
                $llaves .= "\$$columna = \$$tabla"."->get$columna();\n";            
                $condicion .= "$columna = \$$columna AND ";               
           }

        }

        $condicion = substr($condicion, 0, strlen($condicion) - 4);

        $metodo = "public function eliminar($tabla \$$tabla) {
                    $llaves\n
                    \$sql = \"DELETE FROM $tabla WHERE $condicion\";
                    \$stmt = \$this->db->prepare(\$sql);
                    \$result = \$stmt->execute();
                    if (!\$result) {
                        throw new Exception(\"No se pudo eliminar\");
                    } else {
                        echo \"eliminado con exito\";
                    }
                }
            ";

        return $metodo;    
       
        
    }

    private function eliminarComa($value) {
        $len = strlen($value);
        return substr($value, 0, $len - 1);
    }

    public function crearFormularios($tabla) {
        $con  = new DataBase();
        $set  = $con->obtenerColumnas($tabla);
        $form = "<form action = \"\" method=\"POST\" id=\"a\">";
        for ($i = 0; $i < count($set); $i++) {
            if ($set[$i]['Extra'] != 'auto_increment') {
                $columna = $set[$i]['Field'];
                $form .= "
			<input type=\"text\" name=\"". $columna ."\" value=\"\" placeholder=\"".$columna ."\" />\n";
            }

        }
        $form .= "
				<input type=\"submit\" value=\"Enviar\" />
				</form>
                <script type=\"text/javascript\" src=\"js/Midwife.js\"></script>
                <script type=\"text/javascript\">
                    cargar('".$tabla."','crear');
                </script>
				";
        return $form;
    }

    public function crearFormulariosEliminar($tabla) {
        $con  = new DataBase();
        $set  = $con->obtenerColumnas($tabla);
        $form = "<form method=\"POST\" id=\"formEliminar\">\n";
        for ($i = 0; $i < count($set); $i++) {
            if ($set[$i]['Key'] == 'PRI') {
                $columna = $set[$i]['Field']; 
                $form .= "<input type=\"text\" name=\"$columna\" value=\"\" placeholder=\"$columna\" required />";
           }
        }
        $form .= "
                <input type=\"submit\" value=\"Enviar\" />
                </form>
                <script type=\"text/javascript\" src=\"js/MidwifeEliminar.js\"></script>
                 <script type=\"text/javascript\">
                     cargar2('$tabla','eliminar');
                </script>";
        return $form;
    }
    public function crearLista($tabla){
        $con  = new DataBase();
        $set  = $con->obtenerColumnas($tabla);
        $lista = "<div class=\"w3-container\"> \n
                    <h2>Queria listados? </h2>    \n
                    <p>Pues se le tienen</p> \n
                <table class=\"w3-table w3-striped w3-border\"> \n
                <tr> \n ";
        for ($i = 0; $i < count($set); $i++) {            
                $columna = $set[$i]['Field']; 
                $lista .= "<th>$columna</th>\n";
        }
        $lista .= "</tr>\n
                     <?php\n
                        for (\$index = 0; \$index < count(\$this->datos); \$index++) {
                            \$".$tabla." = \$this->datos[\$index];
                            \$var = '<tr>';";  
        for ($i = 0; $i < count($set); $i++) {            
                $columna = $set[$i]['Field']; 
                $lista .= "\$var .= '<td>'.\$"."$tabla"."->get".$columna."().'</td>';\n";
        }
        $lista .= "\$var .= '</tr>';\n
                            echo \$var;\n
                            \$var = '';\n
                        }\n
                    ?>\n
                     </table>\n
                    </div>\n";
        
        return $lista;
    }

    public function crearLinks($tablas) {
        $con  = new DataBase();
        $link = "";
        for ($i = 0; $i < count($tablas); $i++) {
            $link .= "<a class=\"w3-bar-item w3-button w3-hover-black\" onclick=\"cargarFormulario(" . $i . ",$(this).text())\">" . $tablas[$i] . "</a>\n";
        }
        return $link;
    }

    public function crearFiltro($tablas) {
        $con    = new DataBase();
        $filtro = "<?php
						\$formulario = filter_input(INPUT_POST, 'formu');\n
							switch (\$formulario) {";
        for ($i = 0; $i < count($tablas); $i++) {
            $filtro .= "
						case " . $i . ":
  							return include '../vista/formulario/" . $tablas[$i] . "form.php';
  						break;
			";
        }

        $filtro .= "
					default:\n
					  		return 'ningun caso funciono';\n
					  		break;\n
					  }\n

  					?>\n";

        return $filtro;

    }

    public function crearController($tabla) {
        $con  = new DataBase();
        $set  = $con->obtenerColumnas($tabla);
        $llaves = "";
        for ($i = 0; $i < count($set); $i++) {
            if ($set[$i]['Key'] == 'PRI') {
                $columna = $set[$i]['Field'];
                $llaves .= "\$$tabla"."->set"."$columna(\$_POST['data']['$columna']);\n";
           }

        }
        $contenido = 
"<?php
include_once substr(getcwd(), 0,26).'\\entity\\$tabla.php';
include_once substr(getcwd(), 0,26).'\mapper\\$tabla" . "Mapper.php';
include_once substr(getcwd(), 0,26).'\core\Render.php';

class $tabla" . "Controller{

	/**
     * Permite guardar un objeto tipo $tabla.
     * La informacion llego por post asumiendo la estructura de las entidades .
     *
     */
	public function crear(){
		\$$tabla       = new $tabla(\$_POST['data']);
        \$$tabla" . "Mapper = new $tabla" . "Mapper();
        var_dump(\$$tabla" . "Mapper->crear$tabla(\$$tabla));
	}
	public function listar(){;
		\$$tabla" . "Mapper = new $tabla" . "Mapper();
		\$$tabla = \$$tabla" . "Mapper->listar$tabla();
		\$render = new Render('listados/$tabla"."List',\$$tabla);
        \$render->mostrar();
	}

	public function actualizar(){

	}

	 public function eliminar(){
        \$$tabla = new $tabla();\n
        $llaves
        \$$tabla"."Mapper = new $tabla"."Mapper();
        \$$tabla"."Mapper->eliminar(\$$tabla);
    }

    public function formeliminar() {
    \$render = new Render('formuEliminar/$tabla"."Eliminar');
    \$render->mostrar();
    }

    public function crearForm() {
    \$render = new Render('formulario/$tabla"."form');
    \$render->mostrar();
    }
}";
        return $contenido;

    }
}

?>

