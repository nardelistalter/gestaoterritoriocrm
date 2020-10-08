<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Microrregiao;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    private  $municipio;
    private  $microrregiao;
    private  $estado;

    public function __construct()
    {
        $this->municipio = new Municipio();
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
        $municipios = $this->municipio::all()->sortBy('nome');
        $microrregioes = $this->microrregiao::all()->sortBy('nome');
        $estados = $this->estado::all()->sortBy('nome');
        return view('municipio.content_municipio')->with('municipios', $municipios)->with('microrregioes', $microrregioes)->with('estados', $estados);
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
            'add-municipio' => 'required',
            'add-microrregiao' => 'required'
        ]);

        $municipios =  new Municipio;
        $municipios->nome = $request->input('add-municipio');
        $municipios->microrregiao_id = $request->input('add-microrregiao');

        $municipios->save();

        return redirect('municipio')->with('success', 'Município salvo com sucesso!');
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
            'up-municipio' => ['required', 'max:45'],
            'up-microrregiao' => ['required', 'integer']
        ]);

        $municipios =  Municipio::find($id);
        $municipios->nome = $request->input('up-municipio');
        $municipios->microrregiao_id = $request->input('up-microrregiao');

        $municipios->save();

        return redirect('municipio')->with('success', 'Município alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipios =  Municipio::find($id);
        $municipios->delete();
        return redirect('municipio')->with('success', 'Município excluído com sucesso!');
    }
}
