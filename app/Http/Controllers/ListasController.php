<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\ListasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ListasController extends Controller
{
    //listar listas
    public function ListarListas()
    {
        try {
            $resultado = ListasLogic::ListarListas();

            return ApiResponse::success($resultado, 'Listas obtenidas correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al listar las listas en el controlador: ' . $e->getMessage()], 500);
        }
    }


    //Obtener lista por ID
    public function ObtenerListaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = ListasLogic::ObtenerListaId($id);

            return ApiResponse::success($resultado, 'Lista obtenida correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la lista por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //crear nueva lista
    public function CrearLista(Request $request)
    {
        try {
            $request->validate([
                //'id' => 'integer',
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'estado' => 'required|integer'
            ]);

            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $descripcion = $request->input('descripcion');
            $estado = $request->input('estado');

            //var_dump($id, $nombre, $descripcion, $estado);

            $nuevaLista = ListasLogic::CrearLista($id, $nombre, $descripcion, $estado);

            return ApiResponse::success($nuevaLista, 'Lista creada correctamente', 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la lista en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Actualizar lista
    public function ActualizarLista(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'nombre' => 'required|string',
                'descripcion' => 'required|string',
                'estado' => 'required|integer'
            ]);

            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $descripcion = $request->input('descripcion');
            $estado = $request->input('estado');

            $listaActualizada = ListasLogic::ActualizarLista($id, $nombre, $descripcion, $estado);

            return ApiResponse::success($listaActualizada, 'Lista actualizada correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la lista en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //Eliminar lista
    public function EliminarLista(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = ListasLogic::EliminarLista($id);

            return ApiResponse::success($resultado, 'Lista eliminada correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar la lista en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
