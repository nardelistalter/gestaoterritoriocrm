<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function login() {
        return view('login');
    }

    public function forgot_password () {
        return view('forgot-password');
    }

    function checklogin(Request $request) {
        $this->validate($request, [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:5'
        ]);

        $dados = $request->all();

        if(Auth::attempt(['email'=> $dados['inputEmail'], 'password'=>$dados['inputPassword']])){
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Login não permitido!');;
        }
    }

    function logout() {
        Auth::logout();
        return redirect('login');
    }
}
