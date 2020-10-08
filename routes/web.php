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


Route::get('login', 'App\Http\Controllers\HomeController@login')->name('login');
Route::get('recuperar-senha', 'App\Http\Controllers\HomeController@forgot_password')->name('recuperar-senha');
Route::post('checklogin', 'App\Http\Controllers\HomeController@checklogin')->name('checklogin');
Route::get('logout', 'App\Http\Controllers\HomeController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('estado', 'App\Http\Controllers\EstadoController');
    Route::resource('microrregiao', 'App\Http\Controllers\MicrorregiaoController');
    Route::resource('cargo', 'App\Http\Controllers\CargoController');
});




