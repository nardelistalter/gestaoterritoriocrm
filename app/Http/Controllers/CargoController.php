<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    private $cargo;

    public function __construct()
    {
        $this->cargo = new Cargo();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = $this->cargo::all()->sortBy('descricao');
        return view('cargo.content_cargo')->with('cargos', $cargos);
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
            'add-cargo' => 'required|max:45|unique:cargos,descricao',
        ]);

        $cargos =  $this->cargo;
        $cargos->descricao = $request->input('add-cargo');

        $cargos->save();

        return redirect('cargo')->with('success', 'Cargo salvo com sucesso!');
    }

    public function getValidate() {
        return [
            'add-cargo' => 'required|max:45|unique:cargos,descricao',
        ];
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
        $cargo = DB::table('cargos')->where('id', $id)->first();

        $this->validate($request, [
            'up-cargo' => 'required|max:45|unique:cargos,descricao,'. $id,
        ]);

        $cargos =  $this->cargo::find($id);
        $cargos->descricao = $request->input('up-cargo');

        $cargos->save();

        return redirect('cargo')->with('success', 'Cargo alterado com sucesso!');
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
            $cargos = $this->cargo::find($id);
            $cargos->delete();
            return ['status' => 'success'];
        } catch (\Illuminate\Database\QueryException $qe) {
            return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
        } catch (\PDOException $e) {
            return ['status' => 'errorPDO', 'message' => $e->getMessage()];
        }
    }
}