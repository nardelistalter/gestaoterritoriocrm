<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
