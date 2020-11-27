@extends('layouts.template')

@section('titulo', 'Vendas')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal"
                    data-target="#addModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir Venda"></i>{{ __('Novo') }}</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">
                {{ __('Cadastro de Vendas') }}
            </h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Vendas') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableOperacao" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th id="date" class="th-sm border-bottom border-left" type="datetime-local">Data</th>
                                <th style="display: none;">data</th>
                                <th class="th-sm border-bottom border-left">Doc.</th>
                                <th class="th-sm border-bottom border-left">Cliente - Inscrição Estadual</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Produto</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Qtd</th>
                                <th style="display: none;">qtd</th>
                                <th class="th-sm border-bottom border-left">Valor Unit.</th>
                                <th style="display: none;">unit</th>
                                <th class="th-sm border-bottom border-left">Total</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operacaos as $operacao)
                                @php
                                $produto = $operacao->find($operacao->id)->produto;
                                $inscricaoestadual = $operacao->find($operacao->id)->inscricaoestadual;
                                $cliente = $inscricaoestadual->find($inscricaoestadual->id)->cliente;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $operacao->id }}</th>
                                    <td class="align-middle border-left">{{ date("d/m/Y", strtotime($operacao->data)) }}</td>
                                    <td style="display: none;">{{ $operacao->data }}</td>
                                    <td class="align-middle border-left">{{ $operacao->numeroDocumento }}</td>
                                    <td class="align-middle border-left">{{ $cliente->nome }} - {{ $inscricaoestadual->numero }}</td>
                                    <td style="display: none;">{{ $inscricaoestadual->id }}</td>
                                    <td class="align-middle border-left">{{ $produto->descricao }}</td>
                                    <td style="display: none;">{{ $produto->id }}</td>
                                    <td class="align-middle border-left">{{ number_format($operacao->qtdUnidadesProduto, 2, ',', '.') }}</td>
                                    <td style="display: none;">{{ $operacao->qtdUnidadesProduto }}</td>
                                    <td class="align-middle border-left">R$ {{ number_format($operacao->valorUnitario, 2, ',', '.') }}</td>
                                    <td style="display: none;">{{ $operacao->valorUnitario }}</td>
                                    <td class="align-middle border-left">R$ {{ number_format($operacao->qtdUnidadesProduto * $operacao->valorUnitario, 2, ',', '.') }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $operacao->id }}, '{{ date('d/m/Y', strtotime($operacao->data)) }} - {{ $operacao->numeroDocumento }} - {{ $produto->descricao }} - {{ $cliente->nome }} - {{ $inscricaoestadual->numero }}', '{{ strtolower(class_basename($operacao)) }}');" title="Excluir"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th id="date" class="th-sm border-bottom border-left" type="datetime-local">Data</th>
                                <th style="display: none;">data</th>
                                <th class="th-sm border-bottom border-left">Doc.</th>
                                <th class="th-sm border-bottom border-left">Cliente - Inscrição Estadual</th>
                                <th style="display: none;">id_fk1</th>
                                <th class="th-sm border-bottom border-left">Produto</th>
                                <th style="display: none;">id_fk2</th>
                                <th class="th-sm border-bottom border-left">Qtd</th>
                                <th style="display: none;">qtd</th>
                                <th class="th-sm border-bottom border-left">Valor Unit.</th>
                                <th style="display: none;">unit</th>
                                <th class="th-sm border-bottom border-left">Total</th>
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
                        {{ __('Nova Venda') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\OperacaoController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-data">Data</label>
                            <input type="date" class="form-control" id="add-data" name="add-data" style="width: 170px;" required>
                            <span class="text-danger" id="add-dataError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-numerodocumento">Número do Documento</label>
                            <input type="text" class="form-control" id="add-numerodocumento" name="add-numerodocumento" maxlength="15"
                                style="width: 120px;" required>
                            <span class="text-danger" id="add-numerodocumentoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-inscricaoestadual">Cliente/Inscrição Estadual</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-inscricaoestadual" required>
                                <option value="">Selecione...</option>
                                @foreach ($inscricaoestaduals as $inscricaoestadual)
                                    @php
                                    $cliente = $inscricaoestadual->find($inscricaoestadual->id)->cliente;
                                    @endphp
                                    <option value={{ $inscricaoestadual->id }}> {{ $cliente->nome }} - {{ $inscricaoestadual->numero }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-inscricaoestadualError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="add-produto">Produto</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-produto" required>
                                <option value="">Selecione...</option>
                                @foreach ($produtos as $produto)
                                    <option value={{ $produto->id }}> {{ $produto->descricao }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="add-produtoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-qtdunidadesproduto">Quantidade</label>
                            <input type="number" class="form-control" id="add-qtdunidadesproduto" name="add-qtdunidadesproduto"
                                step="0.01" min="0.01" style="text-align: right; width: 160px;" required>
                            <span class="text-danger" id="add-qtdunidadesprodutoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-valorunitario">Valor Unitário</label>
                            <input type="number" class="form-control" id="add-valorunitario" name="add-valorunitario"
                                step="0.01" min="0.01" style="text-align: right; width: 200px;" required>
                            <span class="text-danger" id="add-valorunitarioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-valortotal">Valor Total</label>
                            <input type="number" class="form-control" id="add-valortotal" name="add-valortotal"
                                step="0.01" min="0.01" style="text-align: right; width: 250px;" readonly>
                            <span class="text-danger" id="add-valortotalError"></span>
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
                        {{ 'Alterar Venda' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/operacao" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-data">Data</label>
                            <input type="date" class="form-control" id="up-data" name="up-data" style="width: 170px;" required>
                            <span class="text-danger" id="up-dataError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-numerodocumento">Número do Documento</label>
                            <input type="text" class="form-control" id="up-numerodocumento" name="up-numerodocumento" maxlength="15"
                                style="width: 120px;" required>
                            <span class="text-danger" id="up-numerodocumentoError"></span>
                        </div>
                        <div id="select-inscricaoestadual" class="form-group col-xs-2">
                            <label class="mb-0" for="up-inscricaoestadual">Cliente/Inscrição Estadual</label>
                            <select class="form-control selectpicker" data-live-search="true" name="up-inscricaoestadual" required>
                                @foreach ($inscricaoestaduals as $inscricaoestadual)
                                    @php
                                    $cliente = $inscricaoestadual->find($inscricaoestadual->id)->cliente;
                                    @endphp
                                    <option value={{ $inscricaoestadual->id }}> {{ $cliente->nome }} - {{ $inscricaoestadual->numero }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="up-inscricaoestadualError"></span>
                        </div>
                        {{--  <div id="select-inscricaoestadual" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>--}}
                        <div  id="select-produto" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-qtdunidadesproduto">Quantidade</label>
                            <input type="number" class="form-control" id="up-qtdunidadesproduto" name="up-qtdunidadesproduto"
                                step="0.01" min="0.01" style="text-align: right; width: 160px;" required>
                            <span class="text-danger" id="up-qtdunidadesprodutoError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-valorunitario">Valor Unitário</label>
                            <input type="number" class="form-control" id="up-valorunitario" name="up-valorunitario"
                                step="0.01" min="0.01" style="text-align: right; width: 200px;" required>
                            <span class="text-danger" id="up-valorunitarioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-valortotal">Valor Total</label>
                            <input type="number" class="form-control" id="up-valortotal" name="up-valortotal"
                                step="0.01" min="0.01" style="text-align: right; width: 250px;" readonly>
                            <span class="text-danger" id="up-valortotalError"></span>
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
                        {{ __('Ver Venda') }}
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
                            <label class="mb-0" for="v-data">Data</label>
                            <input type="text" class="form-control" id="v-data" name="v-data" step="0.01" min="0.01"
                                style="text-align: right; width: 120px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-numerodocumento">Número do Documento</label>
                            <input type="text" class="form-control" id="v-numerodocumento" name="v-numerodocumento"
                                style="width: 120px;" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-inscricaoestadual">Cliente/Inscrição Estadual</label>
                            <input type="text" class="form-control" id="v-inscricaoestadual" name="v-inscricaoestadual" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-produto">Produto</label>
                            <input type="text" class="form-control" id="v-produto" name="v-produto" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-qtdunidadesproduto">Quantidade</label>
                            <input type="text" class="form-control" id="v-qtdunidadesproduto" name="v-qtdunidadesproduto"
                                style="text-align: right; width: 160px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-valorunitario">Valor Unitário</label>
                            <input type="text" class="form-control" id="v-valorunitario" name="v-valorunitario"
                                style="text-align: right; width: 200px;" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="v-valortotal">Valor Total</label>
                            <input type="text" class="form-control" id="v-valortotal" name="v-valortotal"
                                step="0.01" min="0.01" max="100" style="text-align: right; width: 250px;"
                                readonly>
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
                        {{ __('Excluir Venda') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/operacao" method="POST" id="deleteForm">
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
        // Operacao
       $(document).ready(function() {

            var table = $('#datatableOperacao').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $("select[name='up-inscricaoestadual'] option[value='" + data[5] + "']").attr('selected',
                    'selected');
                $("select[name='up-inscricaoestadual'] option[value='" + data[5] + "']").text(data[4]);

                $('#select-produto').html(
                    '<label class="mb-0" for="up-produto">Produto</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-produto" required>' +
                    '   @foreach ($produtos as $produto)' +
                    '       <option value={{ $produto->id }}>{{ $produto->descricao }}</option>' +
                    '   @endforeach' +
                    '</select>' +
                    '<span class="text-danger" id="up-produtoError"></span>');

                $("select[name='up-produto'] option[value='" + data[7] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/operacao/' + data[0]);
                $('#up-id').val(data[0]);
                //$('#up-data').val(data[1]);
                document.getElementById("up-data").valueAsDate = new Date(data[2]);
                $('#up-numerodocumento').val(data[3]);
                $('#up-qtdunidadesproduto').val(data[9]);
                $('#up-valorunitario').val(data[11]);
                $('#up-valortotal').val(data[12]);

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
                $('#v-data').val(data[1]);
                $('#v-inscricaoestadual').val(data[4]);
                $('#v-numerodocumento').val(data[3]);
                $('#v-produto').val(data[6]);
                $('#v-qtdunidadesproduto').val(data[8]);
                $('#v-valorunitario').val(data[10]);
                $('#v-valortotal').val(data[12]);

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

                $('#deleteForm').attr('action', '/operacao/' + data[0]);
                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[3] + '-' + data[4] + '-' + data[6] +
                    '</strong>"?</p>');
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

 @include('scripts.confirmdeletion')

@endsection
