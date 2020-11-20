<?php

namespace App\Http\Controllers;

use App\Models\ProgramaDeNegocio;
use App\Models\Safra;
use App\Models\GrupoProduto;
use App\Models\SegmentoCultura;
use Illuminate\Http\Request;

class ProgramaDeNegocioController extends Controller
{
    private  $programadenegocio;
    private  $safra;
    private  $grupoproduto;
    private  $segmentocultura;

    public function __construct()
    {
        $this->programadenegocio = new ProgramaDeNegocio();
        $this->safra = new Safra();
        $this->grupoproduto = new GrupoProduto();
        $this->segmentocultura = new SegmentoCultura();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programadenegocios = $this->programadenegocio::all();
        $safras = $this->safra::all()->sortBy('descricao');
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        $segmentoculturas = $this->segmentocultura::all()->sortBy('descricao');
        return view('programadenegocio.content_programadenegocio')
            ->with('programadenegocios', $programadenegocios)->with('safras', $safras)
            ->with('grupoprodutos', $grupoprodutos)->with('segmentoculturas', $segmentoculturas);
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
            'add-segmentocultura' => 'required|numeric|min:1',
            'add-grupoproduto' => 'required|numeric|min:1',
            'add-safra' => 'required|numeric|min:1',
            'add-valorunitario' => 'required|numeric|min:1',
            'add-datalimite' => 'required|date'
        ]);

        $programadenegocios =  new ProgramaDeNegocio;
        $programadenegocios->dataLimite = $request->input('add-datalimite');
        $programadenegocios->valorUnitario = $request->input('add-valorunitario');
        $programadenegocios->grupoProduto_id = $request->input('add-grupoproduto');
        $programadenegocios->safra_id = $request->input('add-safra');
        $programadenegocios->segmentoCultura_id = $request->input('add-segmentocultura');

        $programadenegocios->save();

        return redirect('programadenegocio')->with('success', 'Programa de Negócio salvo com sucesso!');
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
            'up-segmentocultura' => 'required|min:1',
            'up-grupoproduto' => 'required|min:1',
            'up-safra' => 'required|min:1',
            'up-valorunitario' => 'required|min:1',
            'up-datalimite' => 'required|date'
        ]);

        $programadenegocios =  ProgramaDeNegocio::find($id);
        $programadenegocios->dataLimite = $request->input('up-datalimite');
        $programadenegocios->valorUnitario = $request->input('up-valorunitario');
        $programadenegocios->grupoProduto_id = $request->input('up-grupoproduto');
        $programadenegocios->safra_id = $request->input('up-safra');
        $programadenegocios->segmentoCultura_id = $request->input('up-segmentocultura');

        $programadenegocios->save();

        return redirect('programadenegocio')->with('success', 'Programa de Negócio alterado com sucesso!');
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
            $programadenegocios =  ProgramaDeNegocio::find($id);
            $programadenegocios->delete();
            //return redirect('programadenegocio')->with('success', 'Programa de Negócio excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
