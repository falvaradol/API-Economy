<?php

namespace App\Common;

abstract class Mensaje
{
    const REGISTRO_OK = 'Los datos se registraron correctamente';
    const ACTUALIZACION_OK = 'Los datos se actualizaron correctamente';
    const OPERACION_ERROR = 'Se produjo un error al ejecutar la operación';
    const PASSWORD_INCORRECTO = 'La contraseña ingresada es incorrecta';
}
