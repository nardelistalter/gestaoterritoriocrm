@extends('layouts.template')

@section('titulo', 'Clientes')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Clientes') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Clientes') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableCliente" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th style="display: none;">logradouro</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th style="display: none;">bairro</th>
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">municipio_fk</th>
                                <th style="display: none;">telefone1</th>
                                <th style="display: none;">telefone2</th>
                                <th style="display: none;">email</th>
                                <th class="th-sm border-bottom border-left">CPF/CNPJ</th>
                                <th style="display: none;">cpf</th>
                                <th style="display: none;">cnpj</th>
                                <th id="date" class="th-sm border-bottom border-left" type="datetime-local">Nasc/Fund</th>
                                <th style="display: none;">dataNasc</th>
                                <th class="th-sm border-bottom border-left">Sexo</th>
                                <th class="th-sm border-bottom border-left">Observação</th>
                                <th style="display: none;">vpolitica_fk</th>
                                <th style="display: none;">vpolitica_desc</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                @php
                                $visaopolitica = $cliente->find($cliente->id)->visaopolitica;
                                $municipio = $cliente->find($cliente->id)->municipio;
                                $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $cliente->id }}</th>
                                    <td class="align-middle border-left">{{ $cliente->nome }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->logradouro }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->numero }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->complemento }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->bairro }}</td>
                                    <td class="align-middle border-left">{{ $municipio->nome }}/{{ $estado->sigla }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->municipio_id }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->telefone1 }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->telefone2 }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->email }}</td>
                                    <td class="align-middle border-left">{{ $cliente->cpf ?? $cliente->cnpj }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->cpf }}</td>
                                    <td class="align-middle" style="display: none;">{{ $cliente->cnpj }}</td>
                                    <td class="align-middle border-left">
                                        {{ date('d/m/Y', strtotime($cliente->dataNascimento)) ?? '' }}
                                    </td>
                                    <td style="display: none;">{{ $cliente->dataNascimento }}</td>
                                    <td class="align-middle border-left">{{ $cliente->sexo }}</td>
                                    <th class="align-middle border-left">{{ $cliente->observacao }}</th>
                                    <td class="align-middle" style="display: none;">{{ $cliente->visaoPolitica_id }}</td>
                                    <td class="align-middle" style="display: none;">
                                        {{ $visaopolitica->descricao ?? 'NÃO DEFINIDA' }}
                                    </td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $cliente->id }}, '{{ $cliente->nome }} - {{ $cliente->cpf ?? $cliente->cnpj }} - {{ $municipio->nome }}/{{ $estado->sigla }}', '{{ strtolower(class_basename($cliente)) }}');"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th style="display: none;">logradouro</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th style="display: none;">bairro</th>
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">municipio_fk</th>
                                <th style="display: none;">telefone1</th>
                                <th style="display: none;">telefone2</th>
                                <th style="display: none;">email</th>
                                <th class="th-sm border-bottom border-left">CPF/CNPJ</th>
                                <th style="display: none;">cpf</th>
                                <th style="display: none;">cnpj</th>
                                <th id="date" class="th-sm border-bottom border-left" type="datetime-local">Nasc/Fund</th>
                                <th style="display: none;">dataNasc</th>
                                <th class="th-sm border-bottom border-left">Sexo</th>
                                <th class="th-sm border-bottom border-left">Observação</th>
                                <th style="display: none;">vpolitica_fk</th>
                                <th style="display: none;">vpolitica_desc</th>
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
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Novo Cliente') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\ClienteController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active" for="add-rd-cpf">
                                <input type="radio" name="custom_field[account][1]" id="id-custom_field-account-1-1"
                                    value="1" checked> CPF
                            </label>
                            <label class="btn btn-secondary" for="add-rd-cnpj">
                                <input type="radio" name="custom_field[account][2]" id="id-custom_field-account-1-2"
                                    value="2"> CNPJ
                            </label>
                        </div>
                        <br><br>
                        <div id="div-cpf" class="form-group">
                            <label class="mb-0" for="add-cpf">CPF*</label>
                            <input type="text" name="custom_field[account][3]" value="" id="input-custom-field1"
                                class="form-control" style="width: 155px;" maxlength="14" vk_1bc56="subscribed">
                            <span class="text-danger" id="add-cpfError"></span>
                        </div>
                        <div id="div-cnpj" class="form-group" style="display: none;">
                            <label class="mb-0" for="add-cnpj">CNPJ*</label>
                            <input type="text" name="custom_field[account][4]" value="" id="input-custom-field2"
                                class="form-control" style="width: 185px;" maxlength="18" vk_1bc56="subscribed">
                            <span class="text-danger" id="add-cnpjError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-nome">Nome*</label>
                            <input type="text" class="form-control" name="add-nome" maxlength="60" required>
                            <span class="text-danger" id="add-nomeError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-logradouro">Logradouro*</label>
                            <input type="text" class="form-control" name="add-logradouro" maxlength="120" required>
                            <span class="text-danger" id="add-logradouroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-numero">Número*</label>
                            <input type="text" class="form-control" name="add-numero" style="width: 130px;" maxlength="10"
                                required>
                            <span class="text-danger" id="add-numeroError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-complemento">Complemento</label>
                            <input type="text" class="form-control" name="add-complemento" style="width: 350px;"
                                maxlength="45">
                            <span class="text-danger" id="add-complementoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-bairro">Bairro*</label>
                            <input type="text" class="form-control" name="add-bairro" style="width: 350px;" maxlength="45"
                                required>
                            <span class="text-danger" id="add-bairroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-municipio">Município*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-municipio" required>
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
                            <input type="email" class="form-control" name="add-email">
                            <span class="text-danger" id="add-emailError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-datanascimento">Data Nascimento/Fundação</label>
                            <input type="date" class="form-control" id="add-datanascimento" name="add-datanascimento"
                                style="width: 170px;">
                            <span class="text-danger" id="add-datanascimentoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-sexo">Sexo</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-sexo"
                                style="width: 200px;">
                                <option value="">Selecione...</option>
                                <option value="FEMININO">FEMININO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="NÃO INFORMADO">NÃO INFORMADO</option>
                            </select>
                            <span class="text-danger" id="add-sexoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-visaopolitica">Visão Política</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-visaopolitica">
                                <option value="">Selecione...</option>
                                @foreach ($visaopoliticas as $visaopolitica)
                                    <option value={{ $visaopolitica->id }}> {{ $visaopolitica->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-visaopoliticaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-observacao">Observação</label>
                            <textarea type="text" class="form-control" id="add-observacao" name="add-observacao"
                                maxlength="255"></textarea>
                            <span class="text-danger" id="add-observacaoError"></span>
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ 'Alterar Cliente' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cliente" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" name="up-cpf_cnpj" for="up-cpf_cnpj">?</label>
                            <input type="text" class="form-control" id="up-cpf_cnpj" name="up-cpf_cnpj"
                                style="text-align: right; width: 155px;" maxlength="14" readonly>
                        </div>

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
                            <label class="mb-0" for="up-datanascimento">Data Nascimento/Fundação</label>
                            <input type="date" class="form-control" id="up-datanascimento" name="up-datanascimento"
                                style="width: 170px;">
                            <span class="text-danger" id="up-datanascimentoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-sexo">Sexo</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-sexo" name="up-sexo"
                                style="width: 200px;">
                                <option value="">Selecione...</option>
                                <option value="FEMININO">FEMININO</option>
                                <option value="MASCULINO">MASCULINO</option>
                                <option value="NÃO INFORMADO">NÃO INFORMADO</option>
                            </select>
                            <span class="text-danger" id="up-sexoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-visaopolitica">Visão Política</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-visaopolitica"
                                name="up-visaopolitica">
                                <option value="">Selecione...</option>
                                @foreach ($visaopoliticas as $visaopolitica)
                                    <option value={{ $visaopolitica->id }}> {{ $visaopolitica->descricao }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-observacao">Observação</label>
                            <textarea type="text" class="form-control" id="up-observacao" name="up-observacao"
                                maxlength="255"></textarea>
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Cliente') }}
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
                        <div class="form-group col-xs-2">
                            <label class="mb-0" name="v-cpf_cnpj" for="v-cpf_cnpj">?</label>
                            <input type="text" class="form-control" id="v-cpf_cnpj" name="v-cpf_cnpj" style="width: 190px;"
                                readonly>
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
                            <label class="mb-0" for="v-visaopolitica">Visão Política</label>
                            <input type="text" class="form-control" id="v-visaopolitica" name="v-visaopolitica"
                                style="width: 255px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-observacao">Observação</label>
                            <textarea type="textarea" class="form-control" id="v-observacao" name="v-observacao"
                                readonly></textarea>
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
                    <form action="/cliente" method="POST" id="deleteForm">
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
        // Grupo de Clientes
        $(document).ready(function() {

            var table = $('#datatableCliente').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#select-visaopolitica').html(
                    '<label class="mb-0" for="up-visaopolitica">Grupo de Clientes</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-visaopolitica" required>' +
                    '   @foreach ($visaopoliticas as $visaopolitica)' +
                    '       <option value={{ $visaopolitica->id }}>{{ $visaopolitica->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-visaopolitica'] option[value='" + data[18] + "']").attr('selected',
                    'selected');

                $("select[name='up-municipio'] option[value='" + data[7] + "']").attr('selected',
                    'selected');
                $("select[name='up-municipio'] option[value='" + data[7] + "']").text(data[6]);

                if (data[12]) {
                    $("label[name='up-cpf_cnpj']").text("CPF:");
                } else {
                    $("label[name='up-cpf_cnpj']").text("CNPJ:");
                }

                $('#editForm').attr('action', '/cliente/' + data[0]);
                $('#up-nome').val(data[1]);
                $('#up-logradouro').val(data[2]);
                $('#up-numero').val(data[3]);
                $('#up-complemento').val(data[4]);
                $('#up-bairro').val(data[5]);
                $('#up-telefone1').val(data[8]);
                $('#up-telefone2').val(data[9]);
                $('#up-email').val(data[10]);
                $('#up-cpf_cnpj').val(data[11]);
                document.getElementById("up-datanascimento").valueAsDate = new Date(data[15]);
                $('#up-sexo').val(data[16]);
                $('#up-observacao').val(data[17]);
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

                if (data[12]) {
                    $("label[name='v-cpf_cnpj']").text("CPF:");
                } else {
                    $("label[name='v-cpf_cnpj']").text("CNPJ:");
                }

                $('#v-id').val(data[0]);
                $('#v-nome').val(data[1]);
                $('#v-logradouro').val(data[2]);
                $('#v-numero').val(data[3]);
                $('#v-complemento').val(data[4]);
                $('#v-bairro').val(data[5]);
                $('#v-municipio').val(data[6]);
                $('#v-telefone1').val(data[8]);
                $('#v-telefone2').val(data[9]);
                $('#v-email').val(data[10]);
                $('#v-cpf_cnpj').val(data[11]);
                $('#v-datanascimento').val(data[14]);
                $('#v-sexo').val(data[16]);
                $('#v-observacao').val(data[17]);
                $('#v-visaopolitica').val(data[19]);

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

                //$('#id').val(data[0]);

                $('#deleteForm').attr('action', '/cliente/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir o Grupo "<strong>' + data[1] + '</strong>" de "<strong>' + data[
                        2] + '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            var options = {
                onComplete: function(cnpj) {
                    $.get("http://www.receitaws.com.br/v1/cnpj/" + cnpj.replace(/\D/g, ""), function(data,
                        status) {
                        alert("Data: " + data + "\nStatus: " + status);
                    });
                },
            }

            $('#input-custom-field1').mask('000.000.000-00');
            $('#input-custom-field2').mask('00.000.000/0000-00', options);


            var PhoneMaskBehavior = function(val) {
                    let len = val.replace(/\D/g, '').length;
                    return len === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                phoneOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(PhoneMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('#add-telefone1').mask(PhoneMaskBehavior, phoneOptions);
            $('#add-telefone2').mask(PhoneMaskBehavior, phoneOptions);

            $('#up-telefone1').mask(PhoneMaskBehavior, phoneOptions);
            $('#up-telefone2').mask(PhoneMaskBehavior, phoneOptions);
        });

        $("input[type=radio]").on("change", function() {
            if ($(this).val() == "1") {
                $("#div-cpf").show();
                $("#div-cnpj").hide();
            } else if ($(this).val() == "2") {
                $("#div-cnpj").show();
                $("#div-cpf").hide();
            }
        });

    </script>

    @include('scripts.confirmdeletion')

@endsection
