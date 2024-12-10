<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    //administrador

    public function AgregarAprendiz()
    {
        return view('administrator.Agregar-aprendiz');
    }
    public function AgregarInstructor()
    {
        return view('administrator.Agregar-instructor');
    }

    //super administardor

    public function SuperAdminAdministratorAñadir()
    {
        return view('superadmin.SuperAdmin-AdministratorAñadir');
    }
    public function SuperAdminAprendizAgregar()
    {
        return view('superadmin.SuperAdmin-Aprendiz');
    }
    public function SuperAdminInstructorAñadir()
    {
        return view('superadmin.SuperAdmin-InstructorAñadir');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Recupera todos los registros de usuario
        $userRegisters = User_register::all();

        return response()->json($userRegisters);
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
            // 'identificacion' => 'required|integer',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user_registers',
            'password' => 'required|string|min:8',
            'phone' => 'required|integer',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'id_role' => 'required|exists:roles,id',
            'id_contract' => 'required|exists:contracts,id',
            'id_followup' => 'required|exists:followups,id',
            'id_company' => 'required|exists:companies,id',
            'id_program' => 'required|exists:programs,id',
            'id_academic_level' => 'required|exists:academic_levels,id',
            'id_knowledge_network' => 'required|exists:knowledge_networks,id',
            'id_contract_type' => 'required|exists:contract_types,id',
        ]);

        // Creación del nuevo registro de usuario
        $userRegister = Register::create($request->all());

        return response()->json($userRegister, 201); // Respuesta con código 201
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Recupera un registro de usuario específico
        $userRegister = Register::findOrFail($id);

        return response()->json($userRegister);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_register  $user_register
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Register $user_register)
    {
        // Validación de los datos de entrada
        $request->validate([
            'identificacion' => 'required|integer',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user_registers,email,' . $user_register->id,
            'password' => 'required|string|min:8',
            'phone' => 'required|integer',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'id_role' => 'required|exists:roles,id',
            'id_contract' => 'required|exists:contracts,id',
            'id_followup' => 'required|exists:followups,id',
            'id_company' => 'required|exists:companies,id',
            'id_program' => 'required|exists:programs,id',
            'id_academic_level' => 'required|exists:academic_levels,id',
            'id_knowledge_network' => 'required|exists:knowledge_networks,id',
            'id_contract_type' => 'required|exists:contract_types,id',
        ]);

        // Actualización del registro de usuario
        $user_register->update($request->all());

        return response()->json($user_register);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_register  $user_register
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User_register $user_register)
    {
        // Elimina el registro de usuario
        $user_register->delete();

        return response()->json(null, 204); // Respuesta vacía con código 204
    }
}
