<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produto/adicionar', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto/salvar', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produto/listar', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('/produto/visualizar/{id}', [ProdutoController::class, 'show'])->name('produto.show');
    Route::get('/produto/deletar/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    Route::get('/produto/editar/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::put('/produto/udpade/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::get('/produto/desativados', [ProdutoController::class, 'desativados'])->name('produto.desativados');
    Route::get('/produto/reativar/{id}', [ProdutoController::class, 'reativar'])->name('produto.reativa');
});

require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
