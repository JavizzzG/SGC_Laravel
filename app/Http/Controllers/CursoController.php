<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cursos()
    {
        $cursos = Curso::all();
        return view('cursos.cursos', compact('cursos'));
    }

    public function cursosFiltrados(Request $request){
        $cursos = Curso::where('nombre', 'like', '%' . $request->busqueda . '%')->get();

        return view('cursos.cursos', compact('cursos'));
    }

    public function cursosAdmin()
    {
        $cursos = Curso::all();
        return view('admins.cursos-admin', compact('cursos'));
    }

    public function cursosFiltradosAdmin(Request $request){
        $cursos = Curso::where('nombre', 'like', '%' . $request->busqueda . '%')->get();

        return view('admins.cursos-admin', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.createCurso');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'fecha_limite_inscripcion' => 'nullable|date|before:fecha_inicio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'cupo_maximo' => 'required|integer|min:1',
            'activo' => 'boolean',
            'imagen' => 'image|nullable'
        ]);

        if($request->hasFile('imagen')){
            $path = $request->file('imagen')->store('cursos', 'public');
            $validated['imagen'] = $path;
        }

        Curso::create($validated);
        return redirect()->route('cursos-admin')->with('success', 'Curso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showCurso(Curso $curso)
    {
        return view('cursos.curso-detallado', compact('curso'));
    }

    public function showCursoAdmin(Curso $curso)
    {
        return view('admins.curso-detalle', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editCurso(Curso $curso)
    {
        return view('admins.editCurso', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'fecha_limite_inscripcion' => 'nullable|date|before:fecha_inicio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'cupo_maximo' => 'required|integer|min:1',
            'activo' => 'boolean',
            'imagen' => 'image|nullable'
        ]);

        if($request->hasFile('imagen')){
            if($curso->imagen){
                Storage::disk('public')->delete($curso->imagen);
            }
            $path = $request->file('imagen')->store('cursos', 'public');
            $validated['imagen'] = $path;
        }

        $curso->update($validated);
        return redirect()->route('cursos-admin')->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        if($curso->imagen){
            Storage::disk('public')->delete($curso->imagen);
        }
        $curso->delete();
        return redirect()->route('cursos-admin')->with('success', 'Curso eliminado exitosamente.');
    }
}
