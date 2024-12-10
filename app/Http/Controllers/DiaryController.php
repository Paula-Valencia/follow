<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Support\Facades\Http;

class DiaryController extends Controller
{

    //instructor
    public function cronograma()
    {

        $token = session()->get('token');

        // Realizar la solicitud con el token en el encabezado
        $visits = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_all_follow_ups_by_instructor');

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        $visitsData = $visits->json();

        return view('trainer.cronograma', compact('visitsData'));
    }

    /**
     * Get data follow ups to view in calendar
     * @return \Illuminate\View\Factory|\Illuminate\View\View
     */
    public function calendar(): Factory|View
    {
        $token = session()->get('token');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_trainer_assigned_by_apprentice');

        $data = $response->json();

        // Realizar la solicitud con el token en el encabezado
        $visits = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get(env('URL_API') . 'get_all_follow_ups_by_apprentice');

        // Convertir la respuesta JSON en un array, vacío si no tiene contenido
        $visitsData = $visits->json();

        return view('apprentice.calendar', compact('data', 'visitsData'));
    }


    public function index()
    {
        // Recupera agendas, aplicando los scopes incluidos y de ordenamiento
        $diaries = Diary::included()->sort()->get();
        return response()->json($diaries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'followup_id' => 'required|exists:followups,id', // Cambiado a followup_id
        ]);

        $diary = Diary::create($request->all());
        return response()->json($diary, 201); // Respuesta con código 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Recupera una agenda en específico, aplicando el scope de inclusión
        $diary = Diary::included()->findOrFail($id);
        return response()->json($diary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Diary $diary)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'followup_id' => 'required|exists:followups,id', // Cambiado a followup_id
        ]);

        // Actualización de agenda
        $diary->update($request->all());
        return response()->json($diary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diary  $diary
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Diary $diary)
    {
        // Elimina agenda
        $diary->delete();
        return response()->json(null, 204); // Respuesta vacía con código 204
    }
}
