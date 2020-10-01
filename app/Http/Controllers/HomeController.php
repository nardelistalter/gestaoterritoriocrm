<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /*function checklogin(Request $request) {
        $this->validate($request, [
            'inputEmail' => 'required|email',
            'inputPassword' => 'required|min:5'
        ]);

        $user_data = array(
            'email' => $request->get('inputEmail'),
            'password' =>  md5($request->get('inputPassword'))
        );

        if(Auth::attempt($user_data)) {
            echo "Entrou aqui!";
            die();
            return redirect('home');
        } else {
            return view('home');
            return back()->with('error', 'Erro ao efetuar login!');
        }
    }*/

    function logout() {
        Auth::logout();
        return redirect('login');
    }
}
