<?php

namespace App\Http\Controllers;

use App\Models\SegmentoCultura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SegmentoCulturaController extends Controller
{
    private $segmentocultura;

    public function __construct()
    {
        $this->segmentocultura = new SegmentoCultura();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segmentoculturas = $this->segmentocultura::all()->sortBy('descricao');
        return view('segmentocultura.content_segmentocultura')->with('segmentoculturas', $segmentoculturas);
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
            'add-segmentocultura' => 'required|max:45',
            'add-unidadeMedida' => 'required|max:20'
        ]);

        $segmentoculturas =  $this->segmentocultura;
        $segmentoculturas->descricao = $request->input('add-segmentocultura');
        $segmentoculturas->unidadeMedida = $request->input('add-unidadeMedida');

        $segmentoculturas->save();

        return redirect('segmentocultura')->with('success', 'Segmento/Cultura salvo com sucesso!');
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
        $segmentoculturas = DB::table('segmento_culturas')->where('id', $id)->first();

        $this->validate($request, [
            'up-segmentocultura' => 'required|max:45',
            'up-unidadeMedida' => 'required|max:20'
        ]);

        $segmentoculturas =  $this->segmentocultura::find($id);
        $segmentoculturas->descricao = $request->input('up-segmentocultura');
        $segmentoculturas->unidadeMedida = $request->input('up-unidadeMedida');

        $segmentoculturas->save();

        return redirect('segmentocultura')->with('success', 'Segmento/Cultura alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $segmentoculturas = $this->segmentocultura::find($id);
        $segmentoculturas->delete();
        return redirect('segmentocultura')->with('success', 'Segmento/Cultura excluído com sucesso!');
    }
}
