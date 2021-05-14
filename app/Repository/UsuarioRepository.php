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
            $entidad->fecha_registro, 
            $entidad->fecha_modificacion
        );
        
        return DB::insert("call usp_usuario_ins(?,?,?,?,?,?)", $parametros);
    }

    public function obtener(string $username)
    {
        $parametros = array(
            $username
        );

        return DB::select("call usp_usuario_sel_username(?)", $parametros)[0];
    }

    public function cambiar_password(object $entidad)
    {        
        $parametros = array(
            $entidad->username, 
            $entidad->password, 
            $entidad->fecha_modificacion
        );
        
        return DB::update("call usp_usuario_upd_password(?,?,?)", $parametros);
    }

    public function cambiar_email(object $entidad)
    {        
        $parametros = array(
            $entidad->username, 
            $entidad->email, 
            $entidad->fecha_modificacion
        );
        
        return DB::update("call usp_usuario_upd_email(?,?,?)", $parametros);
    }

    public function cambiar_validado(object $entidad)
    {        
        $parametros = array(
            $entidad->username, 
            $entidad->fecha_modificacion
        );
        
        return DB::update("call usp_usuario_upd_validado(?,?)", $parametros);
    }
}
