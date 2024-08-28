<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\Clientes\ClientesController;

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

Route::prefix('/clientes')->group(function(){
    Route::get('/', 
        [ClientesController::class, 'show'])
    ->name('clientes.show');

    Route::get('/create', 
        [ClientesController::class, 'create'])
    ->name('clientes.create');

    Route::post('/store', 
        [ClientesController::class, 'store'])
    ->name('clientes.store');

    Route::get('{cliente}/edit', 
        [ClientesController::class, 'edit'])
    ->name('clientes.edit');

    Route::put('{cliente}', 
        [ClientesController::class, 'update'])
    ->name('clientes.update');

    Route::delete('/{cliente}', 
        [ClientesController::class, 'destroy'])
    ->name('clientes.destroy');

    Route::get('/{id}', 
        [ClientesController::class, 'showModal'])
    ->name('clientes.showModal');
});

Route::get('pdf',
    [ClientesController::class, 'geraPdf'])
->name('clientes.pdf');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
