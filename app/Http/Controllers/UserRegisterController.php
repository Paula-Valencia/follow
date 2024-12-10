<?php

namespace App\Http\Controllers;

use App\Models\User_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserRegisterController extends Controller
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
    public function AgregarAprendiz2()
    {
        return view('administrator.Agregar-aprendiz2');
    }

    //super administardor

    public function SuperAdminAdministratorAñadir()
    {
        return view('superadmin.SuperAdmin-AdministratorAñadir');
    }
    public function SuperAdminAprendizAgregar()
    {
        $company = Http::get(env('URL_API') . 'getCompany');
        $CompanyDataArray = $company->json();
    
        $instructor = Http::get(env('URL_API') . 'get_trainer');
        $instructorDataArray = $instructor->json(); 
        return view('superadmin.SuperAdmin-AprendizAgregar', compact('CompanyDataArray', 'instructorDataArray'));
    }
    

    public function SuperAdminInstructorAñadir()
    {
        return view('superadmin.SuperAdmin-InstructorAñadir');
    }



    public function storeUser(Request $request)
    {
        
        $validated = $request->validate([
            'identification' => 'required|max:50',
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'municipality' => 'required|string|max:100',
            'id_role' => 'required|integer',
            // 'password' => 'required|string|min:8',
            'last_name' => 'required|string|max:100',
        ]);
        $token = session()->get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',              
            'Accept' => 'application/json',   
            'Authorization' => 'Bearer ' . $token,
            ])->post(env('URL_API') . 'user_registers', [
            'identification' => $validated['identification'],
            'name' => $validated['name'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'department' => $validated['department'],
            'municipality' => $validated['municipality'],
            'id_role' => 2,
            'last_name' => $validated['last_name'],
        ]);

        // dd($response);

    
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Administrator')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }
    
    
    public function updateUserAdmin(Request $request, $id)
    {

       
        $response = Http::withHeaders(headers: [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->put(env('URL_API') . "update_user/{$id}", $request->all());
    
    
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Administrator')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }

    public function updateUserInstructor(Request $request, $id)
    {
      
       
        $response = Http::withHeaders(headers: [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->put(env('URL_API') . "update_user/{$id}", $request->all());
    
       
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Instructor')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }
    

    public function updateUserAprendiz(Request $request, $id)
    {
      
        $response = Http::withHeaders(headers: [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->put(env('URL_API') . "update_user/{$id}", $request->all());
    
       
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Aprendiz')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }


    public function deleteUser(Request $request, $id)
    {
      
        $response = Http::withHeaders(headers: [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->delete(env('URL_API') . "delete_user/{$id}", $request->all());

   
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Administrator')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }
    
    


    public function crearInstructor(Request $request)
    {
        
        $validated = $request->validate([
            'identification' => 'required|max:50',
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'municipality' => 'required|string|max:100',
            'id_role' => 'required|integer',
            'last_name' => 'required|string|max:100',
            

        ]);
    
        $token = session()->get('token');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',              
            'Accept' => 'application/json',   
            'Authorization' => 'Bearer ' . $token,
        ])->post(env('URL_API') . 'user_registers', [
            'identification' => $validated['identification'],
            'name' => $validated['name'],
            'telephone' => $validated['telephone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'department' => $validated['department'],
            'municipality' => $validated['municipality'],
            'id_role' => 3,
            'last_name' => $validated['last_name'],

        ]);

    
        if ($response->successful()) {
            return redirect()->route('superadmin.SuperAdmin-Instructor')->with('success', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }




    
}


