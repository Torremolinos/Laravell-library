<?php

use Illuminate\Http\Request; //Request es para poder obtener los datos que vienen en la peticion
use Illuminate\Support\Facades\Route; //Route es para poder definir rutas 
use App\Http\Controllers\ApiController; //ApiController es el controlador que se encarga de gestionar las peticiones a la api (ver app/Http/Controllers/ApiController.php) 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get  ('/libros', [ApiController::class, 'index']); //index es el metodo que se ejecuta cuando se llama a la ruta /api/libros (ver app/Http/Controllers/ApiController.php) 

Route::post ('/libros', [ApiController::class, 'store']); //store es el metodo que se ejecuta cuando se llama a la ruta /api/libros (ver app/Http/Controllers/ApiController.php)

Route::delete ('/libros/{id}', [ApiController::class, 'destroy']); //destroy es el metodo que se ejecuta cuando se llama a la ruta /api/libros/{id} (ver app/Http/Controllers/ApiController.php)

