<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('console/ping', 'ConsoleController@ping');

Route::post('usuario/registrar', 'UsuarioController@Registrar');
Route::put('usuario/actualizar_password', 'UsuarioController@ActualizarPassword');
Route::put('usuario/actualizar_email', 'UsuarioController@ActualizarEmail');
Route::put('usuario/validar_usuario', 'UsuarioController@ValidarUsuario');