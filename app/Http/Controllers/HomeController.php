<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GrupoCliente;
use App\Models\GrupoProduto;
use App\Models\Safra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class HomeController extends Controller
{

    private $user;
    private $gerente;
    private $grupocliente;
    private $grupoproduto;
    private $safra;

    public function __construct()
    {
        $this->grupocliente = new GrupoCliente();
        $this->grupoproduto = new GrupoProduto();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->where('cargo_id', 3)->get();
        $gerentes = DB::table('users')->where('cargo_id', 2)->get();
        //dd($gerente);
        $grupoclientes = $this->grupocliente::all()->sortBy('descricao');
        $grupoprodutos = $this->grupoproduto::all()->sortBy('descricao');
        $safras = DB::table('safras')->orderBy('descricao', 'desc')->get();
        //dd($safras);
        /*$potencialacesso = DB::table('grupo_clientes')
            ->select(DB::raw('sum(s.qtdUnidadesArea * p.valorUnitario)'))
            ->where('code', 'LIKE', '64%')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/

        return view('home')->with('users', $users)->with('gerentes', $gerentes)
            ->with('grupoclientes', $grupoclientes)->with('grupoprodutos', $grupoprodutos)->with('safras', $safras);
    }

    /**
     * Login page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Forgot password page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function forgot_password()
    {
        return view('forgot-password');
    }

    /**
     * Password page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        //dd($user);

        if ($user == null) {
            return redirect()->back()->with(['error' => 'Email não cadastrado!']);
        }

        /*$user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);*/

        return redirect()->back()->with(['success' => 'Chave de recuperação enviada com sucesso! Verifique seu e-mail']);
    }

    /**
     * Email send
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($user, $code)
    {
        /*Mail::send(
            'email.forgot',
            ['user' => $user, 'code' => $code],
            function($message) use ($user) {
                $message->to($user->email);
                $message->subject("Olá $user->nickname, redefina sua senha.");
            }
        );*/
    }


    /**
     * Login page redirect
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function checklogin(Request $request)
    {
        $this->validate($request, [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:5'
        ]);

        $dados = $request->all();

        if (Auth::attempt(['email' => $dados['inputEmail'], 'password' => $dados['inputPassword']])) {
            return redirect()->route('home');
        } else {
            return redirect('login')->with('error', 'Login não permitido! Verifique e-mail ou senha!');
            //return redirect('login');
        }
    }

    /**
     * Login page redirect
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
