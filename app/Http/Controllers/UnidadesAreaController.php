<?php

namespace App\Http\Controllers;

use App\Models\UnidadesArea;
use App\Models\Estado;
use App\Models\Microrregiao;
use App\Models\Municipio;
use App\Models\SegmentoCultura;
use Illuminate\Http\Request;

class UnidadesAreaController extends Controller
{
    private  $unidadesarea;
    private  $municipio;
    private  $microrregiao;
    private  $estado;
    private  $segmentocultura;

    public function __construct()
    {
        $this->unidadesarea = new UnidadesArea();
        $this->municipio = new Municipio();
        $this->microrregiao = new Microrregiao();
        $this->estado = new Estado();
        $this->segmentocultura = new SegmentoCultura();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadesareas = $this->unidadesarea::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        $microrregioes = $this->microrregiao::all()->sortBy('nome');
        $estados = $this->estado::all()->sortBy('nome');
        $segmentoculturas = $this->segmentocultura::all()->sortBy('descricao');
        return view('unidadesarea.content_unidadesarea')->with('unidadesareas', $unidadesareas)
            ->with('municipios', $municipios)->with('segmentoculturas', $segmentoculturas)
            ->with('microrregioes', $microrregioes)->with('estados', $estados);
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
            'add-qtdarea' => 'required|numeric|min:0',
            'add-unidademedida' => 'required|max:45',
            'add-mktsharedesejado' => 'required|numeric|min:0|max:100',
            'add-municipio' => 'required|numeric|min:1',
            'add-segmentocultura' => 'required|numeric|min:1',
        ]);

        $unidadesareas =  new UnidadesArea;
        $unidadesareas->qtdArea = $request->input('add-qtdarea');
        $unidadesareas->unidadeMedida = $request->input('add-unidademedida');
        $unidadesareas->mktShareDesejado = $request->input('add-mktsharedesejado');
        $unidadesareas->observacao = $request->input('add-observacao');
        $unidadesareas->municipio_id = $request->input('add-municipio');
        $unidadesareas->segmentoCultura_id = $request->input('add-segmentocultura');

        $unidadesareas->save();

        return redirect('unidadesarea')->with('success', 'Unidade de Área salvo com sucesso!');
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
            'up-qtdarea' => 'required|numeric|min:0',
            'up-unidademedida' => 'required|max:45',
            'up-mktsharedesejado' => 'required|numeric|min:0|max:100',
            'up-municipio' => 'required|numeric|min:1',
            'up-segmentocultura' => 'required|numeric|min:1',
        ]);

        $unidadesareas = UnidadesArea::find($id);
        $unidadesareas->qtdArea = $request->input('up-qtdarea');
        $unidadesareas->unidadeMedida = $request->input('up-unidademedida');
        $unidadesareas->mktShareDesejado = $request->input('up-mktsharedesejado');
        $unidadesareas->observacao = $request->input('up-observacao');
        $unidadesareas->municipio_id = $request->input('up-municipio');
        $unidadesareas->segmentoCultura_id = $request->input('up-segmentocultura');

        $unidadesareas->save();

        return redirect('unidadesarea')->with('success', 'Unidade de Área alterado com sucesso!');
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
            $unidadesareas =  UnidadesArea::find($id);
            $unidadesareas->delete();
            //return redirect('unidadesarea')->with('success', 'Unidade de Área excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
