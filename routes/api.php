<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// de esta manera creamos una ruta a un controlador
//Route::apiResource('empleado', EmpleadoController::class);

// de esta manera creamos varias rutas a diferentes controladores
Route::apiResources([
    'empleado' => EmpleadoController::class,
    //'cliente' => ClienteController::class,
]);

