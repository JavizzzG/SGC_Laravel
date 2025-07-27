<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CursoController;

use App\Http\Controllers\InscripcionController;


// Route::get('/', [UsuarioController::class, 'index'])->name('index');
Route::get('/', function () {
    return response()->json([
        'status' => 'Laravel arrancó correctamente',
        'app_env' => env('APP_ENV'),
        'debug' => env('APP_DEBUG'),
    ]);
});

Route::get('inicio', function () {
    return view('usuarios.inicio');
})->name('inicio')->middleware('auth');


Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('inicio-admin', [UsuarioController::class, 'inicioAdmin'])->name('inicio-admin')->middleware('auth', 'admin');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'storeUser'])->name('storeUser');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('cursos', [CursoController::class, 'cursos'])->name('cursos');
Route::get('cursos-admin', [CursoController::class, 'cursosAdmin'])->name('cursos-admin')->middleware('auth', 'admin');

Route::get('create', [CursoController::class, 'create'])->name('createCurso')->middleware('auth', 'admin');
Route::post('store', [CursoController::class, 'store'])->name('storeCurso')->middleware('auth', 'admin');
Route::get('showCurso/{curso}', [CursoController::class, 'showCurso'])->name('showCurso');
Route::get('showCursoAdmin/{curso}', [CursoController::class, 'showCursoAdmin'])->name('showCursoAdmin')->middleware('auth', 'admin');
Route::get('editCurso/{curso}', [CursoController::class, 'editCurso'])->name('editCurso')->middleware('auth', 'admin');
Route::put('update/{curso}', [CursoController::class, 'update'])->name('updateCurso')->middleware('auth', 'admin');
Route::delete('destroyCurso/{curso}', [CursoController::class, 'destroy'])->name('destroyCurso')->middleware('auth', 'admin');

Route::get('inscribirCurso/{curso}', [InscripcionController::class, 'create'])->name('inscribirCurso')->middleware('auth');
Route::post('storeInscripcion', [InscripcionController::class, 'store'])->name('storeInscripcion')->middleware('auth');
Route::get('inscri-detalles/{id}', [InscripcionController::class, 'show'])->name('inscri-detalles')->middleware('auth', 'admin');
Route::put('updateEstado/{id}', [InscripcionController::class, 'update'])->name('updateEstado')->middleware('auth', 'admin');

Route::get('perfil', [UsuarioController::class, 'showPerfil'])->name('showPerfil')->middleware('auth');
Route::get('editPerfil', [UsuarioController::class, 'editPerfil'])->name('editPerfil')->middleware('auth');
Route::put('updatePerfil', [UsuarioController::class, 'updatePerfil'])->name('updatePerfil')->middleware('auth');
Route::delete('deletePerfil', [UsuarioController::class, 'deletePerfil'])->name('deletePerfil')->middleware('auth');
Route::get('mis-cursos', [UsuarioController::class, 'showMisCursos'])->name('mis-cursos')->middleware('auth');

Route::get('/test', function () {
    return 'Todo bien ✅';
});