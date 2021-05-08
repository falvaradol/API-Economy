<?php

namespace App\Repository;

use DB;

class UsuarioRepository
{
    public function insertar(object $entidad)
    {        
        $parametros = array(
            $entidad->username, 
            $entidad->password, 
            $entidad->estado,
            $entidad->email, 
            $entidad->fecha_registro
        );
        
        return DB::insert("call usp_usuario_ins(?,?,?,?,?)", $parametros);
    }

    public function obtener_username(string $username)
    {
        $parametros = array(
            $username
        );

        return DB::select("call usp_usuario_sel_username(?)", $parametros);
    }
}
