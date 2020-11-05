@extends('layouts.access-template')

@section('access-content')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
    </div>

    {{--
    @if (isset($message) && $message == Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif--}}

    <!-- Exibe erros no formulário -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Fim erros no formulário -->

    <form class="user" action="{{ route('checklogin') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="inputEmail" name="inputEmail"
                aria-describedby="emailHelp" placeholder="E-mail">
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="inputPassword" name="inputPassword"
                placeholder="Senha">
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label class="custom-control-label" for="customCheck">Lembre-me</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="{{ url('recuperar-senha') }}">Esqueceu a senha?</a>
    </div>

@endsection
