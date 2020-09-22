@extends('templates.template')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0" data-toggle="modal"
                    data-target="#insertModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir item"></i>Novo</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">Cadastro de Estados</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @csrf
                    <table id="dt_table_crud" class="table table table-bordered table-sm table-responsive text-center"
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
                            @foreach ($estados ?? '' as $e)
                                <tr>
                                    <th scope="row">{{ $e->id }}</th>
                                    <td>{{ $e->nome }}</td>
                                    <td>{{ $e->sigla }}</td>
                                    <td>
                                        <div>
                                            <button class="btn_crud btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#viewModal-{{ $e->id }}" data-placement="top"
                                                title="Visualizar"><i class="fas fa-eye"></i></button>

                                            <button class="btn_crud btn btn-warning btn-sm"
                                                data-toggle="modal" data-target="#updateModal-{{ $e->id }}"
                                                data-placement="top" title="Alterar"><i
                                                    class="fas fa-pencil-alt"></i></button>

                                            <button class="btn_crud btn btn-danger btn-sm"
                                                data-target="#deleteModal-{{ $e->id }}" data-toggle="modal"
                                                data-placement="top" title="Excluir"><i class="fas fa-trash-alt"
                                                    data-toggle="tooltip" title="Excluir"></i></button>

                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewModal-{{ $e->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="viewModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info">
                                                            <h5 class="modal-title text-white font-weight-bold"
                                                                id="viewModalTitle">Ver Estado</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left justify-content-start">
                                                            <form action="" method="" id="viewForm">
                                                                <div class="form-group">
                                                                    <label for="view-id" class="">id</label>
                                                                    <input type="text" class="form-control" id="view-id"
                                                                        name="view-id" style="width: 90px"
                                                                        value="{{ $e->id }}" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="view-estado">Descrição</label>
                                                                    <input type="text" class="form-control" id="view-estado"
                                                                        name="view-estado" value="{{ $e->nome }}" readonly>
                                                                </div>
                                                                <div class="form-group col-xs-2">
                                                                    <label for="view-sigla">Sigla</label>
                                                                    <input type="text" class="form-control" maxlength="2"
                                                                        style="text-transform: uppercase; width: 60px"
                                                                        id="view-sigla" name="view-sigla"
                                                                        value="{{ $e->sigla }}" readonly>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Sair</button>
                                                            <!-- <button type="submit" class="btn btn-primary">Salvar alterações</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- View Modal End -->

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal-{{ $e->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white font-weight-bold"
                                                                id="deleteModalTitle">Excluir Estado</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('estados.destroy', $e->id) }}" method="POST">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body">
                                                                <h5 class="text-body ">
                                                                    Deseja realmente excluir?
                                                                </h5>
                                                                <input type="hidden" name="estado_id" id="e_id">
                                                            </div>
                                                            <div class="modal-footer bg-light">
                                                                <button type="button" class="btn btn-success"
                                                                    data-dismiss="modal">Não</button>
                                                                <button type="submit" class="btn btn-danger"
                                                                    data-placement="top" title="Excluir">Sim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal End -->

                                            <!-- Insert Modal -->
                                            <div class="modal fade" id="insertModal" tabindex="-1" role="dialog"
                                                aria-labelledby="insertModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title text-white font-weight-bold"
                                                                id="insertModalTitle">Novo Estado</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" id="insertForm">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <!--<label for="insert-id">id</label>-->
                                                                    <input type="hidden" class="form-control" id="insert-id"
                                                                        name="insert-id" style="width: 90px" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="insert-estado">Descrição</label>
                                                                    <input type="text" class="form-control"
                                                                        id="insert-estado" name="insert-estado" required>
                                                                </div>
                                                                <div class="form-group col-xs-2">
                                                                    <label for="insert-sigla">Sigla</label>
                                                                    <input type="text" class="form-control" maxlength="2"
                                                                        style="text-transform: uppercase; width: 60px"
                                                                        id="insert-sigla" name="insert-sigla" required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Insert Modal -->

                                            <!-- Update Modal -->
                                            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                                                aria-labelledby="updateModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h5 class="modal-title text-dark font-weight-bold"
                                                                id="updateModalTitle">Alterar Estado</h5>
                                                            <button type="button" class="close text-white"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('estados.destroy', $e->id) }}"
                                                                method="POST" id="updateForm">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <!--<label for="update-id">id</label>-->
                                                                    <input type="hidden" class="form-control" id="update-id"
                                                                        name="update-id" style="width: 90px" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="update-estado">Descrição</label>
                                                                    <input type="text" class="form-control"
                                                                        id="update-estado" name="estado" required>
                                                                </div>
                                                                <div class="form-group col-xs-2">
                                                                    <label for="update-sigla">Sigla</label>
                                                                    <input type="text" class="form-control" maxlength="2"
                                                                        style="text-transform: uppercase; width: 60px"
                                                                        id="update-sigla" name="sigla" required>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer bg-light">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Salvar
                                                                alterações</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Update Modal -->

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Content Datatable -->
    </div>
    <!-- /.container-fluid -->

    <!-- Insert Modal -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="insertModalTitle">Novo Estado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="insertForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <!--<label for="insert-id">id</label>-->
                            <input type="hidden" class="form-control" id="insert-id" name="insert-id" style="width: 90px"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="insert-estado">Descrição</label>
                            <input type="text" class="form-control" id="insert-estado" name="insert-estado" required>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="insert-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="insert-sigla" name="insert-sigla"
                                required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Insert Modal -->

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark font-weight-bold" id="updateModalTitle">Alterar Estado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('estados.destroy', $e->id) }}" method="POST" id="updateForm">
                        @csrf
                        <div class="form-group">
                            <!--<label for="update-id">id</label>-->
                            <input type="hidden" class="form-control" id="update-id" name="update-id" style="width: 90px"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="update-estado">Descrição</label>
                            <input type="text" class="form-control" id="update-estado" name="estado" required>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="update-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="update-sigla" name="sigla" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update Modal -->

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">Ver Estado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        @csrf
                        <div class="form-group">
                            <label for="view-id">id</label>
                            <input type="text" class="form-control" id="view-id" name="view-id" style="width: 90px"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="view-estado">Descrição</label>
                            <input type="text" class="form-control" id="view-estado" name="view-estado" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label for="view-sigla">Sigla</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="view-sigla" name="view-sigla" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                    <!-- <button type="submit" class="btn btn-primary">Salvar alterações</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <!--<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">Excluir Estado</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('estados.destroy', 'teste') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <div class="modal-body">
                                                                <p>
                                                                    Deseja realmente excluir?
                                                                </p>
                                                                <input type="hidden" name="estado_id" id="e_id">
                                                            </div>
                                                            <div class="modal-footer bg-light">
                                                                <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                                                                <button class="btn btn-danger" onclick="enviardados()">Sim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>-->
    <!-- End Delete Modal -->

@endsection
