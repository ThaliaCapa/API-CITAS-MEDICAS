<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\CitasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CitasController extends Controller
{
    public function ObtenerCitaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = CitasLogic::ObtenerCitaId($id);

            return ApiResponse::success($resultado, 'Cita obtenida correctamente', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la cita por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }
}