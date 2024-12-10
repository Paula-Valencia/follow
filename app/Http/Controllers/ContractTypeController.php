<?php

namespace App\Http\Controllers;

use App\Models\contract_type;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    public function index()
    {
    $contract_type=contract_type::all();
    return Response()->json($contract_type);
}

public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
        ]);
        $contract_type= Contract_type::create($request->all());

        return response()->json('registrado correctamente');
    }


public function show($id) //si se pasa $id se utiliza la comentada
{   $contract_type = Contract_type::findOrFail($id);
    return response()->json($contract_type);
}
public function update(Request $request, Contract_type $contract_type)
{
    $request->validate([
        'name' => 'required|max:255',
    ]);

    $contract_type->update($request->all());

    return response()->json('actualizado correctamente');
}
public function destroy(Contract_type $contract_type)
    {
        $contract_type->delete();
        return response()->json('eliminado correctamente');
    }
}
