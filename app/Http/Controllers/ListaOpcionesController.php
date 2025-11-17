<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\ListaOpcionesLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ListaOpcionesController extends Controller
{
    public function ObtenerListaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = ListaOpcionesLogic::ObtenerListaId($id);

            return ApiResponse::success($resultado, 'Lista obtenida correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la lista por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }

    //crear lista de opciones
    public function CrearLista(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
                'nombre' => 'required|string',
                'estado' => 'required|integer',
                'idLista' => 'required|integer'
            ]);

            $id = $request->input('id');
            $nombre = $request->input('nombre');
            $estado = $request->input('estado');
            $idLista = $request->input('idLista');

            $nuevaLista = ListaOpcionesLogic::CrearLista($id, $nombre, $estado, $idLista);

            return ApiResponse::success($nuevaLista, 'Lista de opciones creada correctamente', 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la lista de opciones en el controlador: ' . $e->getMessage()], 500);
        }
    }
}
