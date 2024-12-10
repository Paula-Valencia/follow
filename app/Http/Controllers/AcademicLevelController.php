<?php

namespace App\Http\Controllers;

use App\Models\Academic_level;
use Illuminate\Http\Request;

class AcademicLevelController extends Controller
{
    public function index()
    {
        $academic_level = Academic_level::included()->filter()->sort()->get();
        return response()->json($academic_level);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $academic_level= Academic_level::create($request->all());

        return response()->json($academic_level, 201);
    }

    public function show($id)
    {
        $academic_level= Academic_level::included()->findOrFail($id);
        return response()->json($academic_level);
    }

    public function update(Request $request, Academic_level $academic_level)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $academic_level->update($request->all());

        return response()->json($academic_level);
    }

    public function destroy(Academic_level $academic_level)
    {
        $academic_level->delete();
        return response()->json(null, 204);
    }
}
