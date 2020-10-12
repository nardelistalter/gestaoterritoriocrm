<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
//use Intervention\Image\Facades\Image;
use Faker\Provider\Image;


class UserController extends Controller
{
    private  $user;
    private  $funcionario;

    public function __construct()
    {
        $this->user = new User();
        $this->funcionario = new Funcionario();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user::all()->sortBy('nome');
        $funcionarios = $this->funcionario::all()->sortBy('nome');
        return view('user.content_user')->with('users', $users)->with('funcionarios', $funcionarios);
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
            'add-nickname' => 'required',
            'add-password' => 'required',
            'add-funcionario_id' => 'required',
            'add-email' => 'required'
        ]);

        $file = $request->input('add-image');
        $img = Image:: make($file);
        Response::make($img->encode('jpeg'));

        $users =  new User;
        $users->nickname = $request->input('add-user');
        $users->email = $request->input('add-email');
        $users->password = $request->input('add-password');
        $users->image = $img;
        $users->status = $request->input('add-user');
        $users->perfilAdministrador = $request->input('add-user');
        $users->funcionario_id = $request->input('add-funcionario');

        $users->save();

        return redirect('user')->with('success', 'Microrregião salva com sucesso!');
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
            'up-nickname' => 'required',
            'up-password' => 'required',
            'up-funcionario_id' => 'required',
            'up-email' => 'required'
        ]);

        $users =  User::find($id);
        $users->nome = $request->input('up-user');
        $users->funcionario_id = $request->input('up-funcionario');

        $users->save();

        return redirect('user')->with('success', 'Microrregião alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users =  User::find($id);
        $users->delete();
        return redirect('user')->with('success', 'Microrregião excluída com sucesso!');
    }
}
