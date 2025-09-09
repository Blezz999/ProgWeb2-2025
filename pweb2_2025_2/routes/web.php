<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/aluno', function () {//http://localhost:8000/aluno
    return "<h1>Olá Mundo Laravel</h1>";
});
*/
Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

