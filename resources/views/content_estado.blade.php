@extends('templates.template')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0"><i class="icon ion-md-add-circle mr-1"
                        data-toggle="tooltip" data-placement="top" title="Novo"></i>Novo</button>
            </div>
            <h1 class="nome-pagina h3 mb-0 text-gray-800 font-weight-bold">Cadastro de Estados</h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dt_table_crud" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Código</th>
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
                                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Visualizar"><i
                                                class="icon ion-md-eye mr-1"></i></button>
                                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Editar"><i
                                                class="icon ion-md-create mr-1"></i></button>
                                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Excluir"><i
                                                class="icon ion-md-trash mr-1"></i></button>
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
    </div>
    <!-- /.container-fluid -->

@endsection
