<?php

namespace App\Http\Controllers;

use App\Models\Safra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SafraController extends Controller
{
    private $safra;

    public function __construct()
    {
        $this->safra = new Safra();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $safras = $this->safra::all()->sortBy('descricao');
        return view('safra.content_safra')->with('safras', $safras);
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
            'add-safra' => 'required|max:45|unique:safras,descricao',
            'add-datainicio' => 'required|date',
            'add-datafim' => 'required|date',
        ]);

        $safras =  $this->safra;
        $safras->descricao = $request->input('add-safra');
        $safras->dataInicio = $request->input('add-datainicio');
        $safras->dataFim = $request->input('add-datafim');

        $safras->save();

        return redirect('safra')->with('success', 'Safra salva com sucesso!');
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
        $safra = DB::table('safras')->where('id', $id)->first();

        $this->validate($request, [
            'up-safra' => 'required|max:45|unique:safras,descricao,' . $id,
            'up-datafim' => 'required|date',
            'up-datafim' => 'required|date',
        ]);

        $safras =  $this->safra::find($id);
        $safras->descricao = $request->input('up-safra');
        $safras->dataInicio = $request->input('up-datainicio');
        $safras->dataFim = $request->input('up-datafim');

        $safras->save();

        return redirect('safra')->with('success', 'Safra alterada com sucesso!');
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
            $safras = $this->safra::find($id);
            $safras->delete();
            //return redirect('safra')->with('success', 'Safra excluída com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }
}
