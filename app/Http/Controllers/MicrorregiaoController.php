<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Microrregiao;
use Illuminate\Http\Request;

class MicrorregiaoController extends Controller
{
    private  $microrregiao;
    private  $estado;

    public function __construct()
    {
        $this->microrregiao = new Microrregiao();
        $this->estado = new Estado();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microrregioes = $this->microrregiao::all()->sortBy('nome');
        $estados = $this->estado::all()->sortBy('nome');
        return view('microrregiao.content_microrregiao')->with('microrregioes', $microrregioes)->with('estados', $estados);
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
            'add-microrregiao' => 'required|unique:microrregiaos,nome',
            'add-estado' => 'required'
        ]);

        $microrregioes =  new Microrregiao;
        $microrregioes->nome = $request->input('add-microrregiao');
        $microrregioes->estado_id = $request->input('add-estado');

        $microrregioes->save();

        return redirect('microrregiao')->with('success', 'Microrregião salva com sucesso!');
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
            'form-microrregiao' => ['required', 'max:45', 'unique:microrregiaos,nome,' . $id],
            'form-estado' => ['required', 'integer']
        ]);

        $microrregioes = Microrregiao::find($id);
        $microrregioes->nome = $request->input('form-microrregiao');
        $microrregioes->estado_id = $request->input('form-estado');

        $microrregioes->save();

        return redirect('microrregiao')->with('success', 'Microrregião alterada com sucesso!');
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
            $microrregioes =  Microrregiao::find($id);
            $microrregioes->delete();
            //return redirect('microrregiao')->with('success', 'Microrregião excluída com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
