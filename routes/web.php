<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesquisaController;

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

Route::prefix('ceps')->group(function () {
    Route::get('', [CepController::class, 'list'])->name('ceps.list');

    Route::get('/create', [CepController::class, 'create'])->name('ceps.create');
    Route::post('/store', [CepController::class, 'store'])->name('ceps.store');

    Route::get('/show/{cep:slug}', [CepController::class, 'show'])->name('ceps.show');

    Route::get('/edit/{cep:slug}', [CepController::class, 'edit'])->name('ceps.edit');
    Route::put('/edit/{cep:slug}', [CepController::class, 'update'])->name('ceps.update');
    Route::delete('/edit/{cep:slug}', [CepController::class, 'destroy'])->name('ceps.destroy');
});

Route::get('/pesquisa', [PesquisaController::class, 'search'])->name('pesquisa.cep');

Route::get('/', 'App\Http\Controllers\MainController@index');
