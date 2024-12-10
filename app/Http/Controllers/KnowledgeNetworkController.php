<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeNetwork;
use Illuminate\Http\Request;

class KnowledgeNetworkController extends Controller
{
    public function index()
    {
    $knowledge_network=Knowledge_network::all();
    return Response()->json($knowledge_network);
}

public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',          
        ]);
        $knowledge_network= Knowledge_network::create($request->all());

        return response()->json('registrado correctamente');
    }


public function show($id) //si se pasa $id se utiliza la comentada
{   $knowledge_network = Knowledge_network::findOrFail($id);
    return response()->json($knowledge_network);
}
public function update(Request $request, Knowledge_network $knowledge_network)
{
    $request->validate([
        'name' => 'required|max:255',
    ]);

    $knowledge_network->update($request->all());

    return response()->json('actualizado correctamente');
}
public function destroy(Knowledge_network $knowledge_network)
    {
        $knowledge_network->delete();
        return response()->json('eliminado correctamente');
    }
}
