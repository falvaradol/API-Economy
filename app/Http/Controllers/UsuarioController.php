<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    public function registrar(Request $request)
    {
        $service = new UsuarioService();    
        $response = $service->insertar($request);     

        return response()->json($response);
    }

    
    public function create(Request $request)
    {
        $usuario_repository = new UsuarioRepository();

        $user = $usuario_repository->obtener_username('falvarado');
        $usuario = new UsuarioDto($request);

        $response = new ResponseDto();
        $response->data = $user;
        $response->status = 1;
        $response->message = "Exito";

        return response()->json($response);
    }
}
