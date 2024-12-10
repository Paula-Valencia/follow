<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    // Muestra el formulario de inicio de sesión
    public function showLoginForm(): RedirectResponse|View
    {
        $isAuthenticated = session('token');

        if ($isAuthenticated) {
            return redirect()->route('administrator.web');
        }

        return view('auth.login');
    }

    // Maneja la solicitud de inicio de sesión
    public function login(Request $request): RedirectResponse
    {
        // Valida las credenciales de la solicitud
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $base_url = env('URL_API') . 'login';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($base_url, [
            'email'    => $validated['email'],
            'password' => $validated['password']
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['access_token'])) {
                // Almacena el token en la sesión
                session(['token' => $data['access_token']]);
                session(['user' => $data['user']]);
                // Redirige al usuario

                $roleId = $data['user']['id_role'];

                if ($roleId == 1 || $roleId == 2) {
                    return redirect()->route('superadmin.home');
                }

                if ($roleId == 3) {
                    return redirect()->route('trainer.home');
                }

                if ($roleId == 4) {
                    return redirect()->route('apprentice.index');
                }

                return redirect('/')->with('success', 'Usuario autenticado correctamente');
            }
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['token', 'user']);

        return redirect('/');
    }

    public function resetPassword(): View
    {
        return view('auth.reset-password');
    }
}
