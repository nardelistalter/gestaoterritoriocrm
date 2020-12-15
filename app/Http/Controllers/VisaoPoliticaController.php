<?php

namespace App\Http\Controllers;

use App\Models\VisaoPolitica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisaoPoliticaController extends Controller
{
    private $visaopolitica;

    public function __construct()
    {
        $this->visaopolitica = new VisaoPolitica();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visaopoliticas = $this->visaopolitica::all()->sortBy('descricao');
        return view('visaopolitica.content_visaopolitica')->with('visaopoliticas', $visaopoliticas);
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
            'add-visaopolitica' => 'required|max:45|unique:visao_politicas,descricao',
        ]);

        $visaopoliticas =  $this->visaopolitica;
        $visaopoliticas->descricao = $request->input('add-visaopolitica');

        $visaopoliticas->save();

        return redirect('visaopolitica')->with('success', 'Visão Política salva com sucesso!');
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
        $visaopolitica = DB::table('visao_politicas')->where('id', $id)->first();

        $this->validate($request, [
            'up-visaopolitica' => ['required', 'max:45', 'unique:visao_politicas,descricao,' . $id],
        ]);

        $visaopoliticas =  $this->visaopolitica::find($id);
        $visaopoliticas->descricao = $request->input('up-visaopolitica');

        $visaopoliticas->save();

        return redirect('visaopolitica')->with('success', 'Visão Política alterada com sucesso!');
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
            $visaopoliticas = $this->visaopolitica::find($id);
            $visaopoliticas->delete();
            //return redirect('visaopolitica')->with('success', 'Visão Política excluída com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
