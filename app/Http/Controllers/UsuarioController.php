<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function inicioAdmin()
    {
        $cursos = Curso::all();
        $inscripciones = Inscripcion::all();
        return view('admins.inicio-admin', compact('cursos', 'inscripciones'));
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
    public function showPerfil()
    {
        return view('usuarios.perfil');
    }

    public function showMisCursos(){
        $inscripciones = Inscripcion::where('usuario_id', auth()->user()->id)->get();
        $cursos = Curso::all()->whereIn('id', $inscripciones->pluck('curso_id'));
        return view('usuarios.mis-cursos', compact('cursos', 'inscripciones'));
    }

    public function editPerfil()
    {
        return view('usuarios.edit-perfil');
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function updatePerfil(Request $request)
    {
        $usuario = auth()->user();

        $validos = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email,' . $usuario->id,
            'documento' => 'required|string|max:20|unique:usuarios,documento,' . $usuario->id,
            'telefono' => 'nullable|string|max:15',
        ]);

        
        $usuario->update($validos);

        return redirect()->route('showPerfil')->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
