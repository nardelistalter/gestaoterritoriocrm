@extends('layouts.template')

@section('titulo', 'Inscrição Estadual')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">
                {{ __('Cadastro de Inscrição Estadual') }}
            </h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Inscrição Estadual') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableInscricaoEstadual"
                        class="datatable table table-sm table-responsive text-center rounded" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Inscrição Estadual</th>
                                <th class="th-sm border-bottom border-left">Localidade</th>
                                <th class="th-sm border-bottom border-left">Município/UF</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Cliente</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inscricaoestaduals as $inscricaoestadual)
                                @php
                                $cliente = $inscricaoestadual->find($inscricaoestadual->id)->cliente;
                                $pfisica = $cliente->find($cliente->id)->pfisica;
                                $pjuridica = $cliente->find($cliente->id)->pjuridica;
                                if ($pfisica != null) {
                                $pessoa = $pfisica->find($pfisica->id)->pessoa;
                                } else {
                                $pessoa = $pjuridica->find($pjuridica->id)->pessoa;
                                }
                                $grupocliente = $inscricaoestadual->find($inscricaoestadual->id)->grupocliente;
                                $municipio = $inscricaoestadual->find($inscricaoestadual->id)->municipio;
                                $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $inscricaoestadual->id }}</th>
                                    <td class="align-middle border-left">{{ $inscricaoestadual->numero }}</td>
                                    <td class="align-middle border-left">{{ $inscricaoestadual->localidade }}</td>
                                    <td class="align-middle border-left">{{ $municipio->nome }}/{{ $estado->sigla }}</td>
                                    <td style="display: none;">{{ $municipio->id }}</td>
                                    <td class="align-middle border-left">{{ $pessoa->nome }}</td>
                                    <td style="display: none;">{{ $cliente->id }}</td>
                                    <td class="align-middle border-left">{{ $grupocliente->descricao }}</td>
                                    <td style="display: none;">{{ $grupocliente->id }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Inscrição Estadual</th>
                                <th class="th-sm border-bottom border-left">Localidade</th>
                                <th class="th-sm border-bottom border-left">Município/UF</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Cliente</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left border-right">Ações</th>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true"
        id="editForm">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">
                        {{ __('Nova Inscrição Estadual') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\InscricaoEstadualController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-numero">Inscrição Estadual</label>
                            <input type="text" class="form-control" id="add-numero" name="add-numero" style="width: 150px;"
                                required>
                            <span class="text-danger" id="add-numeroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-cliente">Cliente</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-cliente"
                                name="add-cliente" required>
                                <option value="">Selecione...</option>
                                @foreach ($clientes as $cliente)
                                    @php
                                    $pfisica = $cliente->find($cliente->id)->pfisica;
                                    $pjuridica = $cliente->find($cliente->id)->pjuridica;
                                    if ($pfisica != null) {
                                    $pessoa = $pfisica->find($pfisica->id)->pessoa;
                                    } else {
                                    $pessoa = $pjuridica->find($pjuridica->id)->pessoa;
                                    }
                                    @endphp
                                    <option value={{ $cliente->id }}> {{ $pessoa->nome }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-clienteError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-grupocliente">Grupo de Clientes</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-grupocliente"
                                required>
                                <option value="">Selecione...</option>
                                @foreach ($grupoclientes as $grupocliente)
                                    <option value={{ $grupocliente->id }}> {{ $grupocliente->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-grupoclienteError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-municipio">Município/UF</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-municipio" required>
                                <option value="">Selecione...</option>
                                @foreach ($municipios as $municipio)
                                    @php
                                    $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                    $estado = $microrregiao->find($microrregiao->id)->estado;
                                    @endphp
                                    <div>
                                        <option value={{ $municipio->id }}> {{ $municipio->nome }}/{{ $estado->sigla }}
                                        </option>
                                    </div>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-municipioError"></span>
                        </div>

                        <div class="form-group">
                            <label class="mb-0" for="add-localidade">Localidade</label>
                            <input type="text" class="form-control" id="add-localidade" name="add-localidade" required>
                            <span class="text-danger" id="add-localidadeError"></span>
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
                        {{ 'Alterar Inscrição Estadual' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/inscricaoestadual" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-id">id</label>
                            <input type="text" class="form-control" id="up-id" name="up-id" style="width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-numero">Inscrição Estadual</label>
                            <input type="text" class="form-control" id="up-numero" name="up-numero" style="width: 150px;"
                                required>
                            <span class="text-danger" id="up-numeroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-cliente">Cliente</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-cliente"
                                name="up-cliente" required>
                                @foreach ($clientes as $cliente)
                                    @php
                                    $pfisica = $cliente->find($cliente->id)->pfisica;
                                    $pjuridica = $cliente->find($cliente->id)->pjuridica;
                                    if ($pfisica != null) {
                                    $pessoa = $pfisica->find($pfisica->id)->pessoa;
                                    } else {
                                    $pessoa = $pjuridica->find($pjuridica->id)->pessoa;
                                    }
                                    @endphp
                                    <option value={{ $cliente->id }}> {{ $pessoa->nome }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-clienteError"></span>
                        </div>
                        <div id="select-grupocliente" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-municipio" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-localidade">Localidade</label>
                            <input type="text" class="form-control" id="up-localidade" name="up-localidade" required>
                            <span class="text-danger" id="up-localidadeError"></span>
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
                        {{ __('Ver Inscrição Estadual') }}
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
                            <label class="mb-0" for="v-numero">InscricaoEstadual</label>
                            <input type="text" class="form-control" id="v-numero" name="v-numero" style="width: 150px;"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-localidade">Localidade</label>
                            <input type="text" class="form-control" id="v-localidade" name="v-localidade" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-cliente">Cliente</label>
                            <input type="text" class="form-control" id="v-cliente" name="v-cliente" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-grupocliente">Grupo de Clientes</label>
                            <input type="text" class="form-control" id="v-grupocliente" name="v-grupocliente" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-municipio">Município/UF</label>
                            <input type="text" class="form-control" id="v-municipio" name="v-municipio" readonly>
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
                    <form action="/inscricaoestadual" method="POST" id="deleteForm">
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
        // InscricaoEstadual

        $(document).ready(function() {

            var table = $('#datatableInscricaoEstadual').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);
                console.log(data[8]);

                $("select[name='up-cliente'] option[value='" + data[6] + "']").attr('selected',
                    'selected');
                $("select[name='up-cliente'] option[value='" + data[6] + "']").text(data[5]);

                $('#select-grupocliente').html(
                    '<label class="mb-0" for="up-grupocliente">Grupo de Clientes</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-grupocliente" required>' +
                    '   @foreach ($grupoclientes as $grupocliente)' +
                    '       <option value={{ $grupocliente->id }}>{{ $grupocliente->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-grupocliente'] option[value='" + data[8] + "']").attr('selected',
                    'selected');

                $('#select-municipio').html('<label class="mb-0" for="up-municipio">Município/UF</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-municipio" required>' +
                    '   @foreach ($municipios as $municipio)' +
                    '       <option value={{ $municipio->id }}>{{ $municipio->nome }}/{{ $estado->sigla }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-municipio'] option[value='" + data[4] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/inscricaoestadual/' + data[0]);
                $('#up-id').val(data[0]);
                $('#up-numero').val(data[1]);
                $('#up-localidade').val(data[2]);
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
                $('#v-numero').val(data[1]);
                $('#v-localidade').val(data[2]);
                $('#v-municipio').val(data[3]);
                $('#v-cliente').val(data[5]);
                $('#v-grupocliente').val(data[7]);

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

                $('#deleteForm').attr('action', '/inscricaoestadual/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[1] + '-' + data[5] + '-' + data[3] +
                    '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>
@endsection
