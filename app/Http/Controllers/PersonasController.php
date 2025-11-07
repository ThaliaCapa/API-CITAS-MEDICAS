<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Logic\PersonasLogic;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PersonasController extends Controller
{
    public function ObtenerPersonaId(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer'
            ]);
            $id = $request->input('id');

            $resultado = PersonasLogic::ObtenerPersonaId($id);

            return response()->json(['data' => $resultado, 'message' => 'Persona obtenida correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la persona por ID en el controlador: ' . $e->getMessage()], 500);
        }
    }
}