<?php

namespace App\Http\Controllers;

use App\Models\AreaGrupoCliente;
use App\Models\Municipio;
use App\Models\GrupoCliente;
use App\Models\SegmentoCultura;
use Illuminate\Http\Request;

class AreaGrupoClienteController extends Controller
{
    private  $areagrupocliente;
    private  $municipio;
    private  $grupocliente;
    private  $segmentocultura;

    public function __construct()
    {
        $this->areagrupocliente = new AreaGrupoCliente();
        $this->municipio = new Municipio();
        $this->grupocliente = new GrupoCliente();
        $this->segmentocultura = new SegmentoCultura();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areagrupoclientes = $this->areagrupocliente::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $segmentoculturas = $this->segmentocultura::all()->sortBy('descricao');
        return view('areagrupocliente.content_areagrupocliente')
            ->with('areagrupoclientes', $areagrupoclientes)->with('municipios', $municipios)
            ->with('grupoclientes', $grupoclientes)->with('segmentoculturas', $segmentoculturas);
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
            'add-grupocliente' => 'required|numeric|min:1',
            'add-municipio' => 'required|numeric|min:1',
            'add-qtdunidadesarea' => 'required|numeric|min:1'
        ]);

        $areagrupoclientes =  new AreaGrupoCliente;
        $areagrupoclientes->qtdUnidadesArea = $request->input('add-qtdunidadesarea');
        $areagrupoclientes->grupocliente_id = $request->input('add-grupocliente');
        $areagrupoclientes->municipio_id = $request->input('add-municipio');
        $areagrupoclientes->segmentoCultura_id = $request->input('add-segmentocultura');

        $areagrupoclientes->save();

        return redirect('areagrupocliente')->with('success', 'Área por Grupo de Clientes salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areagrupocliente = AreaGrupoCliente::find($id);

        return $areagrupocliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUM(Request $request)
    {
        $segmentocultura = SegmentoCultura::find($request->all())->first();
        //dd($segmentocultura);
        return ['unidadeMedida', $segmentocultura->unidadeMedida];
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
            'up-grupocliente' => 'required|min:1',
            'up-municipio' => 'required|min:1',
            'up-qtdunidadesarea' => 'required|min:1'
        ]);

        $areagrupoclientes =  AreaGrupoCliente::find($id);
        $areagrupoclientes->qtdUnidadesArea = $request->input('up-qtdunidadesarea');
        $areagrupoclientes->grupocliente_id = $request->input('up-grupocliente');
        $areagrupoclientes->municipio_id = $request->input('up-municipio');
        $areagrupoclientes->segmentoCultura_id = $request->input('up-segmentocultura');

        $areagrupoclientes->save();

        return redirect('areagrupocliente')->with('success', 'Área por Grupo de Clientes alterado com sucesso!');
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
            $areagrupoclientes =  AreaGrupoCliente::find($id);
            $areagrupoclientes->delete();
            //return redirect('areagrupocliente')->with('success', 'Área por Grupo de Clientes excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
