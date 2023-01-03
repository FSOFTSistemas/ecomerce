<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProdutoController::class, 'welcome'])->name('home');
Route::get('/categoria/{id}', [ProdutoController::class, 'categoriaHome'])->name('home.categoria');
Route::post('/entrar', [LoginController::class, 'entrar'])->name('login.entrar');
Route::get('/registrar', [UserController::class, 'create'])->name('registrar');
Route::post('/registrar', [UserController::class, 'store'])->name('user.store');
Route::get('/sair', [LoginController::class, 'sair'])->name('user.sair');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
    
Route::middleware('admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.auth');
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

    Route::get('/categoria/adicionar', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::get('/categoria/listar', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categoria/desativados', [CategoriaController::class, 'desativados'])->name('categoria.desativados');
    Route::get('/categoria/visualizar/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::get('/categoria/deletar/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
    Route::put('/categoria/udpade/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::post('/categoria/salvar', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria/reativar/{id}', [CategoriaController::class, 'reativar'])->name('categoria.reativa');

    Route::get('/pedido/abertos', [PedidoController::class, 'pedidosAbertos'])->name('pedido.abertos');
    Route::get('/pedido/finalizados', [PedidoController::class, 'pedidosFinalizados'])->name('pedido.finalizados');
    Route::get('/pedido/visualizar/{id}', [PedidoController::class, 'visualizarItens'])->name('pedido.visualizar');
    Route::get('/pedido/finalizar/{id}', [PedidoController::class, 'finalizar'])->name('pedido.finalizar');

});

Route::middleware('cliente')->group(function () {
    Route::get('/carrinho', [PedidoController::class, 'index'])->name('carrinho');
    Route::get('/carrinho/adicionar/{id}', [PedidoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::get('/carrinho/diminuir/{id}', [PedidoController::class, 'diminuir'])->name('carrinho.diminuir');
    Route::get('/carrinho/remover/{id}', [PedidoController::class, 'remover'])->name('carrinho.remover');
    Route::get('/carrinho/concluir/{id}', [PedidoController::class, 'concluir'])->name('carrinho.concluir');
    Route::get('/pedido/visualizar/{id}', [PedidoController::class, 'visualizarItensCliente'])->name('pedido.cliente.visualizar');
    Route::get('/pedido/historico', [PedidoController::class, 'historico'])->name('pedido.historico');  
});
// Route::get('/teste',[LoginController::class, 'testeC'])->name('testec')->middleware('cliente');
// Route::get('/testeA',[LoginController::class, 'testeA'])->name('testea')->middleware('admin');
require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
