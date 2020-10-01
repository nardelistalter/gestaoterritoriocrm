@extends('templates.access-template')

@section('access-content')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
    </div>
    <form class="user" action="{{--  --}}" method="POST">
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="inputEmail" aria-describedby="emailHelp"
                placeholder="Insira seu e-mail...">
        </div>
        <a href="#" class="btn btn-primary btn-user btn-block">
            Redefinir Senha
        </a>
    </form>
    <hr>

    <div class="text-center">
        <a class="small" href="{{ url('login') }}">Já tem uma conta? Conecte-se!</a>
    </div>

@endsection
