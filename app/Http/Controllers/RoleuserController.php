<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Roleuser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleuserController extends Controller
{
    public function asociar(){

        $users = User::all();
        $roles = Role::all();

    return view('role_user.asociar',compact('users','roles'));
    }
    public function index()
    {
        //
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
        $user=User::find($request->user_id);
        $user->roles()->attach($request->role_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Roleuser $roleuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roleuser $roleuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roleuser $roleuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roleuser $roleuser)
    {
        //
    }
}
