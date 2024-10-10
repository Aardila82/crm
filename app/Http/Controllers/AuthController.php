<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

     // Procesar el login
     public function login(Request $request)
     {
         // Validar los campos
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);

         // Intentar iniciar sesión
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();

             // Redirigir después del login exitoso
             return redirect()->intended('dashboard');
         }

         // Si las credenciales no coinciden
         return back()->withErrors([
             'email' => 'Las credenciales no coinciden con nuestros registros.',
         ]);
     }
     // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
