<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::included()->filter()->sort()->get();
        return response()->json($companies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    public function show($id)
    {
        $company = Company::included()->findOrFail($id);
        return response()->json($company);
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'nit' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $company->update($request->all());
        return response()->json($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(null, 204);
    }


    public function SuperAdminAdministrator(Request $request)
    {
        $userData = Http::get(env('URL_API') . 'user_by_roles');
       $userDataArray = $userData->json();
    
        if ($request->has('search') && !empty($request->search)) {
             $search = $request->search;
    
            $filteredData = array_filter($userDataArray, function ($user) use ($search) {
                return stripos($user['name'], $search) !== false || 
                       stripos($user['last_name'], $search) !== false || 
                       stripos($user['identification'], $search) !== false;
            });
    
            $userDataArray = array_values($filteredData);
        }
    
        if ($request->ajax()) {
            return view('partials.admin_results', ['data' => $userDataArray]);
        }

        return view('superadmin.SuperAdmin-Administrator', ['users' => $userDataArray]);
    }

}
