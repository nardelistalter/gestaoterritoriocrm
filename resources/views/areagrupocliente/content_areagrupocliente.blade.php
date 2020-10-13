@extends('layouts.template')

@section('titulo', 'Área por Grupo de Clientes')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0" data-toggle="modal"
                    data-target="#addModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir item"></i>{{ __('Novo') }}</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">
                {{ __('Cadastro de Área por Grupo de Clientes') }}
            </h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Área por Grupo de Clientes') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableAreaGrupoCliente"
                        class="datatable table table-sm table-responsive text-center rounded" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Município</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Segmento/Cultura</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left">Quantidade</th>
                                <th style="display: none;">qtd</th>
                                <th style="display: none;">um</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areagrupoclientes as $areagrupocliente)
                                @php
                                $segmentocultura = $areagrupocliente->find($areagrupocliente->id)->segmentocultura;
                                $grupocliente = $areagrupocliente->find($areagrupocliente->id)->grupocliente;
                                $municipio = $areagrupocliente->find($areagrupocliente->id)->municipio;
                                $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $areagrupocliente->id }}</th>
                                    <td class="align-middle border-left">{{ $grupocliente->descricao }}</td>
                                    <td style="display: none;">{{ $grupocliente->id }}</td>
                                    <td class="align-middle border-left">{{ $segmentocultura->descricao }}</td>
                                    <td style="display: none;">{{ $segmentocultura->id }}</td>
                                    <td class="align-middle border-left">{{ $municipio->nome }}/{{ $estado->sigla }}</td>
                                    <td style="display: none;">{{ $municipio->id }}</td>
                                    <td class="align-middle border-left">{{ $areagrupocliente->qtdUnidadesArea }}
                                        {{ $segmentocultura->unidadeMedida }}</td>
                                    <td style="display: none;">{{ $areagrupocliente->qtdUnidadesArea }}</td>
                                    <td style="display: none;">{{ $segmentocultura->unidadeMedida }}</td>
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
                                <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Município</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Segmento/Cultura</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left">Quantidade</th>
                                <th style="display: none;">qtd</th>
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
                        {{ __('Novo Área por Grupo de Clientes') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\AreaGrupoClienteController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group col-xs-2">
                            <label for="add-grupocliente">Grupo de Clientes</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-grupocliente">
                                <option value="">Selecione...</option>
                                @foreach ($grupoclientes as $grupocliente)
                                    <option value={{ $grupocliente->id }}> {{ $grupocliente->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-grupoclienteError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="add-municipio">Município</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-municipio">
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
                        <div class="form-group col-xs-2">
                            <label for="add-segmentocultura">Segmento/Cultura</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-segmentocultura"
                                name="add-segmentocultura">
                                <option value="">Selecione...</option>
                                @foreach ($segmentoculturas as $segmentocultura)
                                    <option value={{ $segmentocultura->id }}> {{ $segmentocultura->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-segmentoculturaError"></span>
                        </div>
                        <div class="form-group">
                            <label for="add-unidademedida">Unidade de Medida</label>
                            <input type="text" class="form-control" id="add-unidademedida" name="add-unidademedida"
                                value="{{ route('showUM', 2) }}" onClick="getHTML(select,textfield)" style="width: 90px"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="add-qtdunidadesarea">Quantidade</label>
                            <input type="number" class="form-control" id="add-qtdunidadesarea" name="add-qtdunidadesarea"
                                step="0.01" min="0.01" style="text-align: right; width: 150px;">
                            <span class="text-danger" id="add-qtdunidadesareaError"></span>
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
                        {{ 'Alterar Área por Grupo de Clientes' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/areagrupocliente" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div id="select-grupocliente" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-municipio" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-segmentocultura" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div class="form-group">
                            <label for="up-qtdunidadesarea">Quantidade</label>
                            <input type="number" class="form-control" id="up-qtdunidadesarea" name="up-qtdunidadesarea"
                                step="0.01" min="0.01" style="text-align: right; width: 150px;">
                            <span class="text-danger" id="up-qtdunidadesareaError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="up-unidademedida">Unidade de Medida</label>
                            <input type="text" class="form-control" id="up-unidademedida" name="up-unidademedida"
                                style="width: 120px;" readonly>
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
                        {{ __('Ver Área por Grupo de Clientes') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        <div class="form-group">
                            <label for="v-id">id</label>
                            <input type="text" class="form-control" id="v-id" name="v-id" style="width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label for="v-grupocliente">Grupo de Clientes</label>
                            <input type="text" class="form-control" id="v-grupocliente" name="v-grupocliente" readonly>
                        </div>
                        <div class="form-group">
                            <label for="v-municipio">Município/UF</label>
                            <input type="text" class="form-control" id="v-municipio" name="v-municipio" readonly>
                        </div>
                        <div class="form-group">
                            <label for="v-segmentocultura">Segmento/Cultura</label>
                            <input type="text" class="form-control" id="v-segmentocultura" name="v-segmentocultura"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="v-qtdunidadesarea">Quantidade</label>
                            <input type="text" class="form-control" id="v-qtdunidadesarea" name="v-qtdunidadesarea"
                                style="text-align: right; width: 150px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="v-unidademedida">Unidade de Medida</label>
                            <input type="text" class="form-control" id="v-unidademedida" name="v-unidademedida"
                                style="width: 120px;" readonly>
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
                    <form action="/areagrupocliente" method="POST" id="deleteForm">
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
        // AreaGrupoCliente

        $('#add-segmentocultura').change(function() {
            //$('#add-unidademedida').val(this.value);
            //$('#add-unidademedida').attr('value', '{{ route('showUM', ' + this.value +') }}');
            //$("input[name='add-unidademedida']").attr('value', '{{ route('showUM', ' + this.value +') }}');
            //$("input[name='add-unidademedida']").attr('value', '{{ route('showUM', '2') }}');
        });

        $(document).ready(function() {

            var table = $('#datatableAreaGrupoCliente').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);
                console.log(data[8]);

                $('#select-grupocliente').html('<label for="up-grupocliente">Grupo de Clientes</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-grupocliente">' +
                    '   @foreach ($grupoclientes as $grupocliente)' +
                    '       <option value={{ $grupocliente->id }}>{{ $grupocliente->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-grupocliente'] option[value='" + data[2] + "']").attr('selected',
                    'selected');

                $('#select-municipio').html('<label for="up-municipio">Município</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-municipio">' +
                    '   @foreach ($municipios as $municipio)' +
                    '       <option value={{ $municipio->id }}>{{ $municipio->nome }}/{{ $estado->sigla }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-municipio'] option[value='" + data[6] + "']").attr('selected',
                    'selected');

                $('#select-segmentocultura').html(
                    '<label for="up-segmentocultura">Segmento/Cultura</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-segmentocultura">' +
                    '   @foreach ($segmentoculturas as $segmentocultura)' +
                    '       <option value={{ $segmentocultura->id }}>{{ $segmentocultura->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-segmentocultura'] option[value='" + data[4] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/areagrupocliente/' + data[0]);
                $('#up-qtdunidadesarea').val(data[8]);
                $('#up-unidademedida').val(data[9]);
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
                $('#v-municipio').val(data[5]);
                $('#v-segmentocultura').val(data[3]);
                $('#v-qtdunidadesarea').val(data[7]);
                $('#v-unidademedida').val(data[9]);

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

                $('#deleteForm').attr('action', '/areagrupocliente/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[3] + '-' + data[1] + '-' + data[5] +
                    '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>
@endsection
