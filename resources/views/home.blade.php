@extends('layouts.template')

@section('titulo', 'Início')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button col-8">
                <div class="row">
                    <div class="col">
                        <label class="mb-0" for="add-estado">Gerente:</label>
                        <select class="form-control">
                            <option value="">TODOS</option>
                            @foreach ($gerentes as $gerente)
                                <option value={{ $gerente->id }}> {{ $gerente->nome }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="col">
                        <label class="mb-0" for="add-estado">Consultor:</label>
                        <select class="form-control">
                            <option value="">TODOS</option>
                            @foreach ($users as $user)
                                <option value={{ $user->id }}> {{ $user->nome }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="col">
                        <label class="mb-0" for="add-estado">Grupo de Clientes:</label>
                        <select class="form-control">
                            <option value="">TODOS</option>
                            @foreach ($grupoclientes as $grupocliente)
                                <option value={{ $grupocliente->id }}> {{ $grupocliente->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="mb-0" for="add-estado">Safra:</label>
                        <select class="form-control">
                            @foreach ($safras as $safra)
                                <option value={{ $safra->id }}> {{ $safra->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">Painel de Controle</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Potencial de Acesso
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">R$
                                    {{ number_format($totalpotencialacesso->potencialDeAcesso, 2, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Meta</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">R$
                                            {{ number_format($totalmeta->Total, 2, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            {{--
                                            number_format(($totalvenda->Total/$totalmeta->Total)*100,2,',','.')
                                            --}};
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                role="progressbar" style="width: 5%"
                                                aria-valuenow={{ number_format(($totalmeta->Total / $totalpotencialacesso->potencialDeAcesso) * 100, 2, ',', '.') }}
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Venda Realizada</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">R$
                                            {{ number_format($totalvenda->Total, 2, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            {{--
                                            number_format(($totalvenda->Total/$totalmeta->Total)*100,2,',','.')
                                            --}};
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                role="progressbar" style="width: 80%"
                                                aria-valuenow={{ number_format(($totalvenda->Total / $totalmeta->Total) * 100, 2, ',', '.') }}
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
                <!-- Content Datatable -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grupos de Clientes</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatableDashboardGrupoClientes" class="datatable table table-sm text-center rounded"
                                cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr class="text-justify border">
                                        <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                        <th class="th-sm border-bottom border-left">Potencial de Acesso</th>
                                        <th class="th-sm border-bottom border-left">Meta</th>
                                        <th class="th-sm border-bottom border-left border-right">Vendas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupoclientetotals as $grupoclientetotal)
                                        <tr>
                                            <th class="align-middle border-left">
                                                {{ strtoupper($grupoclientetotal->descricao) }}
                                            </th>
                                            <td class="align-middle border-left">R$
                                                {{ number_format($grupoclientetotal->potencialDeAcesso, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle border-left">R$
                                                {{ number_format($grupoclientetotal->meta, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle border-left border-right">R$
                                                {{ number_format($grupoclientetotal->venda, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <th class="th-sm border-bottom border-left">Grupo de Clientes</th>
                                        <th class="th-sm border-bottom border-left">Potencial de Acesso</th>
                                        <th class="th-sm border-bottom border-left">Meta</th>
                                        <th class="th-sm border-bottom border-left border-right">Vendas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Content Datatable -->
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-5">
                <!-- Content Datatable -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Grupos de Produtos</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatableDashboardGrupoProdutos" class="datatable table table-sm text-center rounded"
                                cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr class="text-justify border">
                                        <th class="th-sm border-bottom border-left">Grupo de Produtos</th>
                                        <th class="th-sm border-bottom border-left border-right">Pot. Acesso</th>
                                        <th class="th-sm border-bottom border-left border-right">Meta</th>
                                        <th class="th-sm border-bottom border-left border-right">Vendas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupoprodutototals as $grupoprodutototal)
                                        <tr>
                                            <th class="align-middle border-left">
                                                {{ strtoupper($grupoprodutototal->descricao) }}
                                            </th>
                                            <td class="align-middle border-left">R$
                                                {{ number_format($grupoprodutototal->potencialDeAcesso, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle border-left">R$
                                                {{ number_format($grupoprodutototal->meta, 2, ',', '.') }}
                                            </td>
                                            <td class="align-middle border-left border-right">R$
                                                {{ number_format($grupoprodutototal->venda, 2, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <th class="th-sm border-bottom border-left">Produtos</th>
                                        <th class="th-sm border-bottom border-left border-right">Pot. Acesso</th>
                                        <th class="th-sm border-bottom border-left border-right">Meta</th>
                                        <th class="th-sm border-bottom border-left border-right">Vendas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End Content Datatable -->
            </div>
        </div>

        <!-- Content -->
        {{--<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Outras Informações</h6>
            </div>

            <div class="card-body">
                <h5>Conteúdo</h5>
            </div>
        </div>--}}
        <!-- End Content -->

    @endsection

    @section('script_pages')

        <!-- Null -->

    @endsection
