<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;

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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('estados', 'App\Http\Controllers\EstadoController');
Route::get('/estados', [EstadoController::class, 'showAll'])->name('estados.showAll');
Route::get('/estados/{id}', [EstadoController::class, 'destroy'])->name('estado.delete');
//Route::get('/estado/{$id}', [EstadoController::class, 'show'])->name('estado.show');

//Route::get('/estado/{id}', ['as' => 'estados.deletar', 'uses' => 'EstadoController@deletar']);
