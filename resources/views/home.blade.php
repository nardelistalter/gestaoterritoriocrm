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
                        <label class="mb-0">Gerente:</label>
                        <select id="selectgerente" class="form-control">
                            <option value="0">TODOS</option>
                            @foreach ($gerentes as $gerente)
                                <option value={{ $gerente->id }}> {{ $gerente->nome }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="col">
                        <label class="mb-0">Consultor:</label>
                        <select id="selectconsultor" name="selectconsultor" class="form-control">
                            <option value="0" id="selectconsultor_todos">TODOS</option>
                            @foreach ($consultores as $consultor)
                                <option value={{ $consultor->id }} class="{{ $consultor->gerente_id }}">
                                    {{ $consultor->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="mb-0">Grupo de Clientes:</label>
                        <select id="selectgrupocliente" name="selectgrupocliente" class="form-control">
                            <option value="0" id="selectgrupocliente_todos">TODOS</option>
                            @foreach ($grupoclientes as $grupocliente)
                                <option value={{ $grupocliente->id }} class="{{ $grupocliente->user_id }}">
                                    {{ $grupocliente->descricao }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="mb-0">Safra:</label>
                        <select id="selectsafra" class="form-control">
                            @foreach ($safras as $safra)
                                <option value={{ $safra->id }}> {{ $safra->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1">
                        <label class="mb-0" for="XXXXXX"></label>
                        <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal"
                            data-target="#addModal" onclick="filtrar()"><i class="fas fa-plus-circle m-1"
                                data-toggle="tooltip" data-placement="top"
                                title="Incluir item"></i>{{ __('Filtrar') }}</button>
                    </div>
                </div>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">Painel de Controle</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" style="background-color: #dffaff;">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Potencial de Acesso
                                </div>
                                <div id="cardtotalpotencialacesso" class="h5 mb-0 font-weight-bold text-gray-800">R$
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
                <div class="card border-left-success shadow h-100 py-2" style="background-color: #e9ffdf;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Meta</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div id="cardtotalmeta" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">R$
                                            {{ number_format($totalmeta->Total, 2, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            {{--
                                            number_format(($totalvenda->Total/$totalmeta->Total)*100,2,',','.')
                                            --}};
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                role="progressbar" style="width: 15%;"
                                                aria-valuenow={{-- number_format(($totalmeta->
                                                Total/$totalpotencialacesso->potencialDeAcesso)*100,2,',','.')
                                                --}}
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
                <div class="card border-left-info shadow h-100 py-2" style="background-color: #fffcdf;">
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
                                                aria-valuenow={{--
                                                number_format(($totalvenda->Total/$totalmeta->Total)*100,2,',','.')
                                                --}}
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#selectgerente').change(function(e) {
                    valor = $("#selectgerente").val();
                    if (valor != 0) {
                        $("#selectconsultor option").hide();
                        $("#selectconsultor ." + valor).show();
                    } else {
                        $("#selectconsultor option").show();
                    }
                    $('#selectconsultor_todos').show();
                    $("#selectconsultor").val("0").change();
                    $("#selectgrupocliente option").hide();
                    $('#selectgrupocliente_todos').show();
                    for (let i = 0; i < $("#selectconsultor option").length; i++) {
                        console.log($("#selectconsultor option")[i].style.display);
                        if ($("#selectconsultor option")[i].style.display != "none") {
                            $("#selectgrupocliente ." + $("#selectconsultor option")[i].value).show();
                        }

                    }
                });
            });

            $(document).ready(function() {
                $('#selectconsultor').change(function(e) {
                    valor = $("#selectconsultor").val();
                    if (valor != 0) {
                        $("#selectgrupocliente option").hide();
                        $("#selectgrupocliente ." + valor).show();
                    } else {
                        $("#selectgrupocliente option").hide();
                    }
                    $('#selectgrupocliente_todos').show();
                    $("#selectgrupocliente").val("0").change();
                });
            });

            function filtrar() {
                var url = location.origin + "?";
                var adicionar = false;
                var gerente = $("#selectgerente option:selected").val();
                var consultor = $("#selectconsultor option:selected").val();
                var grupo_cliente = $("#selectgrupocliente option:selected").val();
                var safra = $("#selectsafra option:selected").val();
                console.log(gerente, consultor, grupo_cliente, safra);
                if (gerente != 0) {
                    if (adicionar) {
                        url += "&";
                    }
                    url += "gerente=" + gerente;
                    adicionar = true;
                }
                if (consultor != 0) {
                    if (adicionar) {
                        url += "&";
                    }
                    url += "consultor=" + consultor;
                    adicionar = true;
                }
                if (grupo_cliente != 0) {
                    if (adicionar) {
                        url += "&";
                    }
                    url += "grupo_cliente=" + grupo_cliente;
                    adicionar = true;
                }
                if (safra != 0) {
                    if (adicionar) {
                        url += "&";
                    }
                    url += "safra=" + safra;
                    adicionar = true;
                }
                console.log(url);
                location.href = url;
            }

            // Função para pegar os parâmetros de busca da URL
            function getParameterByName(name, url = window.location.href) {
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }

            var gerente = getParameterByName("gerente");
            var consultor = getParameterByName("consultor");
            var grupo_cliente = getParameterByName("grupo_cliente");
            var safra = getParameterByName("safra");

            if (gerente) {
                document.getElementById("selectgerente").value = gerente;
                    document.getElementById("selectgerente").dispatchEvent(new Event("change"));
                    if (consultor) {
                        document.getElementById("selectconsultor").value = consultor;
                        
                            document.getElementById("selectconsultor").dispatchEvent(new Event("change"));
                            if (grupo_cliente) {
                                document.getElementById("selectgrupocliente").value = grupo_cliente;
                            }
                    }
            }

            if (safra) {
                document.getElementById("selectsafra").value = safra;
            }

        </script>

    @endsection
