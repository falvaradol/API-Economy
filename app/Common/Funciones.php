<?php

namespace App\Common;

use DateTime;

class Funciones
{
    public static function ObtenerFecha()
    {
        return new DateTime('NOW');
    }
}
