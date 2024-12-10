<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    //administrador
    public function reports()
    {
        return view('administrator.reports');
    }

    //superadministrador
    public function SuperAdminRedactar()
    {
        return view('superadmin.SuperAdmin-Redactar');
    }

    //instructor
    public function report(): View|RedirectResponse
    {
        // Obtener el token de sesión
        $token = session()->get('token');

        // Verificar si el token está presente
        if (!$token) {
            return redirect()->back()->with('error', 'Token de sesión no encontrado.');
        }

        try {
            // Hacer la solicitud HTTP a la API
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ])->get(env('URL_API') . 'get_apprentices_by_instructor');

            // Verificar si la respuesta fue exitosa
            if ($response->successful()) {
                $apprentices = $response->json();

                // Pasar los datos a la vista
                return view('trainer.report', compact('apprentices'));
            } else {
                // Manejar respuestas no exitosas (errores en la API)
                return redirect()->back()->with('error', 'Error al obtener la información de los estudiantes.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema al realizar la solicitud.');
        }
    }

    public function createNotification(Request $request): RedirectResponse
    {
        $token = session()->get('token');

        if (!$token) {
            return redirect()->back()->with('error', 'No se encontró el token de autenticación.');
        }

        $url = env('URL_API') . 'create_notification';

        $data = [
            'message' => $request->input('message'),
            'user_id' => $request->input('user_id')
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post($url, $data);

        if ($response->successful()) {
            return redirect()->route('notificationtrainer')->with('success', 'Notificación enviada con éxito.');
        } else {
            return redirect()->back()->with('error', 'Error al enviar la notificación.');
        }
    }
    
}
