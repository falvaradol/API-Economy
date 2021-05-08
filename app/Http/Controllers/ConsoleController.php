<?php

namespace App\Http\Controllers;

use App\Entities\ResponseDto;

class ConsoleController extends Controller
{
    public function ping()
    {
        $response = new ResponseDto();
        $response->status = 1;
        $response->message = "Mensaje exitoso";

        return response()->json($response);    
    }
}
