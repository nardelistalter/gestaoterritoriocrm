<?php

use Illuminate\Support\Facades\Route;
use resources\css;
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
    return view('welcome');
});*/


Route::get('/', function () {
    return view('index');
});

/**
* CSS
*/
//Route::get('resources_css', 'resources\ccs');

/*Route::get('/cliente', function () {
    return view('cliente');
});*/


Route::get('/estados', [EstadoController::class, 'showAll'])->name('estados.showAll');
/*

Route::get('/microrregioes', [MicrorregiaoController::class, 'showAll'])->name('microrregioes.showAll');
Route::get('/municipios', [MunicipioController::class, 'showAll'])->name('municipios.showAll');
Route::get('/segmentoculturas', [SegmentoCulturaController::class, 'showAll'])->name('segmentoculturas.showAll');
Route::get('/unidadesarea', [UnidadesAreaController::class, 'showAll'])->name('unidadesarea.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');
Route::get('/grupoprodutos', [GrupoProdutoController::class, 'showAll'])->name('grupoprodutos.showAll');


*/
