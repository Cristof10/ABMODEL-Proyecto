<?php

use App\Http\Controllers\DiccionarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosturaController;
use App\Http\Controllers\MorfemaController;

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

// Using array
Route::get('/', [DiccionarioController::class, 'index'])->name('diccionario.index');
//Route::post('/buscar', 'DiccionarioController@buscar');

Route::post('/buscar', [DiccionarioController::class, 'buscar'])->name('diccionario.buscar');
//Route::get('/postura/{id}', 'PosturaController@detalle');
Route::get('/postura/{id}', [PosturaController::class, 'detalle'])->name('postura.detalle');
Route::post('/postura', [PosturaController::class, 'store'])->name('posturas.store');
Route::post('/morfema', [MorfemaController::class, 'store'])->name('morfemas.store');


