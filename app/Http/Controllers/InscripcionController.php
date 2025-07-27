<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Curso;
use App\Models\Usuario;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $id)
    {
        $curso = Curso::findOrFail($id);
        return view('inscripciones.inscripcion', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'estado' => 'required|in:1,2,3,4,5,6', // 1: Pendiente, 2: Aprobado, 3: Rechazado, 4: Terminado, 5: Cancelado, 6: En curso
        ]);

        $curso = Curso::findOrFail($validated['curso_id']);
        $existe = Inscripcion::where('curso_id', $curso->id)->where('usuario_id', $validated['usuario_id'])->exists();

        if($existe){
            return redirect()->back()->withErrors(['error' => 'Ya estás inscrito en este curso.']);
        }

        if($curso->cupo_maximo <= Inscripcion::where('curso_id', $curso->id)->count()) {
            return redirect()->back()->withErrors(['error' => 'El curso ha alcanzado su cupo máximo.']);
        }
        
        Inscripcion::create($validated);
        

        return redirect()->route('cursos')->with('success', 'Inscripción realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $inscripciones = Inscripcion::where('curso_id', $id)->get();
        $curso = Curso::findOrFail($id);
        $usuarios = Usuario::all()->whereIn('id', $inscripciones->pluck('usuario_id'));

        return view('inscripciones.inscri-detalles', compact('curso', 'inscripciones', 'usuarios'));
    }

    public function showFiltrados(Request $request){
        $inscripciones = Inscripcion::where('curso_id', $request->curso_id)->get();
        $curso = Curso::findOrFail($request->curso_id);
        $usuarioIds = $inscripciones->pluck('usuario_id')->all(); // Convierte a array
        $usuariosAntes = Usuario::whereIn('id', $usuarioIds);
        $usuarios = $usuariosAntes->where(function ($query) use ($request) {
            $query->where('nombre', 'like', '%' . $request->busqueda . '%')
                ->orWhere('apellido', 'like', '%' . $request->busqueda . '%')
                ->orWhere('documento', 'like', '%' . $request->busqueda . '%');
        })->get();

        return view('inscripciones.inscri-detalles', compact('curso', 'inscripciones', 'usuarios'));
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
        $validated = $request->validate([
            'estado' => 'required|array',
            'estado.*' => 'required|in:2,3,4,5,6', // 2: Aprobado, 3: Rechazado, 4: Terminado, 5: Cancelado, 6: En curso
        ]);

        foreach ($validated['estado'] as $usuarioId => $estado) {
            Inscripcion::where('usuario_id', $usuarioId)->where('curso_id', $id)->update(['estado' => $estado]);
        }

        return redirect()->route('inscri-detalles', $id)->with('success', 'Estados de inscripción actualizados exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
