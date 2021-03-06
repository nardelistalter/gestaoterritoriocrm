@extends('layouts.template')

@section('titulo', 'Segmento/Cultura por Município')

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
                {{ __('Cadastro de Segmento/Cultura por Município') }}
            </h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Segmento/Cultura por Município') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableUnidadesArea" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Quantidade</th>
                                <th style="display: none;">qtdArea</th>
                                <th style="display: none;">unidadeMedida</th>
                                <th class="th-sm border-bottom border-left">MKT Share Desejado</th>
                                <th style="display: none;">mkt_desej</th>
                                <th class="th-sm border-bottom border-left">Segmento/Cultura</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Município</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Observação</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unidadesareas as $unidadesarea)
                                @php
                                $segmentocultura = $unidadesarea->find($unidadesarea->id)->segmentocultura;
                                $municipio = $unidadesarea->find($unidadesarea->id)->municipio;
                                $microrregiao = $municipio->find($municipio->id)->microrregiao;
                                $estado = $microrregiao->find($microrregiao->id)->estado;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $unidadesarea->id }}</th>
                                    <td class="align-middle border-left">{{ number_format($unidadesarea->qtdArea, 2, ',', '.') }} {{ $unidadesarea->unidadeMedida }}</td>
                                    <td style="display: none;">{{ $unidadesarea->qtdArea }}</td>
                                    <td style="display: none;">{{ $unidadesarea->unidadeMedida }}</td>
                                    <td class="align-middle border-left">{{ number_format($unidadesarea->mktShareDesejado, 2, ',', '.') }}%</td>
                                    <td style="display: none;">{{ $unidadesarea->mktShareDesejado }}</td>
                                    <td class="align-middle border-left">{{ $segmentocultura->descricao }}</td>
                                    <td style="display: none;">{{ $segmentocultura->id }}</td>
                                    <td class="align-middle border-left">{{ $municipio->nome }}/{{ $estado->sigla }}</td>
                                    <td style="display: none;">{{ $municipio->id }}</td>
                                    <td class="align-middle border-left" style="max-width: 15em;">{{ $unidadesarea->observacao }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $unidadesarea->id }}, '{{ $unidadesarea->qtdArea }} {{ $unidadesarea->unidadeMedida }} - {{ $segmentocultura->descricao }} - {{ $municipio->nome }}/{{ $estado->sigla }}', '{{ strtolower(class_basename($unidadesarea)) }}');" title="Excluir"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Quantidade</th>
                                <th style="display: none;">qtdArea</th>
                                <th style="display: none;">unidadeMedida</th>
                                <th class="th-sm border-bottom border-left">MKT Share Desejado</th>
                                <th style="display: none;">mkt_desej</th>
                                <th class="th-sm border-bottom border-left">Segmento/Cultura</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Município</th>
                                <th style="display: none;">id_fk2</th>
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

    <!-- Start Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true"
        id="editForm">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">
                        {{ __('Nova Unidade de Área') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\UnidadesAreaController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-qtdarea">Quantidade</label>
                            <input type="number" class="form-control" id="add-qtdarea" name="add-qtdarea" step="0.01"
                                min="0.01" style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="add-qtdareaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-unidademedida">Unidade de Medida</label>
                            <input type="text" class="form-control" name="add-unidademedida" maxlength="45"
                                style="width: 120px;" required>
                            <span class="text-danger" id="add-unidademedidaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-mktsharedesejado">Market Share Desejado (%)</label>
                            <input type="number" class="form-control" id="add-mktsharedesejado" name="add-mktsharedesejado"
                                step="0.01" min="0.01" max="100" style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="add-mktsharedesejadoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-segmentocultura">Segmento/Cultura</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-segmentocultura" required>
                                <option value="">Selecione...</option>
                                @foreach ($segmentoculturas as $segmentocultura)
                                    <option value={{ $segmentocultura->id }}> {{ $segmentocultura->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-segmentoculturaError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-municipio">Municípios</label>
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
                            <label class="mb-0" for="add-observacao">Observação</label>
                            <textarea type="text" class="form-control" name="add-observacao" maxlength="100"></textarea>
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">
                        {{ 'Alterar Unidade de Área' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/unidadesarea" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-qtdarea">Quantidade</label>
                            <input type="number" class="form-control" id="up-qtdarea" name="up-qtdarea" step="0.01"
                                min="0.01" style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="up-qtdareaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-valorunitario">Unidade de Medida</label>
                            <input type="text" class="form-control" id="up-unidademedida" name="up-unidademedida"
                                maxlength="45" style="width: 120px;" required>
                            <span class="text-danger" id="up-unidademedidaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-mktsharedesejado">Market Share Desejado (%)</label>
                            <input type="number" class="form-control" id="up-mktsharedesejado" name="up-mktsharedesejado"
                                step="0.01" min="0.01" max="100" style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="up-mktsharedesejadoError"></span>
                        </div>
                        <div id="select-segmentocultura" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-municipio" class="form-group col-xs-2">
                            <label class="mb-0" for="up-municipio">Municípios</label>
                            <select class="form-control selectpicker" data-live-search="true" name="up-municipio" required>
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
                            <label class="mb-0" for="up-observacao">Observação</label>
                            <textarea type="text" class="form-control" id="up-observacao" name="up-observacao" maxlength="100"></textarea>
                            <span class="text-danger" id="up-observacaoError"></span>
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
                        {{ __('Ver Unidade de Área') }}
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
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-qtdarea">Quantidade</label>
                            <input type="text" class="form-control" id="v-qtdarea" name="v-qtdarea"
                                style="text-align: right; width: 150px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-mktsharedesejado">Market Share Desejado (%)</label>
                            <input type="text" class="form-control" id="v-mktsharedesejado" name="v-mktsharedesejado"
                                style="text-align: right; width: 100px;"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-segmentocultura">Segmento/Cultura</label>
                            <input type="text" class="form-control" id="v-segmentocultura" name="v-segmentocultura"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-municipio">Município/UF</label>
                            <input type="text" class="form-control" id="v-municipio" name="v-municipio" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-observacao">Observação</label>
                            <textarea type="text" class="form-control" id="v-observacao" name="v-observacao"
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">
                        {{ __('Excluir Unidade de Área') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/unidadesarea" method="POST" id="deleteForm">
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
        // UnidadesArea
        $(document).ready(function() {

            var table = $('#dataTableUnidadesArea').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#select-segmentocultura').html(
                    '<label class="mb-0" for="up-segmentocultura">Segmento/Cultura</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-segmentocultura" required>' +
                    '   @foreach ($segmentoculturas as $segmentocultura)' +
                    '       <option value={{ $segmentocultura->id }}>{{ $segmentocultura->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-segmentocultura'] option[value='" + data[6] + "']").attr('selected',
                    'selected');

                $("select[name='up-municipio'] option[value='" + data[8] + "']").attr('selected',
                    'selected');
                $("select[name='up-municipio'] option[value='" + data[8] + "']").text(data[7]);

                $('#editForm').attr('action', '/unidadesarea/' + data[0]);
                $('#up-qtdarea').val(data[2]);
                $('#up-unidademedida').val(data[3]);
                $('#up-mktsharedesejado').val(data[5]);
                $('#up-observacao').val(data[10]);
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
                $('#v-qtdarea').val(data[1]);
                $('#v-mktsharedesejado').val(data[4]);
                $('#v-segmentocultura').val(data[6]);
                $('#v-municipio').val(data[8]);
                $('#v-observacao').val(data[10]);

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

                $('#deleteForm').attr('action', '/unidadesarea/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[4] + '% de ' + data[1] + ' de ' + data[5] +
                    ' em ' + data[7] +
                    '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

 @include('scripts.confirmdeletion')

@endsection
