<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\Clientes\ClientesController;
use App\Http\Controllers\Manager\Fornecedores\FornecedoresController;

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
 * Grupo de rotas utilizadas para tratar PDF
 * 
 */
Route::prefix('/pdf')->group(function(){
    Route::get('clientes', [ClientesController::class, 'geraPdf'])->name('clientes.pdf');

    Route::get('fornecedores', [FornecedoresController::class, 'geraPdf'])->name('fornecedores.pdf');
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
