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
Route::get('/personas', [PersonasController::class, 'ListarPersonas']); //Listar todas las personas
Route::get('/persona', [PersonasController::class, 'ObtenerPersonaId']); //Obtener usuario por ID
Route::post('/crear-persona', [PersonasController::class, 'CrearPersona']); //Crear nueva persona
Route::put('/actualizar-persona', [PersonasController::class, 'ActualizarPersona']); //Actualizar persona
Route::delete('/eliminar-persona', [PersonasController::class, 'EliminarPersona']); //Eliminar persona


//Rutas de Citas
Route::get('/citas', [CitasController::class, 'ListarCita']); //Listar todas las citas
Route::get('/cita', [CitasController::class, 'ObtenerCitaId']); //Obtener usuario por ID
Route::post('/crear-cita', [CitasController::class, 'CrearCita']); //Crear nueva cita
Route::put('/actualizar-cita', [CitasController::class, 'CrearCita']); //Actualizar cita
Route::delete('/eliminar-cita', [CitasController::class, 'EliminarCita']); //Eliminar cita


//Rutas de Listas
Route::get('/listas', [ListasController::class, 'ListarListas']); //Listar todas las listas
Route::get('/lista', [ListasController::class, 'ObtenerListaId']); //Obtener usuario por ID
Route::post('/crear-lista', [ListasController::class, 'CrearLista']); //Crear nueva lista
Route::put('/actualizar-lista', [ListasController::class, 'ActualizarLista']); //Actualizar lista
Route::delete('/eliminar-lista', [ListasController::class, 'EliminarLista']); //Eliminar lista


//Rutas de Horarios
Route::get('/horarios', [HorarioController::class, 'ListarHorarios']); //Listar todos los horarios
Route::get('/horario', [HorarioController::class, 'ObtenerHorarioId']); //Obtener horario por ID
Route::post('/crear-horario', [HorarioController::class, 'CrearHorario']); //Crear nuevo horario
Route::put('/actualizar-horario', [HorarioController::class, 'ActualizarHorario']); //Actualizar horario
Route::delete('/eliminar-horario', [HorarioController::class, 'EliminarHorario']); //Eliminar horario



//Rutas de ListaOpciones
Route::get('/listas-opciones', [ListaOpcionesController::class, 'ListarListaOpciones']); //Listar todas las listas de opciones
Route::get('/lista-opciones', [ListaOpcionesController::class, 'ObtenerListaopcionesId']); //Obtener lista de opciones por ID
Route::post('/crear-lista-opciones', [ListaOpcionesController::class, 'CrearListaOpciones']); //Crear nueva lista de opciones
Route::put('/actualizar-lista-opciones', [ListaOpcionesController::class, 'ActualizarListaOpciones']); //Actualizar lista de opciones
Route::delete('/eliminar-lista-opciones', [ListaOpcionesController::class, 'EliminarListaOpciones']); //Eliminar lista de opciones