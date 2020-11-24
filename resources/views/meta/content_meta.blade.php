@extends('layouts.template')

@section('titulo', 'Metas')

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
                {{ __('Cadastro de Metas') }}
            </h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Metas') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableMeta" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Programa de Negócios</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Meta Desejada</th>
                                <th style="display: none;">partdesejada</th>
                                <th class="th-sm border-bottom border-left">Data Prevista</th>
                                <th style="display: none;">dataprevista</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metas as $meta)
                                @php
                                $grupocliente = $meta->find($meta->id)->grupocliente;
                                $programadenegocio = $meta->find($meta->id)->programadenegocio;
                                $safra = $programadenegocio->find($programadenegocio->id)->safra;
                                $grupoproduto = $programadenegocio->find($programadenegocio->id)->grupoproduto;
                                $segmentocultura = $programadenegocio->find($programadenegocio->id)->segmentocultura;
                                @endphp

                                <tr>
                                    <th class="align-middle border-left">{{ $meta->id }}</th>
                                    <td class="align-middle border-left">{{ $grupocliente->descricao }}</td>
                                    <td style="display: none;">{{ $grupocliente->id }}</td>
                                    <td class="align-middle border-left">
                                        {{ $grupoproduto->descricao }}-{{ $segmentocultura->descricao }}-{{ $safra->descricao }}-R$ {{ $programadenegocio->valorUnitario }}
                                    </td>
                                    <td style="display: none;">{{ $programadenegocio->id }}</td>
                                    <td class="align-middle border-left">R$ {{ $meta->metaDesejada }}</td>
                                    <td style="display: none;">{{ $meta->metaDesejada }}</td>
                                    <td class="align-middle border-left">{{ date("d/m/Y", strtotime($meta->dataPrevista)) }}</td>
                                    <td style="display: none;">{{ $meta->dataPrevista }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $meta->id }}, '{{ $grupocliente->descricao }} - {{ $grupoproduto->descricao }}-{{ $segmentocultura->descricao }}-{{ $safra->descricao }}', '{{ strtolower(class_basename($meta)) }}')"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Programa de Negócios</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Meta Desejada</th>
                                <th style="display: none;">partdesejada</th>
                                <th class="th-sm border-bottom border-left">Data Prevista</th>
                                <th style="display: none;">dataprevista</th>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true"
        id="editForm">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">
                        {{ __('Nova Meta') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\MetaController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
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
                            <label class="mb-0" for="add-programadenegocio">Programa de Negócios</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-programadenegocio"
                                name="add-programadenegocio" required>
                                <option value="">Selecione...</option>
                                @foreach ($programadenegocios as $programadenegocio)
                                    @php
                                    $safra = $programadenegocio->find($programadenegocio->id)->safra;
                                    $grupoproduto = $programadenegocio->find($programadenegocio->id)->grupoproduto;
                                    $segmentocultura = $programadenegocio->find($programadenegocio->id)->segmentocultura;
                                    @endphp
                                    <option value={{ $programadenegocio->id }}>
                                        {{ $grupoproduto->descricao }}-{{ $segmentocultura->descricao }}-{{ $safra->descricao }}-R$ {{ $programadenegocio->valorUnitario }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-programadenegocioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-metadesejada">Participação Desejada R$</label>
                            <input type="number" class="form-control" id="add-metadesejada"
                                name="add-metadesejada" step="0.01" min="0.01"
                                style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="add-metadesejadaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-dataprevista">Data Prevista</label>
                            <input type="date" class="form-control" id="add-dataprevista" name="add-dataprevista" style="width: 170px;" required>
                            <span class="text-danger" id="add-dataprevistaError"></span>
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
                        {{ 'Alterar Meta' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/meta" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div id="select-grupocliente" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="up-programadenegocio">Programa de Negócios</label>
                            <select class="form-control selectpicker" data-live-search="true" id="up-programadenegocio"
                                name="up-programadenegocio" required>
                                @foreach ($programadenegocios as $programadenegocio)
                                    @php
                                    $safra = $programadenegocio->find($programadenegocio->id)->safra;
                                    $grupoproduto = $programadenegocio->find($programadenegocio->id)->grupoproduto;
                                    $segmentocultura = $programadenegocio->find($programadenegocio->id)->segmentocultura;
                                    @endphp
                                    <option value={{ $programadenegocio->id }}>
                                        {{ $grupoproduto->descricao }}-{{ $segmentocultura->descricao }}-{{ $safra->descricao }}-R$ {{ $programadenegocio->valorUnitario }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-programadenegocioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-metadesejada">Participação Desejada R$</label>
                            <input type="number" class="form-control" id="up-metadesejada"
                                name="up-metadesejada" step="0.01" min="0.01"
                                style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="up-metadesejadaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-dataprevista">Data Fim</label>
                            <input type="date" class="form-control" id="up-dataprevista" name="up-dataprevista" style="width: 170px;" required>
                            <span class="text-danger" id="up-dataprevistaError"></span>
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
                        {{ __('Ver Meta') }}
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
                            <label class="mb-0" for="v-grupocliente">Grupo de Clientes</label>
                            <input type="text" class="form-control" id="v-grupocliente" name="v-grupocliente" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-programadenegocio">Programa de Negócios</label>
                            <input type="text" class="form-control" id="v-programadenegocio" name="v-programadenegocio"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-metadesejada">Participação Desejada R$</label>
                            <input type="text" class="form-control" id="v-metadesejada"
                                name="v-metadesejada" style="text-align: right; width: 150px;" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-dataprevista">Data Fim</label>
                            <input type="text" class="form-control" id="v-dataprevista" name="v-dataprevista" style="width: 130px;" readonly>
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Meta') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/meta" method="POST" id="deleteForm">
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
        // Meta

        $(document).ready(function() {

            var table = $('#datatableMeta').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);
                console.log(data[8]);

                $('#select-grupocliente').html(
                    '<label class="mb-0" for="up-grupocliente">Grupo de Clientes</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-grupocliente" required>' +
                    '   @foreach ($grupoclientes as $grupocliente)' +
                    '       <option value={{ $grupocliente->id }}>{{ $grupocliente->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-grupocliente'] option[value='" + data[2] + "']").attr('selected',
                    'selected');

                $('#select-programadenegocio').html(
                    '<label class="mb-0" for="up-programadenegocio">Programa de Negócios</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-programadenegocio" required>' +
                    '   @foreach ($programadenegocios as $programadenegocio)' +
                    '       @php' +
                    '        $safra = $programadenegocio->find($programadenegocio->id)->safra;' +
                    '        $grupoproduto = $programadenegocio->find($programadenegocio->id)->grupoproduto;' +
                    '        $segmentocultura = $programadenegocio->find($programadenegocio->id)->segmentocultura;' +
                    '        @endphp' +
                    '        <option value={{ $programadenegocio->id }}> {{ $grupoproduto->descricao }}-{{ $segmentocultura->descricao }}-{{ $safra->descricao }}-R${{ $programadenegocio->valorUnitario }} </option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-programadenegocio'] option[value='" + data[4] + "']").attr('selected',
                    'selected');
                $("select[name='up-programadenegocio'] option[value='" + data[4] + "']").text(data[3]);

                $('#editForm').attr('action', '/meta/' + data[0]);
                $('#up-metadesejada').val(data[6]);
                document.getElementById("up-dataprevista").valueAsDate = new Date(data[8]);
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
                $('#v-grupocliente').val(data[1]);
                $('#v-programadenegocio').val(data[3]);
                $('#v-metadesejada').val(data[6]);
                $('#v-dataprevista').val(data[7]);

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

                $('#deleteForm').attr('action', '/meta/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[3] + '-' + data[1] + '-' + data[5] +
                    '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

    @include('scripts.confirmdeletion')

@endsection
