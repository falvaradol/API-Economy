<?php

namespace App\Services;

use App\Common\Funciones;
use App\Common\AppStatus;
use App\Common\Mensaje;
use App\Entities\Core\Response;

class AppService
{
    public function get_date()
    {
        return Funciones::ObtenerFecha();
    }
    
    public function response_ok($data, string $message)
    {
        $response = new Response();
        $response->status= AppStatus::Ok; 
        $response->data = $data;  
        $response->message = $message;
        return $response;
    }
    
    public function response_controlled(string $message)
    {
        $response = new Response();
        $response->status= AppStatus::Controlled; 
        $response->message = $message;
        return $response;
    }
    
    public function response_error($ex)
    {
        $response = new Response();
        $response->status= AppStatus::Error;
        $response->message = Mensaje::OPERACION_ERROR;
        //$response->message = $ex->getMessage();
        return $response;
    }
}
