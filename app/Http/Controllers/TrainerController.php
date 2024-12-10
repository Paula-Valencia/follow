<?php

namespace App\Http\Controllers;

use App\Models\trainer;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_apprentices_by_instructor');

        $data = $response->json();

        return view('trainer.home', compact('data'));
    }

    //inicio de instructor iconos
    public function icon()
    {
        return view('trainer.icon');
    }

    public function configuracion()
    {
        return view('trainer.configuracion');
    }

    /**
     * Return view profile to apprentice selected by trainner
     * @param string|int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function perfilapre(string|int $id): RedirectResponse|View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_apprentice_by_user_id/' . $id);

        // Realizar la solicitud con el token en el encabezado
        $visits = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_all_follow_ups_by_apprentice?id_apprentice=' . $id);

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        
        if ($response->successful()) {
            $apprentice = $response->json();
            $visitsData = [];
            $visitsData = $visits->json();

            if (!$apprentice) {
                return redirect()->back()->with('error', 'Estudiante no encontrado.');
            }

            return view('trainer.perfilapre', compact('apprentice', 'visitsData'));
        } else {
            return redirect()->back()->with('error', 'Error al obtener la información del estudiante.');
        }
    }

    //icono nombre usuario instructor
    public function username()
    {
        return view('trainer.username');
    }

    /**
     * Get apprentice by id to view visits
     * @param string|int $id
     * @return RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function visita(string|int $id): Factory|RedirectResponse|View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_apprentice_by_user_id/' . $id);

        if ($response->successful()) {
            $apprentice = $response->json();

            if (!$apprentice) {
                return redirect()->back()->with('error', 'Estudiante no encontrado.');
            }

            return view('trainer.visita', compact('apprentice'));
        } else {
            return redirect()->back()->with('error', 'Error al obtener la información del estudiante.');
        }
    }
    //icono email
    public function email()
    {
        return view('trainer.email');
    }


    public function updateEstado($id){
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('URL_API') . 'apprentices/' . $id . '/estado');
        dd($response);
    }

    
}
