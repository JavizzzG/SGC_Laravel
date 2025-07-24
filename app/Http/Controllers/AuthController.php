<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view(' auth.register ');
    }



    public function storeUser(Request $request)
    {
        $validos = $request->validate([
            'documento' => 'required|string|max:20|unique:usuarios,documento',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Usuario::create([
            'documento' => $validos['documento'],
            'nombre' => $validos['nombre'],
            'apellido' => $validos['apellido'],
            'telefono' => $validos['telefono'],
            'email' => $validos['email'],
            'password' => bcrypt($validos['password']),
            'rol' => 1 // Rol de usuario por defecto
        ]);

        return redirect()->route('index')->with('success', 'Usuario registrado exitosamente.');
    }



    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $verified = $request->validate([
            'email' => 'required|email|exists:usuarios,email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($verified)){
            $request->session()->regenerate();

            if(Auth::user()->rol==1){
                return redirect()->route('inicio')->with('success', 'Bienvenido, ' . Auth::user()->nombre);
            }else{
                return redirect()->route('inicio-admin')->with('success', 'Bienvenido a admin, ' . Auth::user()->nombre);
            }
        }

        return back()->withErrors([
            'email' => 'Los datos no coinciden',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')->with('success', 'Has cerrado sesión exitosamente.');
    }
}