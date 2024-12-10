<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

class BitacoraController extends Controller
{
    public function bitacora(): Factory|View
    {
        return view('trainer.bitacora');
    }

    public function registrar(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'bitacoras' => 'required|array', // Verifica que se seleccionen bitácoras
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'observacion' => 'nullable|string',
        ]);

        // Almacenar los datos de la bitácora
        $bitacora = new Bitacora();
        $bitacora->bitacoras = implode(',', $request->bitacoras); // Guardamos las bitácoras seleccionadas
        $bitacora->descripcion = $request->descripcion;
        $bitacora->fecha = $request->fecha;
        $bitacora->observacion = $request->observacion;
        $bitacora->save();

        // Redirigir con mensaje de éxito
        return response()->json(['message' => 'Bitácora registrada exitosamente'], 200);
    }

}
