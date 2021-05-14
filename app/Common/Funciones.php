<?php

namespace App\Common;

use DateTime;
use Hash;

class Funciones
{
    public static function ObtenerFecha()
    {
        return new DateTime('NOW');
    }

    public static function Encriptar(string $parametro)
    {
        return Hash::make($parametro);
    }
}
