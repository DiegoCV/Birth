<?php

/**
 * 
 */
class File {

    public function escribirFile($ruta,$nombreClase,$extension,$contenido) {
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
