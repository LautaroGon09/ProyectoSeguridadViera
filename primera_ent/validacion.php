<?php

function existe_user($user, $pass)
{
    $ruta_archivo = "usuarios.txt";
    $fh = fopen($ruta_archivo, "r");
    $data = fread($fh, filesize($ruta_archivo));
    $users = explode(" ", $data);

    for ($i = 0; $i < count($users); $i++) {
        $campos = explode(".", $users[$i]);
        $usuario = $campos[0];
        $contra = $campos[1];
        $tipo = $campos[2];
        if ($user == $usuario && $pass == $contra) {
            return $tipo;
        }
    }
    return "no existe";
}
