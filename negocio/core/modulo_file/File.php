<?php

/**
 * 
 */
class File {

    public function escribirFile($ruta,$nombreClase,$extension,$contenido) {
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }
        $flag = false;
        if ($archivo = fopen($ruta . $nombreClase . $extension, "a")) {
            if (fwrite($archivo,$contenido)) {
                $flag = true;
            }
            fclose($archivo);
        }
        return $flag;
    }

}
