<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Rutas de la API
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la API de tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro del grupo
| que contiene el middleware "api".
|
*/

// 🔹 Tus rutas personalizadas
//Rutas de Usuarios
Route::get('/usuarios', [UsuariosController::class, 'ListarUsuarios']);
Route::get('/usuario', [UsuariosController::class, 'ObtnerUsuarioId']);
Route::post('/crear-usuario', [UsuariosController::class, 'CrearUsuario']);


//Cambio