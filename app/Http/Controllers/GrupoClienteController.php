<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GrupoCliente;
use Illuminate\Http\Request;

class GrupoClienteController extends Controller
{
    private  $grupocliente;
    private  $user;

    public function __construct()
    {
        $this->grupocliente = new GrupoCliente();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $users = $this->user::all()->sortBy('descricao');
        return view('grupocliente.content_grupocliente')->with('grupoclientes', $grupoclientes)->with('users', $users);
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
            'add-grupocliente' => 'required|max:45|unique:grupo_clientes,descricao',
            'add-user' => 'required|integer'
        ]);

        $grupoclientes =  new GrupoCliente;
        $grupoclientes->descricao = $request->input('add-grupocliente');
        $grupoclientes->user_id = $request->input('add-user');

        $grupoclientes->save();

        return redirect('grupocliente')->with('success', 'Grupo de Clientes salvo com sucesso!');
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
            'up-grupocliente' =>'required|max:45|unique:grupo_clientes,descricao,' . $id,
            'up-user' => 'required|integer'
        ]);

        $grupoclientes =  GrupoCliente::find($id);
        $grupoclientes->descricao = $request->input('up-grupocliente');
        $grupoclientes->user_id = $request->input('up-user');

        $grupoclientes->save();

        return redirect('grupocliente')->with('success', 'Grupo de Clientes alterado com sucesso!');
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
