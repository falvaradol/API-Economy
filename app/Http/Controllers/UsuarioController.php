<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    public function Registrar(Request $request)
    {
        $service = new UsuarioService();    
        $response = $service->registrar($request);     

        return response()->json($response);
    }
    
    public function ActualizarPassword(Request $request)
    {
        $service = new UsuarioService();    
        $response = $service->cambiar_password($request);     

        return response()->json($response);        
    }
    
    public function ActualizarEmail(Request $request)
    {
        $service = new UsuarioService();    
        $response = $service->cambiar_email($request);     

        return response()->json($response);        
    }
    
    public function ValidarUsuario(Request $request)
    {
        $service = new UsuarioService();    
        $response = $service->cambiar_validado($request);     

        return response()->json($response);        
    }
}
