<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    // Muestra el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Maneja la solicitud de registro
    public function register(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'identification' => 'required|numeric',  // Asegurando que sea numérico
            'name'           => 'required|string|max:255',
            'last_name'      => 'nullable|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'id_role'        => 'required|integer|exists:roles,id',
            'telephone'      => 'required|string|max:15',
            'address'        => 'required|string|max:255',
            'department'     => 'required|string|max:255',
            'municipality'   => 'required|string|max:255',
            'password'       => 'required|string|min:8'
        ]);

        // Obtener la URL base de la API
        $base_url = env('URL_API') . 'register';

        // Realizar la solicitud POST a la API
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($base_url, [
            'email'         => $validated['email'],
            'password'      => $validated['password'],
            'identification' => $validated['identification'],
            'name'          => $validated['name'],
            'last_name'     => $validated['last_name'],
            'id_role'       => $validated['id_role'],
            'telephone'     => $validated['telephone'],
            'address'       => $validated['address'],
            'department'    => $validated['department'],
            'municipality'  => $validated['municipality']
        ]);

        if ($response->successful()) {
            return redirect('/auth/login')->with('success', 'Usuario registrado correctamente');
        }

        return back()->withErrors(['error' => 'Ocurrio un error inesperado al crear al usuario']);
    }

    // Redirige al usuario según su rol
    protected function redirectTo($user)
    {
        // Define las rutas de redirección basadas en el rol del usuario
        $roleRoutes = [
            'superadmin' => 'superadmin.home',
            'administrator' => 'administrator.home',
            'trainer' => 'icon',
            'apprentice' => 'apprentice.home',
        ];

        // Obtiene el primer rol del usuario
        $userRole = $user->roles->first();
        if ($userRole) {
            // Determina la ruta de redirección basada en el rol del usuario
            $redirectRoute = $roleRoutes[$userRole->guard_name] ?? '/';
            return redirect()->intended(route($redirectRoute));
        }

        // Si no se encuentra un rol, redirige a la página principal
        return redirect()->intended('/');
    }

    
}
