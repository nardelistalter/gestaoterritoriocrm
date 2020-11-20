<?php

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

Route::get('login', 'App\Http\Controllers\HomeController@login')->name('login');
Route::get('recuperar-senha', 'App\Http\Controllers\HomeController@forgot_password')->name('recuperar-senha');
Route::post('recuperar-senha', 'App\Http\Controllers\HomeController@password')->name('recuperar-senha');
Route::post('checklogin', 'App\Http\Controllers\HomeController@checklogin')->name('checklogin');
Route::get('logout', 'App\Http\Controllers\HomeController@logout')->name('logout');

/**
 * Grupo de rotas que necessitam de usuário autenticado
 * Route::resource: cria todas as rotas das funções padrões do controller
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('perfil');
    Route::resource('estado', 'App\Http\Controllers\EstadoController');
    Route::get('estado/{id}/destroy', 'App\Http\Controllers\EstadoController@destroy');
    Route::resource('microrregiao', 'App\Http\Controllers\MicrorregiaoController');
    Route::get('microrregiao/{id}/destroy', 'App\Http\Controllers\MicrorregiaoController@destroy');
    Route::resource('municipio', 'App\Http\Controllers\MunicipioController');
    Route::get('municipio/{id}/destroy', 'App\Http\Controllers\MunicipioController@destroy');
    Route::resource('cargo', 'App\Http\Controllers\CargoController');
    Route::get('cargo/{id}/destroy', 'App\Http\Controllers\CargoController@destroy');
    Route::resource('safra', 'App\Http\Controllers\SafraController');
    Route::get('safra/{id}/destroy', 'App\Http\Controllers\SafraController@destroy');
    Route::resource('grupoproduto', 'App\Http\Controllers\GrupoProdutoController');
    Route::get('grupoproduto/{id}/destroy', 'App\Http\Controllers\GrupoProdutoController@destroy');
    Route::resource('produto', 'App\Http\Controllers\ProdutoController');
    Route::get('produto/{id}/destroy', 'App\Http\Controllers\ProdutoController@destroy');
    Route::resource('visaopolitica', 'App\Http\Controllers\VisaoPoliticaController');
    Route::get('visaopolitica/{id}/destroy', 'App\Http\Controllers\VisaoPoliticaController@destroy');
    Route::resource('segmentocultura', 'App\Http\Controllers\SegmentoCulturaController');
    Route::get('segmentocultura/{id}/destroy', 'App\Http\Controllers\SegmentoCulturaController@destroy');
    Route::resource('programadenegocio', 'App\Http\Controllers\ProgramaDeNegocioController');
    Route::get('programadenegocio/{id}/destroy', 'App\Http\Controllers\ProgramaDeNegocioController@destroy');
    Route::resource('unidadesarea', 'App\Http\Controllers\UnidadesAreaController');
    Route::get('unidadesarea/{id}/destroy', 'App\Http\Controllers\UnidadesAreaController@destroy');
    Route::resource('usuario', 'App\Http\Controllers\UserController');
    Route::get('user/{id}/destroy', 'App\Http\Controllers\UserController@destroy');
    Route::resource('grupocliente', 'App\Http\Controllers\GrupoClienteController');
    Route::get('grupocliente/{id}/destroy', 'App\Http\Controllers\GrupoClienteController@destroy');
    Route::resource('areagrupocliente', 'App\Http\Controllers\AreaGrupoClienteController');
    Route::get('areagrupocliente/{id}/destroy', 'App\Http\Controllers\AreaGrupoClienteController@destroy');
    Route::post('areagrupocliente/showUM', 'App\Http\Controllers\AreaGrupoClienteController@showUM')->name('showUM');
    Route::resource('inscricaoestadual', 'App\Http\Controllers\InscricaoEstadualController');
    Route::get('inscricaoestadual/{id}/destroy', 'App\Http\Controllers\InscricaoEstadualController@destroy');
    Route::resource('operacao', 'App\Http\Controllers\OperacaoController');
    Route::get('operacao/{id}/destroy', 'App\Http\Controllers\OperacaoController@destroy');
    Route::resource('cliente', 'App\Http\Controllers\ClienteController');
    Route::get('cliente/{id}/destroy', 'App\Http\Controllers\OperacaoController@destroy');
    Route::resource('meta', 'App\Http\Controllers\MetaController');
    Route::get('meta/{id}/destroy', 'App\Http\Controllers\MetaController@destroy');
    Route::get('usuario/{id}/image', 'App\Http\Controllers\UserController@image');
});




