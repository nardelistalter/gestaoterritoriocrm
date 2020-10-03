@extends('layouts.template')

@section('titulo', 'Estados')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0" data-toggle="modal"
                    data-target="#addModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir item"></i>Novo</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">Cadastro de Estados</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estados Brasileiros</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableEstado" class="table table-bordered table-sm table-responsive text-center datatable"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify">
                                <th class="th-sm">id</th>
                                <th class="th-sm">Nome</th>
                                <th class="th-sm">Sigla</th>
                                <th class="th-sm">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estados as $e)
                                <tr>
                                    <th>{{ $e->id }}</th>
                                    <td>{{ $e->nome }}</td>
                                    <td>{{ $e->sigla }}</td>
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
                                <th class="th-sm">Nome</th>
                                <th class="th-sm">Sigla</th>
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
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">Novo Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ action('App\Http\Controllers\EstadoController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="add-estado">Descrição</label>
                            <input type="text" class="form-control" id="add-estado" name="add-estado">
                            <span class="text-danger" id="add-estadoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="add-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="add-sigla" name="add-sigla">
                            <span class="text-danger" id="add-siglaError"></span>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Cancelar"><i
                            class="fas fa-undo-alt mr-1"></i>Cancelar</button>
                        <button type="submit" class="btn btn-success"  data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>Salvar</button>    
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">Alterar Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/estado" method="POST" id="editForm">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="up-estado">Descrição</label>
                            <input type="text" class="form-control" id="up-estado" name="up-estado" required>
                            <span class="text-danger" id="up-estadoError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="up-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="up-sigla" name="up-sigla" required>
                            <span class="text-danger" id="up-estadoError"></span>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Cancelar"><i
                            class="fas fa-undo-alt mr-1"></i>Cancelar</button>
                        <button type="submit" class="btn btn-success"  data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>Salvar</button>    
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">Ver Estado</h5>
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
                            <label for="v-estado">Descrição</label>
                            <input type="text" class="form-control" id="v-estado" name="v-estado" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="v-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="v-sigla" name="v-sigla" readonly>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Sair"><i
                            class="fas fa-undo-alt mr-1"></i>Sair</button>
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">Excluir Estado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/estado" method="POST" id="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <div id="delete-modal-body">
                            <!-- Content Jquery -->
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-success" data-dismiss="modal"><i
                            class="fas fa-undo-alt mr-1"></i>Não</button>
                        <button type="submit" class="btn btn-danger"><i
                            class="fas fa-trash-alt mr-1"></i>Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End DELETE Modal -->

@endsection

@section('script_pages')

    <script type="text/javascript">
        // Estado
        $(document).ready(function() {

            var table = $('#datatableEstado').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#up-estado').val(data[1]);
                $('#up-sigla').val(data[2]);

                $('#editForm').attr('action', '/estado/' + data[0]);
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
                $('#v-estado').val(data[1]);
                $('#v-sigla').val(data[2]);

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
                $('#deleteForm').attr('action', '/estado/' + data[0]);
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

@endsection
