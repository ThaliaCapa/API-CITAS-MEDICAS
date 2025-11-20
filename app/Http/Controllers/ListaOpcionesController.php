<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\ListaOpcionesLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ListaOpcionesController extends Controller
{
    //listar listas de opciones
    public function ListarListaOpciones()
    {
        try {
            $resultado = ListaOpcionesLogic::ListarListaOpciones();

            return ApiResponse::success($resultado, 'Listas de opciones obtenidas correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al listar las listas de opciones en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Obtener lista por ID
    public function ObtenerListaopcionesId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = ListaOpcionesLogic::ObtenerListaopcionesId($id);

            return ApiResponse::success($resultado, 'Lista obtenida correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la lista por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //crear una nueva lista de opciones
    public function CrearListaOpciones(Request $request)
    {
        try {
            $request->validate([
                //'id' => 'integer',
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'estado' => 'required|integer',
                'idLista' => 'required|integer'
            ]);
            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $descripcion = $request->input('descripcion');
            $estado = $request->input('estado');
            $idLista = $request->input('idLista');
            $nuevaLista = ListaOpcionesLogic::CrearListaOpciones($id, $nombre, $descripcion, $estado, $idLista);
            return ApiResponse::success($nuevaLista, 'Lista de opciones creada correctamente', 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la lista de opciones en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Actualizar lista de opciones
    public function ActualizarListaOpciones(Request $request)
    {
        try {

            $request->validate([
                'id' => 'required|integer',
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'estado' => 'required|integer',
                'idLista' => 'required|integer'
            ]);

            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $descripcion = $request->input('descripcion');
            $estado = $request->input('estado');
            $idLista = $request->input('idLista');

            $listaActualizada = ListaOpcionesLogic::ActualizarListaOpciones(
                $id,
                $nombre,
                $descripcion,
                $estado,
                $idLista
            );

            return ApiResponse::success($listaActualizada, 'Lista de opciones actualizada correctamente', 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la lista de opciones en el controlador: ' . $e->getMessage()
            ], 500);
        }
    }

    //Eliminar lista de opciones
    public function EliminarListaOpciones(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = ListaOpcionesLogic::EliminarListaOpciones($id);

            return ApiResponse::success($resultado, 'Lista de opciones eliminada correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la lista de opciones en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
