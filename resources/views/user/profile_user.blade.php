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

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Usuário Logado') }}</h6>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-group d-flex flex-column justify-content-center align-items-center">
                                    <img class="img-profile rounded-circle"  width="200px"
                                        src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->image)) }}">
                                        <br>
                                    <label for="exampleFormControlFile1">Alterar Imagem</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>
                        </div>
                        <div class="col-9">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome</label>
                                    <input type="text" class="form-control" id="exampleInputName"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Senha Atual</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nova Senha</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Repetir Nova Senha</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
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

    </script>

    @include('scripts.confirmdeletion')

@endsection
