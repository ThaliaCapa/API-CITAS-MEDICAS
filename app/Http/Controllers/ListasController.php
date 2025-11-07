<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\ListasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ListasController extends Controller
{
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
}
