@extends('layouts.template')

@section('titulo', 'Microrregiões')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Microrregiões') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Microrregiões Geográficas') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableMicrorregiao" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">Estado</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($microrregioes as $microrregiao)
                                @php
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $microrregiao->id }}</th>
                                    <td class="align-middle border-left">{{ $microrregiao->nome }}</td>
                                    <td class="align-middle border-left">{{ $estado->nome }} - {{ $estado->sigla }}</td>
                                    <td style="display: none;">{{ $estado->id }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                    title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $microrregiao->id }}, '({{ $microrregiao->nome }}/{{ $estado->sigla }})', '{{ strtolower(class_basename($microrregiao)) }}');"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">Estado</th>
                                <th style="display: none;">id_fk1</th>
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
                    <form action="{{ action('App\Http\Controllers\MicrorregiaoController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="form-microrregiao">Descrição</label>
                            <input type="text" class="form-control" name="form-microrregiao" required>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="form-estado">Estado</label>
                            <a href="#" class="btn_crud btn btn-sm text-success estado" data-toggle="modal"
                                data-target="#addEstado">
                                <i class="fas fa-plus" data-toggle="tooltip" title="Novo Estado"></i>
                            </a>
                            <select class="form-control selectpicker" data-live-search="true" name="form-estado" required>
                                <option value="">Selecione...</option>
                                @foreach ($estados as $estado)
                                    <option value={{ $estado->id }}> {{ $estado->nome }} - {{ $estado->sigla }} </option>
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
                    <form action="/microrregiao" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="form-microrregiao">Descrição</label>
                            <input type="text" class="form-control" id="form-microrregiao" name="form-microrregiao" required>
                        </div>
                        <div id="select-microrregiao" class="form-group col-xs-2">
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
                            <label class="mb-0" for="form-id">id</label>
                            <input type="text" class="form-control" id="form-id" name="form-id"
                                style="text-align: center; width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="form-microrregiao">Descrição</label>
                            <input type="text" class="form-control" id="form-microrregiao" name="form-microrregiao" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="form-estado">Estado</label>
                            <input type="text" class="form-control" id="form-estado" name="form-estado" readonly>
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
                    <form action="/microrregiao" method="POST" id="deleteForm">
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

    <!-- MODAIS AUXILIARES INICIO -->

    <!-- MODAL ESTADO -->

    <!-- Start Add Modal -->
    <div class="modal fade" id="addEstado" tabindex="1600" role="dialog" aria-labelledby="addEstadoLabel" aria-hidden="true"
        style="z-index: 1600 !important;">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="addEstadoLabel">{{ __('Novo Estado') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\EstadoController@store') }}" method="POST" id="formAddEstado" onsubmit="return false;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="form-estado">Descrição</label>
                            <input type="text" class="form-control" id="form-estado" name="form-estado" required>
                            <span class="text-danger" id="form-estadoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="form-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="form-sigla" name="form-sigla"
                                required>
                            <span class="text-danger" id="form-siglaError"></span>
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

    <!-- MODAIS AUXILIARES FIM -->


@endsection


@section('script_pages')
    <script type="text/javascript">
        // Microrregiao
        $(document).ready(function() {

            $("#formAddEstado").submit(function() {

                // Pegando os dados do formulário e pegando o token que válida o request.
                var estado = $("#form-estado").val();
                var sigla = $("#form-sigla").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que sera enviado na request.
                var dados = {
                    estado: estado,
                    sigla: sigla,
                    _token: _token,
                    ajax: true
                }

                // Executando o POST para a rota de cadastro de estado
                $.ajax({
                        url: "/estado",
                        type: 'POST',
                        data: dados
                    })

                    // Caso der sucesso então adiciona a nova estado no select e fecha o modal.
                    .done(function(result) {
                        result = JSON.parse(
                        result); // Como o resultado volta em string então da parse pra JSON

                        // Setando a estado no select.
                        $('[name=form-estado]').map(function(_i, element) {
                            var option = document.createElement("option");
                            option.text = result.estado + "/" + result.sigla;
                            option.value = result.id;
                            element.appendChild(option);
                            element.value = result.id;
                        });

                        // Fechando o modal
                        $('#addEstado').modal('hide');
                    })

                    // Caso der erro então da um aviso.
                    .fail(function(err) {
                        console.log(err);
                        alert("Erro ao tentar cadastrar o estado.");
                    })

                return false;
            });

            var table = $('#datatableMicrorregiao').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#select-microrregiao').html('<label class="mb-0" for="form-estado">Estado</label>' +
                    '<a href="#" class="btn_crud btn btn-sm text-success estado" data-toggle="modal" data-target="#addEstado">' +
                    '    <i class="fas fa-plus" data-toggle="tooltip" title="Novo Estado"></i>' +
                    '</a>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="form-estado" required>' +
                    '   @foreach ($estados as $estado)' +
                    '       <option value={{ $estado->id }}>{{ $estado->nome }} - {{ $estado->sigla }}</option>' +
                    '   @endforeach' +
                    '</select>');

                $("select[name='form-estado'] option[value='" + data[3] + "']").attr('selected', 'selected');

                $('#editForm').attr('action', '/microrregiao/' + data[0]);
                $('#editModal #form-microrregiao').val(data[1]);
                $('#editModal #form-estado').val(data[2]);
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

                $('#viewModal #form-id').val(data[0]);
                $('#viewModal #form-microrregiao').val(data[1]);
                $('#viewModal #form-estado').val(data[2]);

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

                $('#deleteForm').attr('action', '/microrregiao/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[1] + '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

    @include('scripts.confirmdeletion')

@endsection
