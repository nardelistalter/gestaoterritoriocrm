<?php

namespace App\Http\Controllers;

use App\Models\Operacao;
use App\Models\Produto;
use App\Models\InscricaoEstadual;
use Illuminate\Http\Request;

class OperacaoController extends Controller
{
    private $operacao;
    private $produto;
    private $inscricaoestadual;

    public function __construct()
    {
        $this->operacao = new Operacao();
        $this->produto = new Produto();
        $this->inscricaoestadual = new InscricaoEstadual();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operacaos = $this->operacao::all();
        $produtos = $this->produto::all()->sortBy('descricao');
        $inscricaoestaduals = $this->inscricaoestadual::all()->sortBy('numero');
        return view('operacao.content_operacao')->with('operacaos', $operacaos)
            ->with('produtos', $produtos)->with('inscricaoestaduals', $inscricaoestaduals);
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
            'add-data' => 'required|date',
            'add-numerodocumento' => 'required|max:15',
            'add-qtdunidadesproduto' => 'required|numeric|min:0',
            'add-valorunitario' => 'required|numeric|min:0',
            'add-produto' => 'required|numeric|min:1',
            'add-inscricaoestadual' => 'required|numeric|min:1',
        ]);

        $operacaos =  new Operacao;
        $operacaos->data = $request->input('add-data');
        $operacaos->numeroDocumento = $request->input('add-numerodocumento');
        $operacaos->qtdUnidadesProduto = $request->input('add-qtdunidadesproduto');
        $operacaos->valorUnitario = $request->input('add-valorunitario');
        $operacaos->produto_id = $request->input('add-produto');
        $operacaos->inscricaoEstadual_id = $request->input('add-inscricaoestadual');

        $operacaos->save();

        return redirect('operacao')->with('success', 'Operação salva com sucesso!');
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
            'up-data' => 'required|date',
            'up-numerodocumento' => 'required|max:15',
            'up-qtdunidadesproduto' => 'required|numeric|min:0',
            'up-valorunitario' => 'required|numeric|min:0',
            'up-produto' => 'required|numeric|min:1',
            'up-inscricaoestadual' => 'required|numeric|min:1',
        ]);

        $operacaos = Operacao::find($id);
        $operacaos->data = $request->input('up-data');
        $operacaos->numeroDocumento = $request->input('up-numerodocumento');
        $operacaos->qtdUnidadesProduto = $request->input('up-qtdunidadesproduto');
        $operacaos->valorUnitario = $request->input('up-valorunitario');
        $operacaos->produto_id = $request->input('up-produto');
        $operacaos->inscricaoEstadual_id = $request->input('up-inscricaoestadual');

        $operacaos->save();

        return redirect('operacao')->with('success', 'Operação alterada com sucesso!');
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
            $operacaos =  Operacao::find($id);
            $operacaos->delete();
            //return redirect('operacao')->with('success', 'Operação excluída com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
