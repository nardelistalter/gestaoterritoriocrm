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
                                <th class="th-sm border-bottom border-left">Grupo de Produtos</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Safra</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left">Part. Desejada</th>
                                <th style="display: none;">partdesejada</th>
                                <th class="th-sm border-bottom border-left">Ano</th>
                                <th class="th-sm border-bottom border-left">Mês</th>
                                <th style="display: none;">mes</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metas as $meta)
                                @php
                                $grupoproduto = $meta->find($meta->id)->grupoproduto;
                                $grupocliente = $meta->find($meta->id)->grupocliente;
                                $safra = $meta->find($meta->id)->safra;
                                @endphp

                                @switch($meta->mes)
                                    @case(1)
                                    @php
                                    $mes = 'Janeiro'
                                    @endphp
                                    @break

                                    @case(2)
                                    @php
                                    $mes = 'Fevereiro'
                                    @endphp
                                    @break

                                    @case(3)
                                    @php
                                    $mes = 'Março'
                                    @endphp
                                    @break

                                    @case(4)
                                    @php
                                    $mes = 'Abril'
                                    @endphp
                                    @break

                                    @case(5)
                                    @php
                                    $mes = 'Maio'
                                    @endphp
                                    @break

                                    @case(6)
                                    @php
                                    $mes = 'Junho'
                                    @endphp
                                    @break

                                    @case(7)
                                    @php
                                    $mes = 'Julho'
                                    @endphp
                                    @break

                                    @case(8)
                                    @php
                                    $mes = 'Agosto'
                                    @endphp
                                    @break

                                    @case(9)
                                    @php
                                    $mes = 'Setembro'
                                    @endphp
                                    @break

                                    @case(10)
                                    @php
                                    $mes = 'Outubro'
                                    @endphp
                                    @break

                                    @case(11)
                                    @php
                                    $mes = 'Novembro'
                                    @endphp
                                    @break

                                    @case(12)
                                    @php
                                    $mes = 'Dezembro'
                                    @endphp
                                    @break

                                @endswitch
                                <tr>
                                    <th class="align-middle border-left">{{ $meta->id }}</th>
                                    <td class="align-middle border-left">{{ $grupocliente->descricao }}</td>
                                    <td style="display: none;">{{ $grupocliente->id }}</td>
                                    <td class="align-middle border-left">{{ $grupoproduto->descricao }}</td>
                                    <td style="display: none;">{{ $grupoproduto->id }}</td>
                                    <td class="align-middle border-left">{{ $safra->descricao }}</td>
                                    <td style="display: none;">{{ $safra->id }}</td>
                                    <td class="align-middle border-left">{{ $meta->participacaoDesejada }}</td>
                                    <td style="display: none;">{{ $meta->participacaoDesejada }}</td>
                                    <td class="align-middle border-left">{{ $meta->ano }}</td>
                                    <td class="align-middle border-left">{{ $mes }}</td>
                                    <td style="display: none;">{{ $meta->mes }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!-- href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                                                                        title="Excluir"><i class="fas fa-trash-alt"></i></!-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $meta->id }}, '{{ $grupoproduto->descricao }}-{{ $grupocliente->descricao }}-{{ $safra->descricao }}', '{{ strtolower(class_basename($meta)) }}')"
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
                                <th class="th-sm border-bottom border-left">Grupo de Produtos</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Safra</th>
                                <th style="display: none;">id_fk3</th>
                                <th class="th-sm border-bottom border-left">Part. Desejada</th>
                                <th style="display: none;">partdesejada</th>
                                <th class="th-sm border-bottom border-left">Ano</th>
                                <th class="th-sm border-bottom border-left">Mês</th>
                                <th style="display: none;">mes</th>
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
                            <label class="mb-0" for="add-grupoproduto">Grupo de Produtos</label>
                            <select class="form-control selectpicker" data-live-search="true" id="add-grupoproduto"
                                name="add-grupoproduto" required>
                                <option value="">Selecione...</option>
                                @foreach ($grupoprodutos as $grupoproduto)
                                    <option value={{ $grupoproduto->id }}> {{ $grupoproduto->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-grupoprodutoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-safra">Safra</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-safra" required>
                                <option value="">Selecione...</option>
                                @foreach ($safras as $safra)
                                    <option value={{ $safra->id }}>{{ $safra->descricao }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-safraError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-participacaodesejada">Participação Desejada</label>
                            <input type="number" class="form-control" id="add-participacaodesejada"
                                name="add-participacaodesejada" step="0.01" min="0.01"
                                style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="add-participacaodesejadaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-ano">Ano</label>
                            <input type="number" class="form-control" id="add-ano" name="add-ano"
                                step="1" min="1901" max="2100" style="width: 85px;" required>
                            <span class="text-danger" id="add-anoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-mes">Mês</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-mes"
                            style="width: 130px;" required>
                                <option value="">Selecione...</option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4">Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                            <span class="text-danger" id="add-mesError"></span>
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
                        <div id="select-grupoproduto" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-safra" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-participacaodesejada">Participação Desejada (%)</label>
                            <input type="number" class="form-control" id="up-participacaodesejada"
                                name="up-participacaodesejada" step="0.01" min="0.01"
                                style="text-align: right; width: 150px;" required>
                            <span class="text-danger" id="up-participacaodesejadaError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-ano">Ano</label>
                            <input type="number" class="form-control" id="up-ano" name="up-ano"
                                step="1" min="1901" max="2100" style="width: 85px;" required>
                            <span class="text-danger" id="up-anoError"></span>
                        </div>
                        <div id="select-mes" class="form-group col-xs-2">
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
                            <label class="mb-0" for="v-grupoproduto">Grupo de Produtos</label>
                            <input type="text" class="form-control" id="v-grupoproduto" name="v-grupoproduto" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-safra">Safra</label>
                            <input type="text" class="form-control" id="v-safra" name="v-safra" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-participacaodesejada">Participação Desejada (%)</label>
                            <input type="text" class="form-control" id="v-participacaodesejada"
                                name="v-participacaodesejada" style="text-align: right; width: 150px;" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-ano">Ano</label>
                            <input type="number" class="form-control" id="v-ano" name="v-ano"
                                step="1" min="1901" max="2100" style="width: 85px;" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-mes">Mês</label>
                            <input type="text" class="form-control" id="v-mes" name="v-mes"
                                style="width: 130px;" readonly>
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

                $('#select-grupoproduto').html(
                    '<label class="mb-0" for="up-grupoproduto">Grupo de Produtos</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-grupoproduto" required>' +
                    '   @foreach ($grupoprodutos as $grupoproduto)' +
                    '       <option value={{ $grupoproduto->id }}>{{ $grupoproduto->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-grupoproduto'] option[value='" + data[4] + "']").attr('selected',
                    'selected');

                $('#select-safra').html(
                    '<label class="mb-0" for="up-safra">Safra</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-safra" required>' +
                    '   @foreach ($safras as $safra)' +
                    '       <option value={{ $safra->id }}>{{ $safra->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='up-safra'] option[value='" + data[6] + "']").attr('selected',
                    'selected');
                
                $('#select-mes').html('<label class="mb-0" for="up-mes">Mês</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-mes" style="width: 130px;">' +
                    '   <option value="1">Janeiro</option>' +
                    '    <option value="2">Fevereiro</option>' +
                    '    <option value="3">Março</option>' +
                    '    <option value="4">Abril</option>' +
                    '    <option value="5">Maio</option>' +
                    '    <option value="6">Junho</option>' +
                    '    <option value="7">Julho</option>' +
                    '    <option value="8">Agosto</option>' +
                    '    <option value="9">Setembro</option>' +
                    '    <option value="10">Outubro</option>' +
                    '    <option value="11">Novembro</option>' +
                    '    <option value="12">Dezembro</option>' +
                    '</select>');

                $("select[name='up-mes'] option[value='" + data[11] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/meta/' + data[0]);
                $('#up-participacaodesejada').val(data[8]);
                $('#up-ano').val(data[9]);
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
                $('#v-grupoproduto').val(data[3]);
                $('#v-safra').val(data[5]);
                $('#v-participacaodesejada').val(data[7]);
                $('#v-ano').val(data[9]);
                $('#v-mes').val(data[10]);

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