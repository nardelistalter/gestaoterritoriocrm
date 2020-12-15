<?php

namespace App\Http\Controllers;

use App\Models\GrupoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoProdutoController extends Controller
{
    private $grupoproduto;

    public function __construct()
    {
        $this->grupoproduto = new GrupoProduto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        return view('grupoproduto.content_grupoproduto')->with('grupoprodutos', $grupoprodutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'add-grupoproduto' => 'required|max:45|unique:grupo_produtos,descricao',
            'add-unidadeMedida' => 'required|max:20'
        ]);

        $grupoprodutos =  $this->grupoproduto;
        $grupoprodutos->descricao = $request->input('add-grupoproduto');
        $grupoprodutos->unidadeMedida = $request->input('add-unidadeMedida');

        $grupoprodutos->save();

        return redirect('grupoproduto')->with('success', 'Grupo de Produtos salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupoprodutos = DB::table('grupo_produtos')->where('id', $id)->first();

        $this->validate($request, [
            'up-grupoproduto' => 'required|max:45|unique:grupo_produtos,descricao,' . $id,
            'up-unidadeMedida' => 'required|max:20'
        ]);

        $grupoprodutos =  $this->grupoproduto::find($id);
        $grupoprodutos->descricao = $request->input('up-grupoproduto');
        $grupoprodutos->unidadeMedida = $request->input('up-unidadeMedida');

        $grupoprodutos->save();

        return redirect('grupoproduto')->with('success', 'Grupo de Produtos alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $grupoprodutos = $this->grupoproduto::find($id);
            $grupoprodutos->delete();
            //return redirect('grupoproduto')->with('success', 'Grupo de Produtos excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
