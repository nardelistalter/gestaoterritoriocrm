<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Safra;
use App\Models\GrupoCliente;
use App\Models\GrupoProduto;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    private  $meta;
    private  $safra;
    private  $grupocliente;
    private  $grupoproduto;

    public function __construct()
    {
        $this->meta = new Meta();
        $this->safra = new Safra();
        $this->grupocliente = new GrupoCliente();
        $this->grupoproduto = new GrupoProduto();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = $this->meta::all();
        $safras = $this->safra::all()->sortBy('descricao');
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        return view('meta.content_meta')
            ->with('metas', $metas)->with('safras', $safras)
            ->with('grupoclientes', $grupoclientes)->with('grupoprodutos', $grupoprodutos);
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
            'add-grupoproduto' => 'required|numeric|min:1',
            'add-grupocliente' => 'required|numeric|min:1',
            'add-safra' => 'required|numeric|min:1',
            'add-participacaodesejada' => 'required|numeric|min:1',
            'add-mes' => 'required|numeric|min:1|max:12',
            'add-ano' => 'required|numeric|min:1901|max:2100'
        ]);

        $metas =  new Meta;
        $metas->participacaoDesejada = $request->input('add-participacaodesejada');
        $metas->mes = $request->input('add-mes');
        $metas->ano = $request->input('add-ano');
        $metas->grupocliente_id = $request->input('add-grupocliente');
        $metas->safra_id = $request->input('add-safra');
        $metas->grupoproduto_id = $request->input('add-grupoproduto');

        $metas->save();

        return redirect('meta')->with('success', 'Meta salva com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meta = Meta::find($id);

        return $meta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUM(Request $request)
    {
        $grupoproduto = grupoproduto::find($request->all())->first();
        //dd($grupoproduto);
        return ['unidadeMedida', $grupoproduto->unidadeMedida];
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
            'up-grupoproduto' => 'required|min:1',
            'up-grupocliente' => 'required|min:1',
            'up-safra' => 'required|min:1',
            'up-participacaodesejada' => 'required|numeric|min:1',
            'up-mes' => 'required|numeric|min:1|max:12',
            'up-ano' => 'required|numeric|min:1901|max:2100'
        ]);

        $metas =  Meta::find($id);
        $metas->participacaoDesejada = $request->input('up-participacaodesejada');
        $metas->mes = $request->input('up-mes');
        $metas->ano = $request->input('up-ano');
        $metas->grupocliente_id = $request->input('up-grupocliente');
        $metas->safra_id = $request->input('up-safra');
        $metas->grupoproduto_id = $request->input('up-grupoproduto');

        $metas->save();

        return redirect('meta')->with('success', 'Meta alterada com sucesso!');
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
            $metas =  Meta::find($id);
            $metas->delete();
            //return redirect('meta')->with('success', 'Meta excluída com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
