@extends('layouts.template')

@section('titulo', 'Usuários')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal"
                    data-target="#addModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir item"></i>{{ __('Novo') }}</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Usuários') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Usuários') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableUser" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome de Usuário</th>
                                <th class="th-sm border-bottom border-left">E-mail</th>
                                <th class="th-sm border-bottom border-left">Cargo</th>
                                <th class="th-sm border-bottom border-left">Ativo</th>
                                <th class="th-sm border-bottom border-left">Admin</th>
                                <th class="th-sm border-bottom border-left">Foto</th>
                                <th style="display: none;">logradouro</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th style="display: none;">bairro</th>
                                <th style="display: none;">municipio_fk</th>
                                <th style="display: none;">telefone1</th>
                                <th style="display: none;">telefone2</th>
                                <th style="display: none;">email</th>
                                <th style="display: none;">cpf</th>
                                <th id="date" style="display: none;" type="datetime-local">Nasc/Fund</th>
                                <th style="display: none;">dataNasc</th>
                                <th style="display: none;">Sexo</th>
                                <th class="th-sm border-bottom border-left">Gerente</th>
                                <th style="display: none;">gerente_fk</th>
                                <th style="display: none;">dataAdmissao_data</th>
                                <th style="display: none;">dataAdmissao</th>
                                <th style="display: none;">dataDemissao_data</th>
                                <th style="display: none;">dataDemissao</th>
                                <th style="display: none;">cargo_fk</th>
                                <th style="display: none;">status_cod</th>
                                <th style="display: none;">perfiladministrador_cod</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @php
                                $cargo = $user->find($user->id)->cargo;
                                $gerente = $user->find($user->id)->user;
                                //dd($gerente);
                                $municipio = $user->find($user->id)->municipio;
                                $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $user->id }}</th>
                                    <td class="align-middle border-left">{{ $user->nome }}</td>
                                    <td class="align-middle border-left">{{ $user->email }}</td>
                                    <td class="align-middle border-left">{{ $cargo->descricao }}</td>
                                    <td class="align-middle border-left">{{ $user->status == 1 ? 'Sim' : 'Não' }}</td>
                                    <td class="align-middle border-left">
                                        {{ $user->perfilAdministrador == 1 ? 'Sim' : 'Não' }}
                                    </td>
                                    <td class="align-middle border-left">
                                        @if (!$user->image)
                                            <img class="img-fluid rounded-circle" width="30px" height="auto"
                                                src="{{ URL::to('img/default.png') }}">
                                        @else
                                            <img class="img-fluid rounded-circle" width="30px" height="auto"
                                                src="data:image/png;base64,{{ chunk_split(base64_encode($user->image)) }}">
                                        @endif
                                    </td>
                                    <td class="align-middle" style="display: none;">{{ $user->logradouro }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->numero }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->complemento }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->bairro }}</td>
                                    <td class="align-middle" style="display: none;">
                                        {{ $municipio->nome }}/{{ $estado->sigla }}
                                    </td>
                                    <td class="align-middle" style="display: none;">{{ $user->municipio_id }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->telefone1 }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->telefone2 }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->cpf }}</td>
                                    <td class="align-middle" style="display: none;">
                                        {{ date('d/m/Y', strtotime($user->dataNascimento)) ?? '' }}
                                    </td>
                                    <td style="display: none;">{{ $user->dataNascimento }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->sexo }}</td>
                                    <td class="align-middle border-left">{{ $gerente->nome ?? '' }}</td>
                                    <td class="align-middle" style="display: none;">{{ $user->gerente_id ?? '' }}</td>
                                    <td class="align-middle" style="display: none;">
                                        {{ date('d/m/Y', strtotime($user->dataAdmissao)) ?? '' }}
                                    </td>
                                    <td style="display: none;">{{ $user->dataAdmissao }}</td>
                                    <td class="align-middle" style="display: none;">
                                        {{ date('d/m/Y', strtotime($user->dataDemissao)) ?? '' }}
                                    </td>
                                    <td style="display: none;">{{ $user->dataDemissao }}</td>
                                    <td style="display: none;">{{ $cargo->id }}</td>
                                    <td style="display: none;">{{ $user->status }}</td>
                                    <td style="display: none;">{{ $user->perfilAdministrador }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $user->id }}, '{{ $user->nome }} - {{ $user->email }}', '{{ strtolower(class_basename($user)) }}');"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome de Usuário</th>
                                <th class="th-sm border-bottom border-left">E-mail</th>
                                <th class="th-sm border-bottom border-left">Cargo</th>
                                <th class="th-sm border-bottom border-left">Ativo</th>
                                <th class="th-sm border-bottom border-left">Admin</th>
                                <th class="th-sm border-bottom border-left">Foto</th>
                                <th style="display: none;">logradouro</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th style="display: none;">bairro</th>
                                <th style="display: none;">municipio_fk</th>
                                <th style="display: none;">telefone1</th>
                                <th style="display: none;">telefone2</th>
                                <th style="display: none;">email</th>
                                <th style="display: none;">cpf</th>
                                <th id="date" style="display: none;" type="datetime-local">Nasc/Fund</th>
                                <th style="display: none;">dataNasc</th>
                                <th style="display: none;">Sexo</th>
                                <th class="th-sm border-bottom border-left">Gerente</th>
                                <th style="display: none;">gerente_fk</th>
                                <th style="display: none;">dataAdmissao_data</th>
                                <th style="display: none;">dataAdmissao</th>
                                <th style="display: none;">dataDemissao_data</th>
                                <th style="display: none;">dataDemissao</th>
                                <th style="display: none;">cargo_fk</th>
                                <th style="display: none;">status_cod</th>
                                <th style="display: none;">perfiladministrador_cod</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Content Datatable -->
    </div>
    <!-- Begin Page Content -->


    <!-- Start Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">
                        {{ __('Nova Funcionário/Usuário') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\UserController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-nome">Nome*</label>
                            <input type="text" class="form-control" id="add-nome" name="add-nome" maxlength="60" required>
                            <span class="text-danger" id="add-nomeError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-logradouro">Logradouro*</label>
                            <input type="text" class="form-control" id="add-logradouro" name="add-logradouro"
                                maxlength="120" required>
                            <span class="text-danger" id="add-logradouroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-numero">Número*</label>
                            <input type="text" class="form-control" id="add-numero" name="add-numero" style="width: 130px;"
                                maxlength="10" required>
                            <span class="text-danger" id="add-numeroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-complemento">Complemento</label>
                            <input type="text" class="form-control" id="add-complemento" name="add-complemento"
                                style="width: 350px;" maxlength="45">
                            <span class="text-danger" id="add-complementoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-bairro">Bairro*</label>
                            <input type="text" class="form-control" id="add-bairro" name="add-bairro" style="width: 350px;"
                                maxlength="45" required>
                            <span class="text-danger" id="add-bairroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-municipio">Município*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-municipio"
                                name="add-municipio" required>
                                <option value="">Selecione...</option>
                                @foreach ($municipios as $municipio)
                                    @php
                                    $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                    $estado = $microrregiao->find($microrregiao->id)->estado;
                                    @endphp
                                    <option value={{ $municipio->id }}> {{ $municipio->nome }}/{{ $estado->sigla }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-municipioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-telefone1">Telefone 1*</label>
                            <input type="text" class="form-control" id="add-telefone1" name="add-telefone1"
                                style="width: 155px;" maxlength="15" required>
                            <span class="text-danger" id="add-telefone1Error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-telefone2">Telefone 2</label>
                            <input type="text" class="form-control" id="add-telefone2" name="add-telefone2"
                                style="width: 155px;" maxlength="15">
                            <span class="text-danger" id="add-telefone2Error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-email">E-mail</label>
                            <input type="email" class="form-control" id="add-email" name="add-email">
                            <span class="text-danger" id="add-emailError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-cpf">CPF*</label>
                            <input type="cpf" class="form-control" id="add-cpf" name="add-cpf"
                                style="text-align: right; width: 155px;" maxlength="14">
                            <span class="text-danger" id="add-cpfError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-datanascimento">Data Nascimento*</label>
                            <input type="date" class="form-control" id="add-datanascimento" name="add-datanascimento"
                                style="width: 170px;" required>
                            <span class="text-danger" id="add-datanascimentoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-sexo">Sexo</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-sexo" name="add-sexo"
                                style="width: 200px;">
                                <option value="">Selecione...</option>
                                <option value="FEMININO">FEMININO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="NÃO INFORMADO">NÃO INFORMADO</option>
                            </select>
                            <span class="text-danger" id="add-sexoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-cargo">Cargo*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-cargo"
                                name="add-cargo">
                                <option value="">Selecione...</option>
                                @foreach ($cargos as $cargo)
                                    <option value={{ $cargo->id }}> {{ $cargo->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-cargoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-gerente">Gerente</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-gerente"
                                name="add-gerente">
                                <option value="">Selecione...</option>
                                @foreach ($gerentes as $gerente)
                                    <option value={{ $gerente->id }}> {{ $gerente->nome }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-cargoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-dataadmissao">Data Admissão*</label>
                            <input type="date" class="form-control" id="add-dataadmissao" name="add-dataadmissao"
                                style="width: 170px;" required>
                            <span class="text-danger" id="add-dataadmissaoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-datademissao">Data Demissão</label>
                            <input type="date" class="form-control" id="add-datademissao" name="add-datademissao"
                                style="width: 170px;">
                            <span class="text-danger" id="add-datademissaoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-status">Ativo</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-status"
                                name="add-status" style="width: 200px;">
                                <option value="">Selecione...</option>
                                <option value="1">SIM</option>
                                <option value="0">NÃO</option>
                            </select>
                            <span class="text-danger" id="add-statusError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-perfiladministrador">Administrador</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-perfiladministrador"
                                name="add-perfiladministrador" style="width: 200px;">
                                <option value="">Selecione...</option>
                                <option value="1">SIM</option>
                                <option value="0">NÃO</option>
                            </select>
                            <span class="text-danger" id="add-perfiladministradorError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                    <button type="submit" form="addForm" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Start EDIT Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">
                        {{ 'Alterar Funcionário/Usuário' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/usuario" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-nome">Nome*</label>
                            <input type="text" class="form-control" id="up-nome" name="up-nome" maxlength="60" required>
                            <span class="text-danger" id="up-nomeError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-logradouro">Logradouro*</label>
                            <input type="text" class="form-control" id="up-logradouro" name="up-logradouro" maxlength="120"
                                required>
                            <span class="text-danger" id="up-logradouroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-numero">Número*</label>
                            <input type="text" class="form-control" id="up-numero" name="up-numero" style="width: 130px;"
                                maxlength="10" required>
                            <span class="text-danger" id="up-numeroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-complemento">Complemento</label>
                            <input type="text" class="form-control" id="up-complemento" name="up-complemento"
                                style="width: 350px;" maxlength="45">
                            <span class="text-danger" id="up-complementoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-bairro">Bairro*</label>
                            <input type="text" class="form-control" id="up-bairro" name="up-bairro" style="width: 350px;"
                                maxlength="45" required>
                            <span class="text-danger" id="up-bairroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-municipio">Município*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-municipio"
                                name="up-municipio" required>
                                @foreach ($municipios as $municipio)
                                    @php
                                    $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                    $estado = $microrregiao->find($microrregiao->id)->estado;
                                    @endphp
                                    <option value={{ $municipio->id }}> {{ $municipio->nome }}/{{ $estado->sigla }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-municipioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-telefone1">Telefone 1*</label>
                            <input type="text" class="form-control" id="up-telefone1" name="up-telefone1"
                                style="width: 155px;" maxlength="15" required>
                            <span class="text-danger" id="up-telefone1Error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-telefone2">Telefone 2</label>
                            <input type="text" class="form-control" id="up-telefone2" name="up-telefone2"
                                style="width: 155px;" maxlength="15">
                            <span class="text-danger" id="up-telefone2Error"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-email">E-mail</label>
                            <input type="email" class="form-control" id="up-email" name="up-email">
                            <span class="text-danger" id="up-emailError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-cpf">CPF*</label>
                            <input type="cpf" class="form-control" id="up-cpf" name="up-cpf"
                                style="text-align: right; width: 155px;" maxlength="14">
                            <span class="text-danger" id="up-cpfError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-datanascimento">Data Nascimento*</label>
                            <input type="date" class="form-control" id="up-datanascimento" name="up-datanascimento"
                                style="width: 170px;" required>
                            <span class="text-danger" id="up-datanascimentoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-sexo">Sexo</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-sexo" name="up-sexo"
                                style="width: 200px;">
                                <option value="FEMININO">FEMININO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="NÃO INFORMADO">NÃO INFORMADO</option>
                            </select>
                            <span class="text-danger" id="up-sexoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-cargo">Cargo*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-cargo" name="up-cargo">
                                @foreach ($cargos as $cargo)
                                    <option value={{ $cargo->id }}> {{ $cargo->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-cargoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-gerente">Gerente</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-gerente"
                                name="up-gerente">
                                @foreach ($gerentes as $gerente)
                                    <option value={{ $gerente->id }}> {{ $gerente->nome }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-cargoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-dataadmissao">Data Admissão*</label>
                            <input type="date" class="form-control" id="up-dataadmissao" name="up-dataadmissao"
                                style="width: 170px;" required>
                            <span class="text-danger" id="up-dataadmissaoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-datademissao">Data Demissão</label>
                            <input type="date" class="form-control" id="up-datademissao" name="up-datademissao"
                                style="width: 170px;">
                            <span class="text-danger" id="up-datademissaoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-status">Ativo</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-status"
                                name="up-status" style="width: 200px;">
                                <option value="1">SIM</option>
                                <option value="0">NÃO</option>
                            </select>
                            <span class="text-danger" id="up-statusError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-perfiladministrador">Administrador</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-perfiladministrador"
                                name="up-perfiladministrador" style="width: 200px;">
                                <option value="1">SIM</option>
                                <option value="0">NÃO</option>
                            </select>
                            <span class="text-danger" id="up-perfiladministradorError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                    <button type="submit" form="editForm" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End EDIT Modal -->

    <!-- Start VIEW Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">
                        {{ __('Ver Funcionário/Usuário') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        <div class="form-group">
                            <label class="mb-0" for="v-id">id</label>
                            <input type="text" class="form-control" id="v-id" name="v-id"
                                style="text-align: center; width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-nome">Nome</label>
                            <input type="text" class="form-control" id="v-nome" name="v-nome" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-logradouro">Logradouro</label>
                            <input type="text" class="form-control" id="v-logradouro" name="v-logradouro" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-numero">Número</label>
                            <input type="text" class="form-control" id="v-numero" name="v-numero" style="width: 130px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-complemento">Complemento</label>
                            <input type="text" class="form-control" id="v-complemento" name="v-complemento"
                                style="width: 350px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-bairro">Bairro</label>
                            <input type="text" class="form-control" id="v-bairro" name="v-bairro" style="width: 350px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-municipio">Município/UF</label>
                            <input type="text" class="form-control" id="v-municipio" name="v-municipio" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-telefone1">Telefone 1</label>
                            <input type="text" class="form-control" id="v-telefone1" name="v-telefone1"
                                style="width: 155px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-telefone2">Telefone 2</label>
                            <input type="text" class="form-control" id="v-telefone2" name="v-telefone2"
                                style="width: 155px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-email">E-mail</label>
                            <input type="text" class="form-control" id="v-email" name="v-email" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-cpf">CPF</label>
                            <input type="text" class="form-control" id="v-cpf" name="v-cpf" style="width: 190px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-datanascimento">Data Nascimento/Fundação</label>
                            <input type="text" class="form-control" id="v-datanascimento" name="v-datanascimento"
                                style="width: 130px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-sexo">Sexo</label>
                            <input type="text" class="form-control" id="v-sexo" name="v-sexo" style="width: 180px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-cargo">Cargo</label>
                            <input type="text" class="form-control" id="v-cargo" name="v-cargo" style="width: 255px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-gerente">Gerente</label>
                            <input type="text" class="form-control" id="v-gerente" name="v-gerente" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-dataadmissao">Data Admissão</label>
                            <input type="text" class="form-control" id="v-dataadmissao" name="v-dataadmissao"
                                style="width: 130px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-datademissao">Data Demissão</label>
                            <input type="text" class="form-control" id="v-datademissao" name="v-datademissao"
                                style="width: 130px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-status">Ativo</label>
                            <input type="text" class="form-control" id="v-status" name="v-status" style="width: 70px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-perfiladministrador">Administrador</label>
                            <input type="text" class="form-control" id="v-perfiladministrador" name="v-perfiladministrador"
                                style="width: 70px;" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Sair"><i class="fas fa-undo-alt mr-1"></i>{{ __('Sair') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End VIEW Modal -->

    <!-- Start DELETE Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Produto') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/usuario" method="POST" id="deleteForm">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div id="delete-modal-body">
                            <!-- Content Jquery -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i
                            class="fas fa-undo-alt mr-1"></i>{{ __('Não') }}</button>
                    <button type="submit" form="deleteForm" class="btn btn-danger"><i
                            class="fas fa-trash-alt mr-1"></i>{{ __('Sim') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End DELETE Modal -->

@endsection

@section('script_pages')

    <script type="text/javascript">
        // Usuários
        $(document).ready(function() {

            var table = $('#datatableUser').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $("select[name='up-municipio'] option[value='" + data[12] + "']").attr('selected',
                    'selected');
                $("select[name='up-municipio'] option[value='" + data[12] + "']").text(data[11]);

                $("select[name='up-cargo'] option[value='" + data[25] + "']").attr('selected',
                    'selected');
                $("select[name='up-cargo'] option[value='" + data[25] + "']").text(data[3]);

                $("select[name='up-gerente'] option[value='" + data[20] + "']").attr('selected',
                    'selected');
                $("select[name='up-gerente'] option[value='" + data[20] + "']").text(data[19]);

                $("select[name='up-status'] option[value='" + data[26] + "']").attr('selected',
                    'selected');
                $("select[name='up-status'] option[value='" + data[26] + "']").text(data[4]);

                $("select[name='up-perfiladministrador'] option[value='" + data[27] + "']").attr('selected',
                    'selected');
                $("select[name='up-perfiladministrador'] option[value='" + data[27] + "']").text(data[5]);

                $('#editForm').attr('action', '/usuario/' + data[0]);
                $('#up-nome').val(data[1]);
                $('#up-logradouro').val(data[7]);
                $('#up-numero').val(data[8]);
                $('#up-complemento').val(data[9]);
                $('#up-bairro').val(data[10]);
                $('#up-telefone1').val(data[13]);
                $('#up-telefone2').val(data[14]);
                $('#up-email').val(data[2]);
                $('#up-cpf').val(data[15]);
                document.getElementById('up-datanascimento').valueAsDate = new Date(data[17]);
                $('#up-sexo').val(data[18]);
                document.getElementById('up-dataadmissao').valueAsDate = new Date(data[22]);
                document.getElementById('up-datademissao').valueAsDate = new Date(data[24]);
                $('#editModal').modal('show');
            });
            //End Edit Record

            //Start View
            table.on('click', '.view', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#v-id').val(data[0]);
                $('#v-nome').val(data[1]);
                $('#v-logradouro').val(data[7]);
                $('#v-numero').val(data[8]);
                $('#v-complemento').val(data[9]);
                $('#v-bairro').val(data[10]);
                $('#v-municipio').val(data[11]);
                $('#v-telefone1').val(data[13]);
                $('#v-telefone2').val(data[14]);
                $('#v-email').val(data[2]);
                $('#v-cpf').val(data[15]);
                $('#v-datanascimento').val(data[16]);
                $('#v-sexo').val(data[18]);
                $('#v-cargo').val(data[3]);
                $('#v-dataadmissao').val(data[21]);
                $('#v-datademissao').val(data[23]);
                $('#v-gerente').val(data[19]);
                $('#v-status').val(data[4]);
                $('#v-perfiladministrador').val(data[5]);

                $('#viewForm').attr('action');
                $('#viewModal').modal('show');
            });
            //End View

            //Start Delete Record
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#deleteForm').attr('action', '/usuario/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir o Grupo "<strong>' + data[1] + '?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>


    @include('scripts.confirmdeletion')

@endsection
