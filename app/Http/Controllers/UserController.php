<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cargo;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Validator;
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
        $users = $this->user::all();
        $gerentes = DB::table('users')->where('cargo_id', 2)->get();
        
        $cargos =  $this->cargo::all();
        $municipios = $this->municipio::all()->sortBy('nome');
        return view('user.content_user')->with('users', $users)->with('cargos', $cargos)->with('municipios', $municipios)->with('gerentes', $gerentes);
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
        $this->validate($request, [
            'add-nome' => 'required|max:60',
            'add-logradouro' => 'required|max:120',
            'add-numero' => 'required|max:10',
            'add-complemento' => 'max:45',
            'add-bairro' => 'required|max:45',
            'add-telefone1' => 'required|max:15',
            'add-telefone2' => 'nullable|max:15',
            'add-cpf' => 'required|cpf',
            'add-datanascimento' => 'required|date',
            'add-sexo' => 'max:15',
            'add-image' => 'nullable',
            'add-email' => 'required|max:255',
            'add-status' => 'required|min:0|max:1',
            'add-perfiladministrador' => 'required|min:0|max:1',
            'add-dataadmissao' => 'required|date',
            'add-datademissao' => 'nullable|date',
            'add-municipio' => 'required|min:1',
            'add-gerente' => 'required|min:1',
            'add-cargo' => 'required|min:1',
        ]);

        /*
        if ($request->input('add-image')) {
            $file = $request->input('add-image');
            $img = Image::make($file);
            Response::make($img->encode('jpeg'));
        }*/

        $users =  new User;
        $users->nome = $request->input('add-nome');
        $users->logradouro = $request->input('add-logradouro');
        $users->numero = $request->input('add-numero');
        $users->complemento = $request->input('add-complemento');
        $users->bairro = $request->input('add-bairro');
        $users->telefone1 = $request->input('add-telefone1');
        $users->telefone2 = $request->input('add-telefone2');
        $users->cpf = $request->input('add-cpf');
        $users->email = $request->input('add-email');
        $users->dataNascimento = $request->input('add-datanascimento');
        $users->sexo = $request->input('add-sexo') ?? 'NÃO INFORMADO';
        $users->password = '12345';
        //$users->image = $img;
        $users->status = $request->input('add-status');
        $users->perfilAdministrador = $request->input('add-perfiladministrador');
        $users->municipio_id = $request->input('add-municipio');
        $users->cargo_id = $request->input('add-cargo');
        $users->gerente_id = $request->input('add-gerente');
        $users->dataAdmissao = $request->input('add-dataadmissao');
        $users->dataDemissao = $request->input('add-datademissao');

        $users->save();

        return redirect('user.content_user')->with('success', 'Usuário salvo com sucesso!');
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
            'up-nome' => 'required|max:60',
            'up-logradouro' => 'required|max:120',
            'up-numero' => 'required|max:10',
            'up-complemento' => 'max:45',
            'up-bairro' => 'required|max:45',
            'up-telefone1' => 'required|max:15',
            'up-telefone2' => 'nullable|max:15',
            'up-cpf' => 'required|cpf',
            'up-datanascimento' => 'required|date',
            'up-sexo' => 'max:15',
            'up-image' => 'nullable',
            'up-email' => 'required|max:255',
            'up-status' => 'required|min:0|max:1',
            'up-perfiladministrador' => 'required|min:0|max:1',
            'up-dataadmissao' => 'required|date',
            'up-datademissao' => 'nullable|date',
            'up-municipio' => 'required|min:1',
            'up-gerente' => 'required|min:1',
            'up-cargo' => 'required|min:1',
        ]);

        /*if ($request->input('up-image')) {
            $file = $request->input('up-image');
            $img = Image::make($file);
            Response::make($img->encode('jpeg'));
        }*/

        $users =  User::find($id);
        $users->nome = $request->input('up-nome');
        $users->logradouro = $request->input('up-logradouro');
        $users->numero = $request->input('up-numero');
        $users->complemento = $request->input('up-complemento');
        $users->bairro = $request->input('up-bairro');
        $users->telefone1 = $request->input('up-telefone1');
        $users->telefone2 = $request->input('up-telefone2');
        $users->cpf = $request->input('up-cpf');
        $users->email = $request->input('up-email');
        $users->dataNascimento = $request->input('up-datanascimento');
        $users->sexo = $request->input('up-sexo') ?? 'NÃO INFORMADO';
        //$users->image = $img;
        $users->status = $request->input('up-status');
        $users->perfilAdministrador = $request->input('up-perfiladministrador');
        $users->municipio_id = $request->input('up-municipio');
        $users->cargo_id = $request->input('up-cargo');
        $users->gerente_id = $request->input('up-gerente');
        $users->dataAdmissao = $request->input('up-dataadmissao');
        $users->dataDemissao = $request->input('up-datademissao');
        $users->save();

        return redirect('usuario')->with('success', 'Usuário alterado com sucesso!');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        $data = $request->all();
        auth()->user('id');
        dd(auth()->user('id'));
    }
}
