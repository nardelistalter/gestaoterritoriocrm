<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoController extends Controller
{
    private $estado;

    public function __construct()
    {
        $this->estado = new Estado();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = $this->estado::all()->sortBy('nome');
        return view('estado.content_estado')->with('estados', $estados);
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
            //'estado' => ['required', 'unique:estados, nome,' . $request->id, 'max:45'],
            'add-estado' => 'required|max:45',
            'add-sigla' => ['required', 'max:2']
        ]);

        $estados =  $this->estado;
        $estados->nome = $request->input('add-estado');
        $estados->sigla = $request->input('add-sigla');

        $estados->save();

        return redirect('estado')->with('success', 'Estado salvo com sucesso!');
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
        $estado = DB::table('estados')->where('id', $id)->first();

        $this->validate($request, [
            'up-estado' => ['required', 'max:45'],
            'up-sigla' => ['required', 'max:2']
        ]);

        $estados =  $this->estado::find($id);
        $estados->nome = $request->input('up-estado');
        $estados->sigla = $request->input('up-sigla');

        $estados->save();

        return redirect('estado')->with('success', 'Estado alterado com sucesso!');
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
            $estados = $this->estado::find($id);
            $estados->delete();
            //return redirect('estado')->with('success', 'Estado excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'error', 'message' => $qe->getMessage()];
		}
    }
}
