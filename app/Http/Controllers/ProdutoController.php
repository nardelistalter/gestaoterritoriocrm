<?php

namespace App\Http\Controllers;

use App\Models\GrupoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private  $produto;
    private  $grupoproduto;

    public function __construct()
    {
        $this->produto = new Produto();
        $this->grupoproduto = new GrupoProduto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto::all()->sortBy('descricao');
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        return view('produto.content_produto')->with('produtos', $produtos)->with('grupoprodutos', $grupoprodutos);
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
            'add-produto' => 'required',
            'add-grupoproduto' => 'required'
        ]);

        $produtos =  new Produto;
        $produtos->descricao = $request->input('add-produto');
        $produtos->grupoProduto_id = $request->input('add-grupoproduto');

        $produtos->save();

        return redirect('produto')->with('success', 'Produto salvo com sucesso!');
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
        $this->validate($request, [
            'up-produto' => ['required', 'max:45'],
            'up-grupoproduto' => ['required', 'integer']
        ]);

        $produtos =  Produto::find($id);
        $produtos->descricao = $request->input('up-produto');
        $produtos->grupoProduto_id = $request->input('up-grupoproduto');

        $produtos->save();

        return redirect('produto')->with('success', 'Produto alterado com sucesso!');
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
            $produtos =  Produto::find($id);
            $produtos->delete();
            //return redirect('produto')->with('success', 'Produto excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
