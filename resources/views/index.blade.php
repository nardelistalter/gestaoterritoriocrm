<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" type="image/x-icon" href="../resources/img/logo.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;700&display=swap" rel="stylesheet">
  <!-- MDBootstrap Datatables  -->
  <link href="../resources/css/addons/datatables2.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../resources/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../resources/css/sb-admin-2.css" rel="stylesheet">

  <!-- DataTables CSS
  <link href="../resources/css/addons/datatables2.min.css" rel="stylesheet">-->

  <!-- DataTables Select CSS  -->
  <link href="../resources/css/addons/datatables-select2.min.css" rel="stylesheet">

  <title>GTM</title>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <img id="logo" src="../resources/img/logo_branco.png" alt="" srcset="">
          <!--<i class="fas fa-laugh-wink"></i>-->
        </div>
        <div class="sidebar-brand-text mx-3">GTM <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.blade.php">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePessoa" aria-expanded="true"
          aria-controls="collapsePessoa">
          <i class="fas fa-user-alt"></i>
          <span>Pessoas</span>
        </a>
        <div id="collapsePessoa" class="collapse" aria-labelledby="headingPessoa" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manutenção de Pessoas:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-id-card-alt mr-1"></i>Funcionário/Cliente</a>
            <a class="collapse-item" href="#"><i class="fas fa-users mr-1"></i>Grupo de Clientes</a>
            <a class="collapse-item" href="#"><i class="fas fa-id-badge mr-1"></i>Usuário</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOperacao"
          aria-expanded="true" aria-controls="collapseOperacao">
          <i class="fas fa-fw fa-calculator"></i>
          <span>Operações</span>
        </a>
        <div id="collapseOperacao" class="collapse" aria-labelledby="headingOperacao" data-parent="#accordionSidebar">
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
            <a class="collapse-item" href="#"><i class="fas fa-paste mr-1"></i>Inscrição Estadual</a>
            <a class="collapse-item" href="#"><i class="fas fa-map-marker-alt mr-1"></i>Área Grupo Cliente</a>
            <a class="collapse-item" href="#"><i class="fas fa-spa mr-1"></i>Segmento / Cultura</a>
            <a class="collapse-item" href="#"><i class="fas fa-drafting-compass mr-1"></i>Unidades de Área</a>
            <a class="collapse-item" href="#"><i class="fas fa-map-marked-alt mr-1"></i>Município</a>
            <a class="collapse-item" href="#"><i class="fas fa-map-marked mr-1"></i>Microrregião</a>
            <a class="collapse-item" href="#"><i class="fas fa-map mr-1"></i>Estado</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParametro"
          aria-expanded="true" aria-controls="collapseParametro">
          <i class="fas fa-sliders-h"></i>
          <span>Parâmetros</span>
        </a>
        <div id="collapseParametro" class="collapse" aria-labelledby="headingParametro" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manut. de Parâmetros:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-business-time mr-1"></i>Programas de Negócio</a>
            <a class="collapse-item" href="#"><i class="fas fa-box-open mr-1"></i>Produtos</a>
            <a class="collapse-item" href="#"><i class="fas fa-boxes mr-1"></i>Grupos de Produto</a>
            <a class="collapse-item" href="#"><i class="fas fa-calendar mr-1"></i>Safras</a>
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
        <div id="collapseRelatorio" class="collapse" aria-labelledby="headingRelatorio" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pessoas:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-user-tie mr-1"></i>Clientes</a>
            <a class="collapse-item" href="#"><i class="fas fa-id-card-alt mr-1"></i>Funcionários</a>
            <a class="collapse-item" href="#"><i class="fas fa-id-badge mr-1"></i>Usuários</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Território:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-spa mr-1"></i>Culturas</a>
            <a class="collapse-item" href="#"><i class="fas fa-money-bill-alt mr-1"></i>Potencial de Negócios</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Operações:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-crosshairs mr-1"></i>Metas</a>
            <a class="collapse-item" href="#"><i class="fas fa-money-bill-alt mr-1"></i>Vendas</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Parâmetros:</h6>
            <a class="collapse-item" href="#"><i class="fas fa-business-time mr-1"></i>Programas de Negócio</a>
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

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-->

          <div>
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold font-italic">Gestão de Território e Metas</h1>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <!-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>-->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>-->

            <!--<div class="topbar-divider d-none d-sm-block"></div>-->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nardeli Miguel Stalter</span>
                <img class="img-profile rounded-circle" src="../resources/img/user-1.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
              <button type="button" class="btn btn-group-sm btn-success mb-0"><i class="icon ion-md-add-circle mr-1"
                  data-toggle="tooltip" data-placement="top" title="Novo"></i>Novo</button>
              <!--<button type="button" class="btn btn-group-sm btn-info mb-0"><i class="icon ion-md-eye mr-1"
                  data-toggle="tooltip" data-placement="top" title="Visualizar"></i></button>
              <button type="button" class="btn btn-group-sm btn-warning mb-0"><i class="icon ion-md-create mr-1"
                  data-toggle="tooltip" data-placement="top" title="Editar"></i></button>
              <button type="button" class="btn btn-group-sm btn-danger mb-0"><i class="icon ion-md-trash mr-1"
                  data-toggle="tooltip" data-placement="top" title="Excluir"></i></button>-->
            </div>

            <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>-->
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Cadastro de Pessoa</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Funcionários e Clientes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dt_table_crud" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th class="th-sm">Position
                      </th>
                      <th class="th-sm">Office
                      </th>
                      <th class="th-sm">Age
                      </th>
                      <th class="th-sm">Start date
                      </th>
                      <th class="th-sm">Salary
                      </th>
                      <th class="th-sm">Ações
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>

                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>43</td>
                      <td>2012/12/18</td>
                      <td>$313,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>

                      <td>Regional Director</td>
                      <td>London</td>
                      <td>19</td>
                      <td>2010/03/17</td>
                      <td>$385,750</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Systems Administrator</td>
                      <td>New York</td>
                      <td>59</td>
                      <td>2009/04/10</td>
                      <td>$237,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>41</td>
                      <td>2012/10/13</td>
                      <td>$132,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Personnel Lead</td>
                      <td>Edinburgh</td>
                      <td>35</td>
                      <td>2012/09/26</td>
                      <td>$217,500</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Development Lead</td>
                      <td>New York</td>
                      <td>30</td>
                      <td>2011/09/03</td>
                      <td>$345,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Chief Marketing Officer (CMO)</td>
                      <td>New York</td>
                      <td>40</td>
                      <td>2009/06/25</td>
                      <td>$675,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Pre-Sales Support</td>
                      <td>New York</td>
                      <td>21</td>
                      <td>2011/12/12</td>
                      <td>$106,450</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Sales Assistant</td>
                      <td>Sidney</td>
                      <td>23</td>
                      <td>2010/09/20</td>
                      <td>$85,600</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2009/10/09</td>
                      <td>$1,200,000</td>
                      <td>
                        <button class="btn_crud btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Visualizar"><i class="icon ion-md-eye mr-1"></i></button>
                        <button class="btn_crud btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Editar"><i class="icon ion-md-create mr-1"></i></button>
                        <button class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                          title="Excluir"><i class="icon ion-md-trash mr-1"></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>
                      </th>
                      <th>Position
                      </th>
                      <th>Office
                      </th>
                      <th>Age
                      </th>
                      <th>Start date
                      </th>
                      <th>Salary
                      </th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

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
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../resources/vendor/jquery/jquery.min.js"></script>
  <script src="../resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../resources/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../resources/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../resources/resources/vendor/chart.js/Chart.min.js"></script>
  <script src="../resources/resources/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../resources/resources/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../resources/js/demo/chart-area-demo.js"></script>
  <script src="../resources/js/demo/chart-pie-demo.js"></script>
  <script src="../resources/js/demo/datatables-demo.js"></script>

  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="../js/addons/datatables2.min.js"></script>

  <!-- DataTables JS -->
  <script src="../resources/js/addons/datatables2.min.js" type="text/javascript"></script>

  <!-- DataTables Select JS -->
  <script src="../resources/js/addons/datatables-select2.min.js" type="text/javascript"></script>

  <script>
    $(function () {
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


    $(document).ready(function () {
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
    });
  </script>

</body>

</html>
