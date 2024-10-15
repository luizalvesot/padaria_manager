<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\Clientes\ClientesController;
use App\Http\Controllers\Manager\Fornecedores\FornecedoresController;
use App\Http\Controllers\Manager\Produtos\CategoriaProdutos\CategoriasController;
use App\Http\Controllers\Manager\Produtos\TiposMedidas\MedidasController;
use App\Http\Controllers\Manager\Produtos\ProdutosController;
use App\Http\Controllers\Manager\Vendas\VendaController;
use App\Http\Controllers\Manager\Produtos\CodigoBarrasController;

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
    return redirect()->route('login');
});

Route::get('/vendas', [VendaController::class, 'show'])->name('vendas.show');


Route::get('/codigo-barras-create/{produto}', [CodigoBarrasController::class, 'create'])->name('codigo_barras.create');
Route::post('/codigo-barras', [CodigoBarrasController::class, 'store'])->name('codigo_barras.store');
/**
 * 
 * Grupo de rotas utilizadas nas views de PRODUTOS
 * 
 */
Route::prefix('/produtos')->group(function(){
    Route::get('/', [ProdutosController::class, 'show'])->name('produtos.show');

    Route::get('/create', [ProdutosController::class, 'create'])->name('produtos.create');

    Route::post('/store', [ProdutosController::class, 'store'])->name('produtos.store');

    Route::get('{produto}/edit', [ProdutosController::class, 'edit'])->name('produtos.edit');

    Route::put('{produto}', [ProdutosController::class, 'update'])->name('produtos.update');

    Route::delete('/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');

    Route::get('/{id}', [ProdutosController::class, 'showModal'])->name('produtos.showModal');
});

/**
 * 
 * Grupo de rotas utilizadas nas views de FORNECEDORES
 * 
 */
Route::prefix('/fornecedores')->group(function(){
    Route::get('/', [FornecedoresController::class, 'show'])->name('fornecedores.show');

    Route::get('/create', [FornecedoresController::class, 'create'])->name('fornecedores.create');

    Route::post('/store', [FornecedoresController::class, 'store'])->name('fornecedores.store');

    Route::get('{fornecedor}/edit', [FornecedoresController::class, 'edit'])->name('fornecedores.edit');

    Route::put('{fornecedor}', [FornecedoresController::class, 'update'])->name('fornecedores.update');

    Route::delete('/{fornecedor}', [FornecedoresController::class, 'destroy'])->name('fornecedores.destroy');

    Route::get('/{id}', [FornecedoresController::class, 'showModal'])->name('fornecedores.showModal');
});

/**
 * 
 * Grupo de rotas utilizadas nas views de CLIENTES
 */
Route::prefix('/clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'show'])->name('clientes.show');
    
    Route::get('/create', [ClientesController::class, 'create'])->name('clientes.create');
    
    Route::post('/store', [ClientesController::class, 'store'])->name('clientes.store');
    
    Route::get('{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    
    Route::put('{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
    
    Route::delete('/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
    
    Route::get('/{id}', [ClientesController::class, 'showModal'])->name('clientes.showModal');
});

/**
 * 
 * Grupo de rotas utilizadas nas categorias de produtos
 */
Route::prefix('/categorias')->group(function(){
    Route::get('/', [CategoriasController::class, 'show'])->name('categorias.show');
    
    Route::get('/create', [CategoriasController::class, 'create'])->name('categorias.create');
    
    Route::post('/store', [CategoriasController::class, 'store'])->name('categorias.store');
    
    Route::get('{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    
    Route::put('{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
    
    Route::delete('/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
    
    Route::get('/{id}', [CategoriasController::class, 'showModal'])->name('categorias.showModal');
});

/**
 * 
 * Grupo de rotas utilizadas nos tipos de medidas de produtos
 */
Route::prefix('/medidas')->group(function(){
    Route::get('/', [MedidasController::class, 'show'])->name('medidas.show');
    
    Route::get('/create', [MedidasController::class, 'create'])->name('medidas.create');
    
    Route::post('/store', [MedidasController::class, 'store'])->name('medidas.store');
    
    Route::get('{medida}/edit', [MedidasController::class, 'edit'])->name('medidas.edit');
    
    Route::put('{medida}', [MedidasController::class, 'update'])->name('medidas.update');
    
    Route::delete('/{medida}', [MedidasController::class, 'destroy'])->name('medidas.destroy');
    
    Route::get('/{id}', [MedidasController::class, 'showModal'])->name('medidas.showModal');
});

/**
 * 
 * Grupo de rotas utilizadas para tratar PDF
 * 
 */
Route::prefix('/pdf')->group(function(){
    Route::get('/clientes', [ClientesController::class, 'geraPdf'])->name('clientes.pdf');

    Route::get('/fornecedores', [FornecedoresController::class, 'geraPdf'])->name('fornecedores.pdf');
});


/**
 * 
 * Rotas do Jetstream
 * 
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
