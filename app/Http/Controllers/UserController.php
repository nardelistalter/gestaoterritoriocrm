<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    private $user;
    private $cargo;
    private $municipio;

    public function __construct()
    {
        $this->user = new User();
        $this->cargo = new Cargo();
        $this->municipio = new Municipio();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user::all()->sortBy('nome');
        $cargos =  $this->cargo::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        return view('user.content_user')->with('users', $users)->with('cargos', $cargos)->with('municipios', $municipios);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('user.profile_user');
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
        /*$this->validate($request, [
            'add-nome' => 'required|max:60',
            'add-logradouro' => 'required|max:120',
            'add-numero' => 'required|max:10',
            'add-complemento' => 'max:45',
            'add-bairro' => 'required|max:45',
            'add-telefone1' => 'required|max:15',
            'add-telefone2' => 'nullable|max:15',
            'add-cpf' => 'required|cpf',
            'add-dataNascimento' => 'required',
            'add-sexo' => 'max:15',
            'add-email' => 'required|max:255',
            'add-password' => 'required',
            'add-status' => '',
            'add-perfilAdministrador' => '',
            'add-ultimoAcesso' => '',
            'add-dataAdmissao' => 'required|date',
            'add-dataDemissao' => 'nullable|date',
            'add-municipio' => 'required|min:1',
            'add-gerente' => 'required|min:1',
            'add-cargo' => 'required|min:1',
        ]);

        $file = $request->input('add-image');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        $users =  new User;

        // .......
        $users->name = $request->input('add-user');
        $users->email = $request->input('add-email');
        $users->password = $request->input('add-password');
        $users->image = $img;
        $users->status = $request->input('add-user');
        $users->perfilAdministrador = $request->input('add-user');
        $users->funcionario_id = $request->input('add-funcionario');
        //.........

        $users->save();

        return redirect('user')->with('success', 'Usuário salvo com sucesso!');*/
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
        /*$this->validate($request, [
            'up-nickname' => 'required',
            'up-password' => 'required',
            'up-funcionario_id' => 'required',
            'up-email' => 'required'
        ]);

        $users =  User::find($id);
        $users->nome = $request->input('up-user');
        $users->funcionario_id = $request->input('up-funcionario');

        $users->save();

        return redirect('user')->with('success', 'Usuário alterado com sucesso!');*/
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
            $users =  User::find($id);
            $users->delete();
            //return redirect('user')->with('success', 'Usuário excluído com sucesso!');
            return ['status' => 'success'];
		} catch (\Illuminate\Database\QueryException $qe) {
			return ['status' => 'errorQuery', 'message' => $qe->getMessage()];
		} catch (\PDOException $e) {
			return ['status' => 'errorPDO', 'message' => $e->getMessage()];
		}
    }

    /**
     * Exibir imagem do usuário logado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image($id)
    {
        $user = User::find($id);

        $pic = Image::make($user->imagem);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type', 'image/jpeg');

        return $response;
    }
}
