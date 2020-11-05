@extends('layouts.access-template')

@section('access-content')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
    </div>
    <!-- Alert Start  -->

    @if ($errors->any())
    @php
        dd($errors);
    @endphp
    
        <!-- ou (count($errors) > 0)-->
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="toast-body">
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Alert End  -->
    <form id="forgotForm" class="user" action="{{ route('recuperar-senha') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp"
                placeholder="Insira seu e-mail...">
        </div>
        {{-- <a type="submit" form="forgotForm" class="btn btn-primary btn-user btn-block">
            Redefinir Senha
        </a> --}}
        <button type="submit" form="forgotForm"
            class="btn btn-primary btn-user btn-block">{{ __('Redefinir Senha') }}</button>
    </form>
    <hr>

    <div class="text-center">
        <a class="small" href="{{ url('login') }}">Já tem uma conta? Conecte-se!</a>
    </div>

@endsection
