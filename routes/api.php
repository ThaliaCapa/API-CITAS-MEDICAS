<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ListaOpcionesController;

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
Route::get('/usuarios', [UsuariosController::class, 'ListarUsuarios']); //Listar todos usuarios
Route::get('/usuario', [UsuariosController::class, 'ObtnerUsuarioId']); //Obtener usuario por ID
Route::post('/crear-usuario', [UsuariosController::class, 'CrearUsuario']); //Crear usuario
Route::put('/actualizar-usuario', [UsuariosController::class, 'ActualizarUsuario']); //Actualizar usuario
Route::delete('/eliminar-usuario', [UsuariosController::class, 'EliminarUsuario']); //Eliminar usuario


//Rutas de Personas
Route::get('/personas', [PersonasController::class, 'ListarPersonas']);//Listar todas las personas
Route::get('/persona', [PersonasController::class, 'ObtenerPersonaId']);//Obtener usuario por ID
Route::post('/crear-persona', [PersonasController::class, 'CrearPersona']);//Crear nueva persona
Route::put('/actualizar-persona', [PersonasController::class, 'ActualizarPersona']);//Actualizar persona
Route::delete('/eliminar-persona', [PersonasController::class, 'EliminarPersona']);//Eliminar persona


//Rutas de Citas
Route::get('/citas', [CitasController::class, 'ListarCita']);//Listar todas las citas
Route::get('/cita', [CitasController::class, 'ObtenerCitaId']);//Obtener usuario por ID
Route::post('/crear-cita', [CitasController::class, 'CrearCita']);//Crear nueva cita
Route::put('/actualizar-cita', [CitasController::class, 'CrearCita']);//Actualizar cita
Route::delete('/eliminar-cita', [CitasController::class, 'EliminarCita']);//Eliminar cita


//Rutas de Listas
Route::get('/lista', [ListasController::class, 'ObtenerListaId']);//Obtener usuario por ID


//Rutas de Horarios
Route::get('/horario', [HorarioController::class, 'ObtenerHorarioId']);//Obtener horario por ID


//Rutas de ListaOpciones
Route::get('/lista-opciones', [ListaOpcionesController::class, 'ObtenerListaId']);//Obtener lista por ID