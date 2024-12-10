<?php

namespace App\Http\Controllers;

use App\Models\apprentice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApprenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        $token = session()->get('token');

        // Realizar la solicitud con el token en el encabezado
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_trainer_assigned_by_apprentice');

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        $data = $response->json();

        // Realizar la solicitud con el token en el encabezado
        $visits = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_all_follow_ups_by_apprentice');

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        $visitsData = $visits->json();

        // Realizar la solicitud con el token en el encabezado
        $logs = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_logs_apprentice');

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        $logsData = $logs->json();
        

        // Retornar siempre el array, incluso si está vacío
        return view('apprentice.home', compact('data', 'visitsData', 'logsData'));
    }

    public function visit()
    {
        return view('apprentice.visit');
    }

    public function registervisit()
    {
        return view('apprentice.registervisit');
    }

    public function profile()
    {
        return view('apprentice.profile');
    }
    public function settings()
    {
        return view('apprentice.settings');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $apprentice = Apprentice::findOrFail();
        return view('apprentice.home', compact('apprentice'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(apprentice $apprentice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, apprentice $apprentice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(apprentice $apprentice)
    {
        //
    }


    public function crearAprendiz(Request $request)
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(env('URL_API') . 'apprentices-asignar', $request->all());

        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Aprendiz')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }
}
