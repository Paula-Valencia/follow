<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FollowupController extends Controller
{
    


    public function submitForm(Request $request)
    {
        $request->validate([
            'progress_evaluation' => 'required|max:255',
            'activities_carriedout' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'practical_stage' => 'required|max:255',
            'log' => 'required|integer',
            'agreement_report' => 'required|date',
        ]);

        $apiUrl = config('app.url_server_api') . '/api/followups'; // URL de la API
        $client = new Client();

        try {
            $response = $client->post($apiUrl, [
                'json' => $request->all(),
            ]);

            if ($response->getStatusCode() == 201) {
                return redirect()->back()->with('success', 'Seguimiento creado con éxito.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al enviar los datos: ' . $e->getMessage());
        }
    }

    public function listFollowups()
    {
        $apiUrl = config('app.url_server_api') . '/api/followups'; // URL de la API
        $client = new Client();

        try {
            $response = $client->get($apiUrl);
            $followups = json_decode($response->getBody(), true);
            return view('followup_list', compact('followups'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al obtener los datos: ' . $e->getMessage());
        }
    }
}
