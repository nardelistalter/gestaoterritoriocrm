<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Safra;
use App\Models\GrupoCliente;
use App\Models\ProgramaDeNegocio;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    private  $meta;
    private  $safra;
    private  $grupocliente;
    private  $programadenegocio;

    public function __construct()
    {
        $this->meta = new Meta();
        $this->safra = new Safra();
        $this->grupocliente = new GrupoCliente();
        $this->programadenegocio = new ProgramaDeNegocio();
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
        $programadenegocios = $this->programadenegocio::all();
        return view('meta.content_meta')
            ->with('metas', $metas)->with('safras', $safras)
            ->with('grupoclientes', $grupoclientes)->with('programadenegocios', $programadenegocios);
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
            'add-programadenegocio' => 'required|numeric|min:1',
            'add-grupocliente' => 'required|numeric|min:1',
            'add-metadesejada' => 'required|numeric|min:1',
            'add-dataprevista' => 'required|date'
        ]);

        $metas =  new Meta;
        $metas->metaDesejada = $request->input('add-metadesejada');
        $metas->dataPrevista = $request->input('add-dataprevista');
        $metas->grupocliente_id = $request->input('add-grupocliente');
        $metas->programaDeNegocio_id = $request->input('add-programadenegocio');

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
        $programadenegocio = programadenegocio::find($request->all())->first();
        //dd($programadenegocio);
        return ['unidadeMedida', $programadenegocio->unidadeMedida];
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
            'up-programadenegocio' => 'required|min:1',
            'up-grupocliente' => 'required|min:1',
            'up-metadesejada' => 'required|numeric|min:1',
            'up-dataprevista' => 'required|date'
        ]);

        $metas =  Meta::find($id);
        $metas->metaDesejada = $request->input('up-metadesejada');
        $metas->dataPrevista = $request->input('up-dataprevista');
        $metas->grupocliente_id = $request->input('up-grupocliente');
        $metas->programaDeNegocio_id = $request->input('up-programadenegocio');

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
