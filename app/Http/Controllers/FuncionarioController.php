<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Pessoa;
use App\Models\PFisica;
use App\Models\Email;
use App\Models\Municipio;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    private $funcionario;
    private $cargo;
    private $pessoa;
    private $pf;
    private $email;
    private $municipio;

    public function __construct()
    {
        $this->funcionario = new Funcionario();
        $this->cargo = new Cargo();
        $this->pessoa = new Pessoa();
        $this->pf = new PFisica();
        $this->email = new Email();
        $this->municipio = new Municipio();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = $this->funcionario::all()->sortBy('nome');
        $cargos =  $this->cargo::all();
        $pessoas =  $this->pessoa::all();
        $pfs = $this->pf::all();
        $emails = $this->email::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        return view('funcionario.content_funcionario')->with('funcionarios', $funcionarios)->with('cargos', $cargos)
            ->with('pessoas', $pessoas)->with('pfs', $pfs)->with('email', $emails)->with('municipios', $municipios);
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

        $funcionarios =  new Funcionario;
        $funcionarios->nome = $request->input('add-funcionario');
        $funcionarios->microrregiao_id = $request->input('add-microrregiao');

        $funcionarios->save();

        return redirect('funcionario')->with('success', 'Funcionário salvo com sucesso!');*/
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
            'up-funcionario' => 'required|max:45',
            'up-microrregiao' => 'required|integer'
        ]);

        $funcionarios =  Funcionario::find($id);
        $funcionarios->nome = $request->input('up-funcionario');
        $funcionarios->microrregiao_id = $request->input('up-microrregiao');

        $funcionarios->save();

        return redirect('funcionario')->with('success', 'Funcionário alterado com sucesso!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*try {
            $funcionarios =  Funcionario::find($id);
            $funcionarios->delete();
            //return redirect('funcionario')->with('success', 'Funcionário excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}*/
    }
}
