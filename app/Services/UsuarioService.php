<?php

namespace App\Services;

use App\Entities\Usuario;
use App\Repository\UsuarioRepository;
use App\Common\Constante;
use App\Common\Mensaje;
use App\Common\Funciones;

class UsuarioService extends AppService
{
    public function registrar(object $entidad)
    {
        $respuesta = null;

        try {  

            $fecha_sistema = $this->get_date();
            
            $usuario = new Usuario($entidad);
            $usuario->estado = Constante::ESTADO_ACTIVO;
            $usuario->password = Funciones::Encriptar($usuario->password);
            $usuario->fecha_registro = $fecha_sistema;
            $usuario->fecha_modificacion = $fecha_sistema;
    
            $repository = new UsuarioRepository();
    
            $datos = $repository->insertar($usuario);
            $respuesta = $this->response_ok($datos, Mensaje::REGISTRO_EXITOSO);  

        } catch (\Exception $ex) {
            $respuesta = $this->response_error($ex);          
        }

        return $respuesta;      
    }
    
    public function cambiar_password(object $entidad)
    {
        $respuesta = null;

        try {  

            $password_actual = Funciones::Encriptar($entidad->password_actual);
        
            $usuario = new Usuario($entidad);  
            $repository = new UsuarioRepository();
            $usuario_actual = new Usuario($repository->obtener($usuario->username));

            if ($usuario_actual->password != $password_actual){
                return $this->response_controlled(Mensaje::PASSWORD_INCORRECTO); ; 
            }
    
            $fecha_sistema = $this->get_date();

            $usuario->fecha_modificacion = $fecha_sistema; 
            $usuario->password = Funciones::Encriptar($usuario->password); 

            $datos = $repository->cambiar_password($usuario);
            $respuesta = $this->response_ok($datos, Mensaje::ACTUALIZACION_OK);  

        } catch (\Exception $ex) {
            $respuesta = $this->response_error($ex);          
        }

        return $respuesta;      
    }
        
    public function cambiar_email(object $entidad)
    {
        $respuesta = null;

        try {  
        
            $fecha_sistema = $this->get_date();

            $usuario = new Usuario($entidad);  
            $repository = new UsuarioRepository();               
            $usuario->fecha_modificacion = $fecha_sistema;

            $datos = $repository->cambiar_email($usuario);
            $respuesta = $this->response_ok($datos, Mensaje::ACTUALIZACION_OK);  

        } catch (\Exception $ex) {
            $respuesta = $this->response_error($ex);          
        }

        return $respuesta;      
    }
        
    public function cambiar_validado(object $entidad)
    {
        $respuesta = null;

        try {  
        
            $fecha_sistema = $this->get_date();

            $usuario = new Usuario($entidad);  
            $repository = new UsuarioRepository();               
            $usuario->fecha_modificacion = $fecha_sistema;

            $datos = $repository->cambiar_validado($usuario);
            $respuesta = $this->response_ok($datos, Mensaje::ACTUALIZACION_OK);  

        } catch (\Exception $ex) {
            $respuesta = $this->response_error($ex);          
        }

        return $respuesta;      
    }
}
