<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view(' usuarios.register ');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
