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



Route::get('viacep/{cep}', 'App\Http\Controllers\Api\ViaCepController@getCep');
//Route::get('usuario/{usr}', 'App\Http\Controllers\Api\UsuarioControllerAPIController@getCep');
Route::resource('Usuario', 'App\Http\Controllers\Api\UsuarioControllerAPIController');
Route::resource('Contato', 'App\Http\Controllers\Api\ContatoControllerAPIController');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});













Route::resource('contato_controllers', App\Http\Controllers\API\ContatoControllerAPIController::class);


Route::resource('usuario_controllers', App\Http\Controllers\API\UsuarioControllerAPIController::class);
