@extends('layouts.template')

@section('titulo', 'Perfil')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal"
                    data-target="#addModal" hidden><i class="fas fa-plus-circle m-1" data-toggle="tooltip"
                        data-placement="top" title="Incluir item"></i>{{ __('Novo') }}</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Perfil') }}</h1>
        </div>

        @php
        //dd(bcrypt('12345'));
        @endphp

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Usuário Logado') }}</h6>
            </div>
            <div class="card-body">
                <div class="container-fluid mt-3 mb-3">
                    <div class="row d-flex justify-content-center">
                        {{-- <div class="col-3">
                            <div class="float-right">
                                <form action="/imageupdate" name="form_profile1" method="POST" enctype="multipart/form-data"
                                    autocomplete="off">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group d-flex flex-column justify-content-center align-items-center">
                                        <img class="img-profile rounded-circle" width="200px"
                                            src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->image)) }}">
                                        <br>
                                        <input type="file" class="form-control-file" id="profileimage" name="profileimage"
                                            accept="image/*">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div> --}}
                        <div class="col-3">
                            <div class="col">
                                <form action="/profile" name="form_profile" method="POST" id="form_profile" enctype="multipart/form-data"
                                    autocomplete="off">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group d-flex flex-column justify-content-center align-items-center">
                                        <img class="img-profile rounded-circle" width="200px"
                                            src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->image)) }}">
                                        <br>
                                        <input type="file" class="form-control-file" id="profileimage" name="profileimage"
                                            accept="image/*">
                                    </div>
                                    <div class="form-group" style="min-width: 200px">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                            aria-describedby="emailHelp">
                                        @if ($errors->has('senha'))
                                            <span class="help-block">
                                                <strong>{{--
                                                    --}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group" style="min-width: 200px">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            aria-describedby="emailHelp">
                                        @if ($errors->has('senha'))
                                            <span class="help-block">
                                                <strong>{{--
                                                    --}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group" style="min-width: 200px">
                                        <label for="atualpassword">Senha Atual*</label>
                                        <input type="password" class="form-control" id="atualpassword" autocomplete="off"
                                            min="5" name="atualpassword" required>
                                        @if ($errors->has('senha'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('senha') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group" style="min-width: 200px">
                                        <label for="newpassword">Nova Senha*</label>
                                        <input type="password" class="form-control" id="newpassword" autocomplete="off"
                                            min="5" name="newpassword">
                                        @if ($errors->has('senha'))
                                            <span class="help-block">
                                                <strong>{{--
                                                    --}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group" style="min-width: 200px">
                                        <label for="repeatnewpassword">Repetir Nova Senha*</label>
                                        <input type="password" class="form-control" id="repeatnewpassword"
                                            autocomplete="off" min="5">
                                        @if ($errors->has('senha'))
                                            <span class="help-block">
                                                <strong>{{--
                                                    --}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content Datatable -->
    </div>

@endsection

@section('script_pages')
    <script type="text/javascript">
        $(document).ready(function() {

            /*$("#atualpassword").change(function() {
                senhaatual = $("#atualpassword").val();
                senhadb = "$2y$10$GwRYES1UcPYKs/f9wfIdU.mXZJ4rPeYtNjTjH/tfIO27J2mntEQ";
                if (senhaatual == senhadb) {
                    //alert('senha atual ok');
                } else {
                    alert('senha atual não confere');
                    document.form_profile.atualpassword.focus();
                }

            });*/

            $("#newpassword").change(function() {
                param1 = $("#newpassword").val();
                param2 = $("#repeatnewpassword").val();
                if (param1 && param2) {
                    console.log(param1, param2);
                    validarSenha(param1, param2);
                }

            });

            $("#repeatnewpassword").change(function() {
                param1 = $("#newpassword").val();
                param2 = $("#repeatnewpassword").val();
                if (param1 && param2) {
                    console.log(param1, param2);
                    validarSenha(param1, param2);
                }
            });
        });

        function validarSenha(senha1, senha2) {
            if (senha1 == "" || senha2 == "") {
                alert('Nova Senha não Informada!');
            } else if (senha1 != senha2) {
                alert('senha diferentes');
            } else {
                //alert('senhas iguais');
            }
        }

    </script>

    @include('scripts.confirmdeletion')

@endsection
