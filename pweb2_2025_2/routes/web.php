<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\MatriculaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');
Route::delete('aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
Route::get('/aluno/report', [AlunoController::class, 'report'])->name('aluno.report');
Route::get('/aluno/chart', [AlunoController::class, 'chart'])->name('aluno.chart');

Route::post('/curso/search', [CursoController::class, 'search'])->name('curso.search');
Route::resource('curso', App\Http\Controllers\CursoController::class);
Route::get('/curso/{curso}/turmas', [TurmaController::class, 'cursoTurmasIndex'])->name('curso.turmas');
Route::get('/curso/{curso}/turmas/create', [TurmaController::class, 'createCursoTurma'])
    ->name('curso.turmas.create');

Route::post('/turma/search', [TurmaController::class, 'search'])->name('turma.search');
Route::resource('turma', App\Http\Controllers\TurmaController::class);

Route::post('/matricula/search', [MatriculaController::class, 'search'])->name('matricula.search');
Route::resource('matricula', App\Http\Controllers\MatriculaController::class);


/*
Route::get('/aluno', function () {
    return view('aluno.list');
});
*/
