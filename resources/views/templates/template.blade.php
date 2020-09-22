<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href={{ url('../resources/img/logo.ico') }}>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;700&display=swap" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <link href={{ url('../resources/css/addons/datatables2.min.css') }} rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href={{ url('../resources/css/style.css') }} rel="stylesheet" type="text/css">
    <link href={{ url('../resources/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{ url('../resources/css/sb-admin-2.min.css') }} rel="stylesheet">
    <link href={{ url('../resources/css/sb-admin-2.css') }} rel="stylesheet">

    <!-- DataTables CSS -->
    <!-- <link href="../resources/css/addons/datatables2.min.css" rel="stylesheet"> -->

    <!-- DataTables Select CSS -->
    <link href={{ url('../resources/css/addons/datatables-select2.min.css') }} rel="stylesheet">

    <title>GTM</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img id="logo" src={{ url('../resources/img/logo_branco.png') }} alt="" srcset="">
                    <!--<i class="fas fa-laugh-wink"></i>-->
                </div>
                <div class="sidebar-brand-text mx-3">GTM <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Painel de Controle</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cadastro
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePessoa"
                    aria-expanded="true" aria-controls="collapsePessoa">
                    <i class="fas fa-user-alt"></i>
                    <span>Pessoas</span>
                </a>
                <div id="collapsePessoa" class="collapse" aria-labelledby="headingPessoa"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manutenção de Pessoas:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-user-tie mr-1"></i>Clientes</a>
                        <a class="collapse-item" href="#"><i class="fas fa-users mr-1"></i>Grupos de Clientes</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-card mr-1"></i>Funcionários</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-badge mr-1"></i>Usuários</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOperacao"
                    aria-expanded="true" aria-controls="collapseOperacao">
                    <i class="fas fa-fw fa-calculator"></i>
                    <span>Operações</span>
                </a>
                <div id="collapseOperacao" class="collapse" aria-labelledby="headingOperacao"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manutenção de Operações:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-crosshairs mr-1"></i></i>Metas</a>
                        <a class="collapse-item" href="#"><i class="fas fa-money-bill-alt mr-1"></i>Vendas</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTerritorio"
                    aria-expanded="true" aria-controls="collapseTerritorio">
                    <i class="fas fa-globe-americas"></i>
                    <span>Território</span>
                </a>
                <div id="collapseTerritorio" class="collapse" aria-labelledby="headingTerritorio"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manutenção de Território:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-paste mr-1"></i>Inscrições Estaduais</a>
                        <a class="collapse-item" href="#"><i class="fas fa-map-marker-alt mr-1"></i>Áreas Grupo
                            Cliente</a>
                        <a class="collapse-item" href="#"><i class="fas fa-spa mr-1"></i>Segmentos / Culturas</a>
                        <a class="collapse-item" href="#"><i class="fas fa-drafting-compass mr-1"></i>Unidades de
                            Área</a>
                        <a class="collapse-item" href="#"><i class="fas fa-map-marked-alt mr-1"></i>Municípios</a>
                        <a class="collapse-item" href="#"><i class="fas fa-map-marked mr-1"></i>Microrregiões</a>
                        <a class="collapse-item" href={{ route('estados.showAll') }}><i
                                class="fas fa-map mr-1"></i>Estados</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParametro"
                    aria-expanded="true" aria-controls="collapseParametro">
                    <i class="fas fa-sliders-h"></i>
                    <span>Parâmetros</span>
                </a>
                <div id="collapseParametro" class="collapse" aria-labelledby="headingParametro"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manut. de Parâmetros:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-business-time mr-1"></i>Programas de
                            Negócio</a>
                        <a class="collapse-item" href="#"><i class="fas fa-box-open mr-1"></i>Produtos</a>
                        <a class="collapse-item" href="#"><i class="fas fa-boxes mr-1"></i>Grupos de Produtos</a>
                        <a class="collapse-item" href="#"><i class="fas fa-calendar mr-1"></i>Safras</a>
                        <a class="collapse-item" href="#"><i class="fas fa-user-tie mr-1"></i>Cargos</a>
                        <a class="collapse-item" href="#"><i class="fas fa-vote-yea mr-1"></i>Visões Políticas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Outros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRelatorio"
                    aria-expanded="true" aria-controls="collapseRelatorio">
                    <i class="fas fa-file-export"></i>
                    <span>Relatórios</span>
                </a>
                <div id="collapseRelatorio" class="collapse" aria-labelledby="headingRelatorio"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pessoas:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-user-tie mr-1"></i>Clientes</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-card-alt mr-1"></i>Funcionários</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-badge mr-1"></i>Usuários</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Território:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-spa mr-1"></i>Culturas</a>
                        <a class="collapse-item" href="#"><i class="fas fa-money-bill-alt mr-1"></i>Potencial de
                            Negócios</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Operações:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-crosshairs mr-1"></i>Metas</a>
                        <a class="collapse-item" href="#"><i class="fas fa-money-bill-alt mr-1"></i>Vendas</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Parâmetros:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-business-time mr-1"></i>Programas de
                            Negócio</a>
                        <a class="collapse-item" href="#"><i class="fas fa-box-open mr-1"></i>Produtos</a>
                        <a class="collapse-item" href="#"><i class="fas fa-boxes mr-1"></i>Grupos de Produto</a>
                        <a class="collapse-item" href="#"><i class="fas fa-calendar mr-1"></i>Safras</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Gráficos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <h1 id="system-title" class="h3 mb-0 text-gray-800 font-weight-bold font-italic">Gestão de
                            Território e Metas</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nardeli Miguel Stalter</span>
                                <img class="img-profile rounded-circle" src={{ url('../resources/img/user-1.png') }}>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <!--<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                    <i class="fas fa-cogs fa-sm fa-key mr-2 text-gray-400"></i>
                                    Alterar Senha
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registro de Atividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                @yield('content')

                <!-- /.container-fluid -->

                <!-- Form Modal-->
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="ModalLabel">Pronto para sair?</h3>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua
                                sessão atual.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary" href="login.html">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nardeli Miguel Stalter 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger" href="login.html">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src={{ url('../resources/vendor/jquery/jquery.min.js') }}></script>
    <script src={{ url('../resources/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <!-- Core plugin JavaScript-->
    <script src={{ url('../resources/vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ url('../resources/js/sb-admin-2.min.js') }}></script>

    <!-- Page level plugins -->
    <script src={{ url('../resources/resources/vendor/chart.js/Chart.min.js') }}></script>
    <script src={{ url('../resources/resources/vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ url('../resources/resources/vendor/datatables/dataTables.bootstrap4.min.js') }}></script>

    <!-- Page level custom scripts -->
    <script src={{ url('../resources/js/demo/chart-area-demo.js') }}></script>
    <script src={{ url('../resources/js/demo/chart-pie-demo.js') }}></script>
    <script src={{ url('../resources/js/demo/datatables-demo.js') }}></script>

    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src={{ url('../js/addons/datatables2.min.js') }}></script>

    <!-- DataTables JS -->
    <script src={{ url('../resources/js/addons/datatables2.min.js') }} type="text/javascript"></script>

    <!-- DataTables Select JS -->
    <script src={{ url('../resources/js/addons/datatables-select2.min.js') }} type="text/javascript"></script>

    <!-- JS -->
    <script src={{ url('../resources/js/javascript.js') }} type="text/javascript"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        /*table = $('#dt_table_crud').DataTable({
          retrieve: true,
          paging: false
        });*/

        //Seleção de filtro
        /*$(document).ready(function () {
          $('#dt_table_crud').dataTable({

            initComplete: function () {
              this.api().columns().every(function () {
                var column = this;
                var select = $('<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>')
                  .appendTo($(column.footer()).empty())
                  .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                      $(this).val()
                    );

                    column
                      .search(val ? '^' + val + '$' : '', true, false)
                      .draw();
                  });

                column.data().unique().sort().each(function (d, j) {
                  select.append('<option value="' + d + '">' + d + '</option>')
                });
              });
            }
          });
        });*/

        /*$(document).ready(function () {
          $('#dt_table_crud').dataTable({

            columnDefs: [{
              orderable: false,
              className: 'select-checkbox',
              targets: 0
            }],
            select: {
              style: 'os',
              selector: 'td:first-child'
            }
          });
        });*/

        /*$(document).ready(function () {
          //Pagination full Numbers
          $('#dt_table_crud').DataTable({
            "pagingType": "full_numbers"
          });
        });*/

        $(document).ready(function() {
            $('#dt_table_crud').dataTable({

                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                }
            });
        });

    </script>
</body>

</html>
