<?php

namespace App\Http\Controllers;

use App\Models\InscricaoEstadual;
use App\Models\Municipio;
use App\Models\GrupoCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class InscricaoEstadualController extends Controller
{
    private  $inscricaoestadual;
    private  $municipio;
    private  $grupocliente;
    private  $cliente;

    public function __construct()
    {
        $this->inscricaoestadual = new InscricaoEstadual();
        $this->municipio = new Municipio();
        $this->grupocliente = new GrupoCliente();
        $this->cliente = new Cliente();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscricaoestaduals = $this->inscricaoestadual::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $clientes = $this->cliente::all()->sortBy('id');
        return view('inscricaoestadual.content_inscricaoestadual')
            ->with('inscricaoestaduals', $inscricaoestaduals)->with('municipios', $municipios)
            ->with('grupoclientes', $grupoclientes)->with('clientes', $clientes);
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
            'add-cliente' => 'required|numeric|min:1',
            'add-grupocliente' => 'required|numeric|min:1',
            'add-municipio' => 'required|numeric|min:1',
            'add-numero' => 'required|max:45',
            'add-localidade' => 'required|max:100'
        ]);

        $inscricaoestaduals =  new InscricaoEstadual;
        $inscricaoestaduals->numero = $request->input('add-numero');
        $inscricaoestaduals->localidade = $request->input('add-localidade');
        $inscricaoestaduals->grupocliente_id = $request->input('add-grupocliente');
        $inscricaoestaduals->municipio_id = $request->input('add-municipio');
        $inscricaoestaduals->cliente_id = $request->input('add-cliente');

        $inscricaoestaduals->save();

        return redirect('inscricaoestadual')->with('success', 'Inscrição Estadual salva com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscricaoestadual = InscricaoEstadual::find($id);

        return $inscricaoestadual;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUM($id)
    {
        $inscricaoestadual = InscricaoEstadual::find($id);
        return $inscricaoestadual->unidadeMedida;
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
            'up-cliente' => 'required|numeric|min:1',
            'up-grupocliente' => 'required|numeric|min:1',
            'up-municipio' => 'required|numeric|min:1',
            'up-numero' => 'required|max:45',
            'up-localidade' => 'required|max:100'
        ]);

        $inscricaoestaduals =  InscricaoEstadual::find($id);
        $inscricaoestaduals->numero = $request->input('up-numero');
        $inscricaoestaduals->localidade = $request->input('up-localidade');
        $inscricaoestaduals->grupocliente_id = $request->input('up-grupocliente');
        $inscricaoestaduals->municipio_id = $request->input('up-municipio');
        $inscricaoestaduals->cliente_id = $request->input('up-cliente');

        $inscricaoestaduals->save();

        return redirect('inscricaoestadual')->with('success', 'Inscrição Estadual alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscricaoestaduals =  InscricaoEstadual::find($id);
        $inscricaoestaduals->delete();
        return redirect('inscricaoestadual')->with('success', 'Inscrição Estadual excluída com sucesso!');
    }
}
