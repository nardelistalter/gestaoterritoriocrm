@extends('layouts.template')

@section('titulo', 'Safras')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Safras') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Safras') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableSafra" class="table table-bordered table-sm table-responsive text-center datatable"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify">
                                <th class="th-sm">id</th>
                                <th class="th-sm">Descrição</th>
                                <th class="th-sm">Mês Início</th>
                                <th style="display: none;">mesNum</th>
                                <th class="th-sm">Ações</th>
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
                                    <th>{{ $obj->id }}</th>
                                    <td>{{ $obj->descricao }}</td>
                                    <td>{{ $mes }}</td>
                                    <td style="display: none;">{{ $obj->mesInicio }}</td>
                                    <td>
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
                        <tfoot>
                            <tr>
                                <th class="th-sm">id</th>
                                <th class="th-sm">Descrição</th>
                                <th class="th-sm">Mês Início</th>
                                <th style="display: none;">mesNum</th>
                                <th class="th-sm">Ações</th>
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
                <form action="{{ action('App\Http\Controllers\SafraController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="add-safra">Descrição</label>
                            <input type="text" class="form-control" id="add-safra" name="add-safra">
                            <span class="text-danger" id="add-safraError"></span>
                        </div>
                        <div class="form-group">
                            <label for="add-mesInicio">Mês Início</label>
                            <select class="form-control selectpicker" data-live-search="true" name="add-mesInicio">
                                <option value="">Selecione um Mês</option>
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
                            <span class="text-danger" id="add-mesInicioError"></span>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                            title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                                class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                    </div>
                </form>
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
                <form action="/safra" method="POST" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="up-safra">Descrição</label>
                            <input type="text" class="form-control" id="up-safra" name="up-safra" required>
                            <span class="text-danger" id="up-safraError"></span>
                        </div>
                        <div id="select-safra" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                            title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                                class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                    </div>
                </form>
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
                <form action="" method="POST" id="viewForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="v-id">id</label>
                            <input type="text" class="form-control" id="v-id" name="v-id" style="width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label for="v-safra">Descrição</label>
                            <input type="text" class="form-control" id="v-safra" name="v-safra" readonly>
                        </div>
                        <div class="form-group">
                            <label for="v-mesInicio">Mês Início</label>
                            <input type="text" class="form-control" id="v-mesInicio" name="v-mesInicio" readonly>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                            title="Sair"><i class="fas fa-undo-alt mr-1"></i>{{ __('Sair') }}</button>
                    </div>
                </form>
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Safra') }}</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/safra" method="POST" id="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <div id="delete-modal-body">
                            <!-- Content Jquery -->
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i
                                class="fas fa-undo-alt mr-1"></i>{{ __('Não') }}</button>
                        <button type="submit" class="btn btn-danger"><i
                                class="fas fa-trash-alt mr-1"></i>{{ __('Sim') }}</button>
                    </div>
                </form>
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

                $('#select-safra').html('<label for="up-mesInicio">Mês Início</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="up-mesInicio">' +
                    '   <option value="">Selecione um Mês</option>' +
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

                $("select[name='up-mesInicio'] option[value='" + data[3] + "']").attr('selected','selected');

                $('#up-safra').val(data[1]);
                $('#up-mesInicio').val(data[2]);

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
                $('#v-mesInicio').val(data[2]);

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

@endsection
