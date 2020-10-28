<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\GrupoCliente;
use Illuminate\Http\Request;

class GrupoClienteController extends Controller
{
    private  $grupocliente;
    private  $funcionario;

    public function __construct()
    {
        $this->grupocliente = new GrupoCliente();
        $this->funcionario = new Funcionario();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $funcionarios = $this->funcionario::all()->sortBy('descricao');
        return view('grupocliente.content_grupocliente')->with('grupoclientes', $grupoclientes)->with('funcionarios', $funcionarios);
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
            'add-grupocliente' => 'required|max:45',
            'add-funcionario' => 'required|integer'
        ]);

        $grupoclientes =  new GrupoCliente;
        $grupoclientes->descricao = $request->input('add-grupocliente');
        $grupoclientes->funcionario_id = $request->input('add-funcionario');

        $grupoclientes->save();

        return redirect('grupocliente')->with('success', 'Grupo de clientes salvo com sucesso!');
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
            'up-grupocliente' =>'required|max:45',
            'up-funcionario' => 'required|integer'
        ]);

        $grupoclientes =  GrupoCliente::find($id);
        $grupoclientes->descricao = $request->input('up-grupocliente');
        $grupoclientes->funcionario_id = $request->input('up-funcionario');

        $grupoclientes->save();

        return redirect('grupocliente')->with('success', 'Grupo de clientes alterado com sucesso!');
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
            $grupoclientes =  GrupoCliente::find($id);
            $grupoclientes->delete();
            //return redirect('grupocliente')->with('success', 'Grupo de clientes excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
