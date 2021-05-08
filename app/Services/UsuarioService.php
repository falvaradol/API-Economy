<?php

namespace App\Services;

use App\Entities\Usuario;
use App\Entities\Core\Response;
use App\Repository\UsuarioRepository;
use App\Common\AppStatus;
use App\Common\Constante;
use App\Common\Mensaje;
use App\Common\Funciones;
use Hash;

class UsuarioService extends AppService
{
    public function insertar(object $entidad)
    {
        $response = new Response();

        try {         
            $usuario = new Usuario($entidad);
            $usuario->password = Hash::make($usuario->password);
            $usuario->estado = Constante::Estado_Activo;
            $usuario->fecha_registro = Funciones::ObtenerFecha();
    
            $repository = new UsuarioRepository();
    
            $response->data = $repository->insertar($usuario);  
            $response->message = Mensaje::RegistroExistoso;

        } catch (\Exception $ex) {
            $response->status = AppStatus::Error;
            $response->message = $ex->getMessage();          
        }

        return $response;      
    }
}
