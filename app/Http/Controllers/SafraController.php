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
            'add-safra' => 'required|max:45',
            'add-mesInicio' => 'required|numeric|min:1|max:12',
        ]);

        $safras =  $this->safra;
        $safras->descricao = $request->input('add-safra');
        $safras->mesInicio = $request->input('add-mesInicio');

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
            'up-safra' => 'required|max:45',
            'up-mesInicio' => 'required|numeric|min:1|max:12',
        ]);

        $safras =  $this->safra::find($id);
        $safras->descricao = $request->input('up-safra');
        $safras->mesInicio = $request->input('up-mesInicio');

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
        $safras = $this->safra::find($id);
        $safras->delete();
        return redirect('safra')->with('success', 'Safra excluída com sucesso!');
    }
}
