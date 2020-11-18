<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\VisaoPolitica;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $cliente;
    private $visaopolitica;
    private $municipio;

    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->visaopolitica = new VisaoPolitica();
        $this->municipio = new Municipio();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->cliente::all()->sortBy('nome');
        $visaopoliticas =  $this->visaopolitica::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        return view('cliente.content_cliente')->with('clientes', $clientes)->with('visaopoliticas', $visaopoliticas)->with('municipios', $municipios);
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
        /*$this->validate($request, [
            'add-nome' => 'required|max:60',
            'add-logradouro' => 'required|max:120',
            'add-numero' => 'required|max:10',
            'add-complemento' => 'max:45',
            'add-bairro' => 'required|max:45',
            'add-telefone1' => 'required|max:15',
            'add-telefone2' => 'max:15',
            'add-municipio' => 'required|min:1',
        ]);

        $clientes =  new Cliente;
        $clientes->nome = $request->input('add-cliente');
        $clientes->microrregiao_id = $request->input('add-microrregiao');

        $clientes->save();

        return redirect('cliente')->with('success', 'Cliente salvo com sucesso!');*/
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
        /*$this->validate($request, [
            'up-cliente' => 'required|max:45',
            'up-microrregiao' => 'required|integer'
        ]);

        $clientes =  Cliente::find($id);
        $clientes->nome = $request->input('up-cliente');
        $clientes->microrregiao_id = $request->input('up-microrregiao');

        $clientes->save();

        return redirect('cliente')->with('success', 'Cliente alterado com sucesso!');*/
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
            $clientes =  Cliente::find($id);
            $clientes->delete();
            //return redirect('cliente')->with('success', 'Cliente excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
