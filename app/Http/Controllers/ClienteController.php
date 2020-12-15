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
        //dd($request);
        //dd($request['account']);
        //dd($request);
        //dd($request['custom_field']);
        dd($request['custom_field']);
        $this->validate($request, [
            'add-nome' => 'required|max:60',
            'add-logradouro' => 'required|max:120',
            'add-numero' => 'required|max:10',
            'add-complemento' => 'max:45',
            'add-bairro' => 'required|max:45',
            'add-telefone1' => 'required|max:15',
            'add-telefone2' => 'nullable|max:15',
            'add-cpf' => 'cpf|max:14|required_without:add-cnpj|unique:users,cpf',
            'add-cnpj' => 'cnpj|max:18|required_without:add-cpf|unique:users,cnpj',
            'add-email' => 'nullable|max:255',
            'add-datanascimento' => 'nullable|date',
            'add-sexo' => 'nullable|max:15',
            'add-observacao' => 'nullable|max:255',
            'add-municipio' => 'required|min:1',
        ]);

        $clientes =  new Cliente;
        $clientes->nome = $request->input('add-nome');
        $clientes->logradouro = $request->input('add-logradouro');
        $clientes->numero = $request->input('add-numero');
        $clientes->complemento = $request->input('add-complemento');
        $clientes->bairro = $request->input('add-bairro');
        $clientes->telefone1 = $request->input('add-telefone1');
        $clientes->telefone2 = $request->input('add-telefone2');
        $clientes->cpf = $request->input('add-cpf');
        $clientes->cnpj = $request->input('add-cnpj');
        $clientes->email = $request->input('add-email');
        $clientes->dataNascimento = $request->input('add-datanascimento');
        $clientes->sexo = $request->input('up-sexo') ?? 'NÃO INFORMADO';
        $clientes->observacao = $request->input('add-observacao');
        $clientes->visaoPolitica_id = $request->input('add-visaopolitica');
        $clientes->municipio_id = $request->input('add-municipio');

        $clientes->save();

        return redirect('cliente')->with('success', 'Cliente salvo com sucesso!');
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
            'up-nome' => 'required|max:60',
            'up-logradouro' => 'required|max:120',
            'up-numero' => 'required|max:10',
            'up-complemento' => 'max:45',
            'up-bairro' => 'required|max:45',
            'up-telefone1' => 'required|max:15',
            'up-telefone2' => 'nullable|max:15',
            'up-cpf' => 'cpf|max:14|required_without:up-cnpj|unique:users,cpf'. $id,
            'up-cnpj' => 'max:18|required_without:up-cpf|unique:users,cnpj'. $id,
            'up-email' => 'nullable|max:255',
            'up-datanascimento' => 'nullable|date',
            'up-sexo' => 'nullable|max:15',
            'up-observacao' => 'nullable|max:255',
            'up-municipio' => 'required|min:1',
        ]);

        $clientes =  Cliente::find($id);
        $clientes->nome = $request->input('up-nome');
        $clientes->logradouro = $request->input('up-logradouro');
        $clientes->numero = $request->input('up-numero');
        $clientes->complemento = $request->input('up-complemento');
        $clientes->bairro = $request->input('up-bairro');
        $clientes->telefone1 = $request->input('up-telefone1');
        $clientes->telefone2 = $request->input('up-telefone2');
        $clientes->cpf = $request->input('up-cpf');
        $clientes->cnpj = $request->input('up-cnpj');
        $clientes->email = $request->input('up-email');
        $clientes->dataNascimento = $request->input('up-datanascimento');
        $clientes->sexo = $request->input('up-sexo') ?? 'NÃO INFORMADO';
        $clientes->observacao = $request->input('up-observacao');
        $clientes->visaoPolitica_id = $request->input('up-visaopolitica');
        $clientes->municipio_id = $request->input('up-municipio');

        $clientes->save();

        return redirect('cliente')->with('success', 'Cliente alterado com sucesso!');
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
