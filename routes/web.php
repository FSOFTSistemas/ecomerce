<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ConfiguracoesController;
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
Route::get('/', [ProdutoController::class, 'welcome'])->middleware('auth')->name('home');
Route::get('/categorias/{id}', [ProdutoController::class, 'categoriaHome'])->middleware('auth')->name('home.categoria');
Route::post('/entrar', [LoginController::class, 'entrar'])->middleware('auth')->name('login.entrar');
Route::get('/registrar', [UserController::class, 'create'])->middleware('auth')->name('registrar');
Route::post('/registrar', [UserController::class, 'store'])->middleware('auth')->name('user.store');
Route::get('/sair', [LoginController::class, 'sair'])->middleware('auth')->name('user.sair');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->middleware('auth')->name('dashboard');

Route::middleware('admin')->group(function () {
    //Home
    Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home.auth');
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('auth')->name('profile.destroy');
    //Produtos
    Route::get('/produto/adicionar', [ProdutoController::class, 'create'])->middleware('auth')->name('produto.create');
    Route::post('/produto/salvar', [ProdutoController::class, 'store'])->middleware('auth')->name('produto.store');
    Route::get('/produto/listar', [ProdutoController::class, 'index'])->middleware('auth')->name('produto.index');
    Route::get('/produto/visualizar/{id}', [ProdutoController::class, 'show'])->middleware('auth')->name('produto.show');
    Route::get('/produto/deletar/{id}', [ProdutoController::class, 'destroy'])->middleware('auth')->name('produto.destroy');
    Route::get('/produto/editar/{id}', [ProdutoController::class, 'edit'])->middleware('auth')->name('produto.edit');
    Route::put('/produto/udpade/{id}', [ProdutoController::class, 'update'])->middleware('auth')->name('produto.update');
    Route::get('/produto/desativados', [ProdutoController::class, 'desativados'])->middleware('auth')->name('produto.desativados');
    Route::get('/produto/reativar/{id}', [ProdutoController::class, 'reativar'])->middleware('auth')->name('produto.reativa');
    //Categorias
    Route::get('/categoria/adicionar', [CategoriaController::class, 'create'])->middleware('auth')->name('categoria.create');
    Route::get('/categoria/listar', [CategoriaController::class, 'index'])->middleware('auth')->name('categoria.index');
    Route::get('/categoria/desativados', [CategoriaController::class, 'desativados'])->middleware('auth')->name('categoria.desativados');
    Route::get('/categoria/visualizar/{id}', [CategoriaController::class, 'show'])->middleware('auth')->name('categoria.show');
    Route::get('/categoria/deletar/{id}', [CategoriaController::class, 'destroy'])->middleware('auth')->name('categoria.destroy');
    Route::put('/categoria/udpade/{id}', [CategoriaController::class, 'update'])->middleware('auth')->name('categoria.update');
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'edit'])->middleware('auth')->name('categoria.edit');
    Route::post('/categoria/salvar', [CategoriaController::class, 'store'])->middleware('auth')->name('categoria.store');
    Route::get('/categoria/reativar/{id}', [CategoriaController::class, 'reativar'])->middleware('auth')->name('categoria.reativa');
    //Pedidos
    Route::get('/pedido/abertos', [PedidoController::class, 'pedidosAbertos'])->middleware('auth')->name('pedido.abertos');
    Route::get('/pedido/finalizados', [PedidoController::class, 'pedidosFinalizados'])->middleware('auth')->name('pedido.finalizados');
    Route::get('/pedido/visualizar/{id}', [PedidoController::class, 'visualizarItens'])->middleware('auth')->name('pedido.visualizar');
    Route::get('/pedido/finalizar/{id}', [PedidoController::class, 'finalizar'])->middleware('auth')->name('pedido.finalizar');
    //Relatorios
    Route::get('/relatorio/venda', [RelatorioController::class, 'index'])->middleware('auth')->name('relatorio.venda');
    //Usuários
    Route::get('/usuarios/cliente', [UserController::class, 'index'])->middleware('auth')->name('user.cliente');
    Route::get('/usuarios/admin', [UserController::class, 'show'])->middleware('auth')->name('user.admin');
    Route::get('/usuarios/editar/{id}', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');
    Route::put('/usuarios/update/{idu}/{ide}', [UserController::class, 'update'])->middleware('auth')->name('user.update');
    Route::get('/usuarios/deletar/{id}', [UserController::class, 'destroy'])->middleware('auth')->name('user.destroy');
    //Configurações
    Route::get('/empresa/banner', [BannerController::class, 'index'])->middleware('auth')->name('banner.main');
    Route::get('/empresa/novo', [ConfiguracoesController::class, 'index'])->middleware('auth')->name('empresa.main');
    Route::get('/empresa/adicionar', [BannerController::class, 'create'])->middleware('auth')->name('criar.banner');
    Route::post('/empresa/salvar', [BannerController::class, 'store'])->middleware('auth')->name('salvar.banner');
    Route::get('/empresa/adm/criar', [ConfiguracoesController::class, 'create'])->middleware('auth')->name('criar.adm');
    Route::post('/empresa/adm/salvar', [ConfiguracoesController::class, 'store'])->middleware('auth')->name('salvar.adm');
    Route::get('/empresa/senha/editar', [ConfiguracoesController::class, 'edit'])->middleware('auth')->name('senha.edit');
    Route::put('/empresa/senha/update/{id}', [ConfiguracoesController::class, 'update'])->middleware('auth')->name('senha.update');
    Route::post('/empresa/config/criar', [ConfiguracoesController::class, 'criar'])->middleware('auth')->name('criar.config');

});

Route::middleware('cliente')->group(function () {
    Route::get('/carrinho', [PedidoController::class, 'index'])->middleware('auth')->name('carrinho');
    Route::get('/carrinho/adicionar/{id}', [PedidoController::class, 'adicionar'])->middleware('auth')->name('carrinho.adicionar');
    Route::get('/carrinho/diminuir/{id}', [PedidoController::class, 'diminuir'])->middleware('auth')->name('carrinho.diminuir');
    Route::get('/carrinho/remover/{id}', [PedidoController::class, 'remover'])->middleware('auth')->name('carrinho.remover');
    Route::get('/carrinho/concluir/{id}', [PedidoController::class, 'concluir'])->middleware('auth')->name('carrinho.concluir');
    Route::get('/pedidos/visualizar/{id}', [PedidoController::class, 'visualizarItensCliente'])->middleware('auth')->name('pedido.cliente.visualizar');
    Route::get('/pedido/historico', [PedidoController::class, 'historico'])->middleware('auth')->name('pedido.historico');
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
