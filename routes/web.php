<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('municipio', 'App\Http\Controllers\MunicipioController');
    Route::resource('cargo', 'App\Http\Controllers\CargoController');
    Route::resource('safra', 'App\Http\Controllers\SafraController');
    Route::resource('grupoproduto', 'App\Http\Controllers\GrupoProdutoController');
    Route::resource('produto', 'App\Http\Controllers\ProdutoController');
    Route::resource('visaopolitica', 'App\Http\Controllers\VisaoPoliticaController');
    Route::resource('segmentocultura', 'App\Http\Controllers\SegmentoCulturaController');
    Route::resource('programadenegocio', 'App\Http\Controllers\ProgramaDeNegocioController');
    Route::resource('unidadesarea', 'App\Http\Controllers\UnidadesAreaController');
    Route::resource('usuario', 'App\Http\Controllers\UserController');
    Route::resource('grupocliente', 'App\Http\Controllers\GrupoClienteController');
    Route::resource('areagrupocliente', 'App\Http\Controllers\AreaGrupoClienteController');
    Route::resource('inscricaoestadual', 'App\Http\Controllers\InscricaoEstadualController');
    Route::resource('operacao', 'App\Http\Controllers\OperacaoController');
    Route::get('usuario/{id}/image', 'App\Http\Controllers\UserController@image');
    Route::get('areagrupocliente/showUM/{id}', 'App\Http\Controllers\AreaGrupoClienteController@showUM')->name('showUM');
});




