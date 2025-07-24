<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CursoController;


Route::get('/', [UsuarioController::class, 'index'])->name('index');
Route::get('inicio', function () {
    return view('usuarios.inicio');
})->name('inicio')->middleware('auth');

Route::get('inicio-admin', function () {
    return view('admins.inicio-admin');
})->name('inicio-admin')->middleware('auth', 'admin');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'storeUser'])->name('storeUser');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('cursos', [CursoController::class, 'cursos'])->name('cursos')->middleware('auth');
Route::get('cursos-admin', [CursoController::class, 'cursosAdmin'])->name('cursos-admin')->middleware('auth', 'admin');

Route::get('create', [CursoController::class, 'create'])->name('createCurso')->middleware('auth', 'admin');
Route::post('store', [CursoController::class, 'store'])->name('storeCurso')->middleware('auth', 'admin');
Route::get('showCurso', [CursoController::class, 'showCurso'])->name('showCurso')->middleware('auth');
Route::get('showCursoAdmin/{curso}', [CursoController::class, 'showCursoAdmin'])->name('showCursoAdmin')->middleware('auth', 'admin');
Route::get('editCurso/{curso}', [CursoController::class, 'editCurso'])->name('editCurso')->middleware('auth', 'admin');
Route::put('update/{curso}', [CursoController::class, 'update'])->name('updateCurso')->middleware('auth', 'admin');
Route::delete('destroyCurso/{curso}', [CursoController::class, 'destroy'])->name('destroyCurso')->middleware('auth', 'admin');