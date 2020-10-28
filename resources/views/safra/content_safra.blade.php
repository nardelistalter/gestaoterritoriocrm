@extends('layouts.template')

@section('titulo', 'Safras')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Safras') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Safras') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableSafra" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Descrição</th>
                                <th class="th-sm border-bottom border-left">Ano Início</th>
                                <th class="th-sm border-bottom border-left">Mês Início</th>
                                <th style="display: none;">mesNum</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($safras as $obj)
                                @switch($obj->mesInicio)
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
                                    <th class="align-middle border-left">{{ $obj->id }}</th>
                                    <td class="align-middle border-left">{{ $obj->descricao }}</td>
                                    <td class="align-middle border-left">{{ $obj->anoInicio }}</td>
                                    <td class="align-middle border-left">{{ $mes }}</td>
                                    <td style="display: none;">{{ $obj->mesInicio }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a  href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $obj->id }}, '{{ $obj->descricao }}');" title="Excluir"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Descrição</th>
                                <th class="th-sm border-bottom border-left">Ano Início</th>
                                <th class="th-sm border-bottom border-left">Mês Início</th>
                                <th style="display: none;">mesNum</th>
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
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Nova Safra') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\SafraController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="mb-0" for="add-safra">Descrição</label>
                            <input type="text" class="form-control" id="add-safra" name="add-safra" required>
                            <span class="text-danger" id="add-safraError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-anoinicio">Ano Início</label>
                            <input type="number" class="form-control" id="add-anoinicio" name="add-anoinicio"
                                step="1" min="1901" max="2100" style="width: 85px;" required>
                            <span class="text-danger" id="add-anoinicioError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="add-mesinicio">Mês Início</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-mesinicio"
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
                            <span class="text-danger" id="add-mesinicioError"></span>
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ __('Alterar Safra') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/safra" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="mb-0" for="up-safra">Descrição</label>
                            <input type="text" class="form-control" id="up-safra" name="up-safra" required>
                            <span class="text-danger" id="up-safraError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="up-anoinicio">Ano Início</label>
                            <input type="number" class="form-control" id="up-anoinicio" name="up-anoinicio"
                                step="1" min="1901" max="2100" style="width: 85px;" required>
                            <span class="text-danger" id="up-anoinicioError"></span>
                        </div>
                        <div id="select-safra" class="form-group col-xs-2">
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">Ver Safra</h5>
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
                            <label class="mb-0" for="v-safra">Descrição</label>
                            <input type="text" class="form-control" id="v-safra" name="v-safra" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-anoinicio">Ano Início</label>
                            <input type="number" class="form-control" id="v-anoinicio" name="v-anoinicio"
                                step="1" min="1901" max="2100" style="width: 85px;" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="v-mesinicio">Mês Início</label>
                            <input type="text" class="form-control" id="v-mesinicio" name="v-mesinicio"
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">
                        {{ __('Excluir Produto') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/safra" method="POST" id="deleteForm">
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
        // Safra
        $(document).ready(function() {

            var table = $('#datatableSafra').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#select-safra').html('<label class="mb-0" for="up-mesinicio">Mês Início</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-mesinicio" style="width: 130px;">' +
                    '   <option value="">Selecione...</option>' +
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

                $("select[name='up-mesinicio'] option[value='" + data[4] + "']").attr('selected',
                    'selected');

                $('#up-safra').val(data[1]);
                $('#up-anoinicio').val(data[2]);
                $('#up-mesinicio').val(data[3]);

                $('#editForm').attr('action', '/safra/' + data[0]);
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
                $('#v-safra').val(data[1]);
                $('#v-anoinicio').val(data[2]);
                $('#v-mesinicio').val(data[3]);

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
                var conteudo = $(".modal-body").html();

                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[1] + '</strong>"?</p>');
                $('#deleteForm').attr('action', '/safra/' + data[0]);
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>
    
 @include('scripts.confirmdeletion')

@endsection
