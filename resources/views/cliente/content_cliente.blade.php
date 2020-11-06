@extends('layouts.template')

@section('titulo', 'Clientes')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal" data-target="#addModal"
                    disabled><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
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
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">municipio_fk</th>
                                <th class="th-sm border-bottom border-left">CPF/CNPJ</th>
                                <th style="display: none;">cpf_fk</th>
                                <th style="display: none;">cnpj_fk</th>
                                <th style="display: none;">vpolitica_fk</th>
                                <th id="date" class="th-sm border-bottom border-left" type="datetime-local">Nasc/Fund</th>
                                <th style="display: none;">data</th>
                                <th class="th-sm border-bottom border-left">Sexo</th>
                                <th class="th-sm border-bottom border-left">Observação</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                @php
                                    $visaopolitica = $cliente->find($cliente->id)->visaopolitica;
                                    $pfisica = $cliente->find($cliente->id)->pfisica;
                                    $pjuridica = $cliente->find($cliente->id)->pjuridica;

                                    if ($pfisica != null) {
                                        $pessoa = $pfisica->find($pfisica->id)->pessoa;
                                        //dd($pessoa);
                                    } else {
                                        $pessoa = $pjuridica->find($pjuridica->id)->pessoa;
                                    }
                                    $municipio = $pessoa->find($pessoa->id)->municipio;
                                    $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                    $estado = $microrregiao->find($microrregiao->id)->estado;                                
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $cliente->id }}</th>
                                    <td class="align-middle border-left">{{ $pessoa->nome }}</td>
                                    <td class="align-middle border-left">{{ $municipio->nome }}/{{ $estado->sigla }}</td>
                                    <td class="align-middle" style="display: none;">{{ $municipio->id }}</td>
                                    <td class="align-middle border-left">{{ $pfisica->cpf ?? $pjuridica->cnpj }}</td>
                                    <td class="align-middle" style="display: none;">{{ $pfisica->id ?? '' }}</td>
                                    <td class="align-middle" style="display: none;">{{ $pjuridica->id ?? '' }}</td>
                                    <td class="align-middle" style="display: none;">{{ $municipio->id }}</td>
                                    <td class="align-middle border-left">{{ date("d/m/Y", strtotime($pfisica->dataNascimento ?? $pjuridica->dataFundacao)) }}</td>
                                    <td style="display: none;">{{ $pfisica->dataNascimento ?? $pjuridica->dataFundacao }}</td>
                                    <td class="align-middle border-left">{{ $pfisica->sexo ?? '' }}</td>
                                    <th class="align-middle border-left">{{ $cliente->observacao }}</th>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view disabled"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit disabled"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete disabled" data-toggle="tooltip"
                                                title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm disabled" data-toggle="tooltip"
                                        onclick="return confirmDeletion({{ $cliente->id }}, '{{ $cliente->nickname }} - {{ $cliente->email }}', '{{ strtolower(class_basename($cliente)) }}');" title="Excluir"><i
                                            class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">municipio_fk</th>
                                <th class="th-sm border-bottom border-left">CPF/CNPJ</th>
                                <th style="display: none;">cpf_fk</th>
                                <th style="display: none;">cnpj_fk</th>
                                <th style="display: none;">vpolitica_fk</th>
                                <th class="th-sm border-bottom border-left">Nasc/Fund</th>
                                <th style="display: none;">data</th>
                                <th class="th-sm border-bottom border-left">Sexo</th>
                                <th class="th-sm border-bottom border-left">Observação</th>
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

    {{--
    <!-- Start Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Nova Microrregião') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\ClienteController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-cliente">Descrição</label>
                            <input type="text" class="form-control" name="add-cliente" required>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-funcionario">Funcionário</label>
                            <!--<input type="text" class="form-control" maxlength="2"
                                                                                            style="text-transform: uppercase; width: 60px" name="funcionario" required>-->
                            <select class="form-control selectpicker" data-live-search="true" name="add-funcionario">
                                <option value="">Selecione...</option>
                                @foreach ($funcionarios as $funcionario)
                                    <option value={{ $funcionario->id }}> {{ $funcionario->nome }} -
                                        {{ $funcionario->sigla }}
                                    </option>
                                @endforeach
                            </select>

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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ 'Alterar Microrregião' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cliente" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-cliente">Descrição</label>
                            <input type="text" class="form-control" id="up-cliente" name="up-cliente" required>
                        </div>
                        <div id="select-cliente" class="form-group col-xs-2">
                            <!-- jquery -->
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Microrregião') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        <div class="form-group">
                            <label class="mb-0" for="v-id">id</label>
                            <input type="text" class="form-control" id="v-id" name="v-id" style="text-align: center; width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-cliente">Descrição</label>
                            <input type="text" class="form-control" id="v-cliente" name="v-cliente" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-funcionario">Funcionário</label>
                            <input type="text" class="form-control" id="v-funcionario" name="v-funcionario" readonly>
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
    --}}
@endsection

@section('script_pages')
    <script type="text/javascript">
 

    </script>

 @include('scripts.confirmdeletion')

@endsection
