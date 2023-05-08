<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAF Cabinet - Dashboard</title>
    <!-- Favicon -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles -->


    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
</head>

<body>
    <!-- ! Body -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="" id="logos"><img src="{{ asset('medicalr.png') }}" alt="medical" width="60px"
                        class="medic">
                    IAF Cabinet</a>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <div class="mx-3 mt-3 text-center text-white fw-bold fs-6">Bienvenue {{ Auth::user()->name }} &nbsp;<i class="fa-solid fa-circle" style="font-size: 0.5em; color: #50f00a;"></i></div>

            <!-- Divider -->


            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Rendez-vous</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class="collapse-item" href="{{ route('docApp.index') }}">Tous les Rendez-vous</a>
                        <a class="collapse-item" href="{{ route('docApp.create') }}">Ajouter Rendez-vous</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo4"
                    aria-expanded="true" aria-controls="collapseTwo4">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Dossier Medical</span>
                </a>
                <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">


                        <a class="collapse-item" href="{{ route('dFolder.index') }}">les Dossiers</a>
                        <a class="collapse-item" href="{{ route('dFolder.create') }}">Ajouter Dossier</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-hospital-user"></i>
                    <span>Patient</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('Dpatients.index') }}">Tous les patient</a>
                        <a class="collapse-item" href="{{ route('Dpatients.create') }}">Ajouter patient</a>

                    </div>
                </div>
            </li>




            <li class="nav-item">
                <a class="nav-link" href="{{ route('doc.profile') }}">

                    <i class="fa-solid fa-file-lines"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">

                    <i class="fa-solid fa-house"></i>
                    <span>Page d'acceuil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="fa-solid fa-power-off"></i>
                    <span>Se déconnecter</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


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
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex flex-column">
                                    <span
                                        class="mr-2 d-none d-lg-block text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <h5 class="mr-2 d-none d-lg-block text-primary small">{{ Auth::user()->role }}
                                    </h5>
                                </div>
                                @if (Auth::user()->picture == null)
                                    <img src="{{ asset('img/avatar/avatar.png') }}" alt=""
                                        class="img-profile rounded-circle">
                                @else
                                    <img class="img-profile rounded-circle" src="{{ asset(Auth::user()->picture) }}">
                                @endif


                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    {{-- {{ __('Profile') }} --}}
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>

                                <a class="dropdown-item" href="{{ route('edit.profile') }}">

                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Modifier
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{-- <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                          class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
              </div>

              <!-- Content Row -->
              <div class="row">

                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                          Earnings (Monthly)</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Earnings (Annual)</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                      </div>
                                      <div class="row no-gutters align-items-center">
                                          <div class="col-auto">
                                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                          </div>
                                          <div class="col">
                                              <div class="progress progress-sm mr-2">
                                                  <div class="progress-bar bg-info" role="progressbar"
                                                      style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                      aria-valuemax="100"></div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Pending Requests Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-warning shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                          Pending Requests</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Content Row -->

              <div class="row">

                  <!-- Area Chart -->
                  <div class="col-xl-8 col-lg-7">
                      <div class="card shadow mb-4">
                          <!-- Card Header - Dropdown -->
                          <div
                              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                              <div class="dropdown no-arrow">
                                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                      aria-labelledby="dropdownMenuLink">
                                      <div class="dropdown-header">Dropdown Header:</div>
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                              </div>
                          </div>
                          <!-- Card Body -->
                          <div class="card-body">
                              <div class="chart-area">
                                  <canvas id="myAreaChart"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!-- Pie Chart -->
                  <div class="col-xl-4 col-lg-5">
                      <div class="card shadow mb-4">
                          <!-- Card Header - Dropdown -->
                          <div
                              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                              <div class="dropdown no-arrow">
                                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                      aria-labelledby="dropdownMenuLink">
                                      <div class="dropdown-header">Dropdown Header:</div>
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                              </div>
                          </div>
                          <!-- Card Body -->
                          <div class="card-body">
                              <div class="chart-pie pt-4 pb-2">
                                  <canvas id="myPieChart"></canvas>
                              </div>
                              <div class="mt-4 text-center small">
                                  <span class="mr-2">
                                      <i class="fas fa-circle text-primary"></i> Direct
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-circle text-success"></i> Social
                                  </span>
                                  <span class="mr-2">
                                      <i class="fas fa-circle text-info"></i> Referral
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Content Row -->
              <div class="row">

                  <!-- Content Column -->
                  <div class="col-lg-6 mb-4">

                      <!-- Project Card Example -->
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                          </div>
                          <div class="card-body">
                              <h4 class="small font-weight-bold">Server Migration <span
                                      class="float-right">20%</span></h4>
                              <div class="progress mb-4">
                                  <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                      aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <h4 class="small font-weight-bold">Sales Tracking <span
                                      class="float-right">40%</span></h4>
                              <div class="progress mb-4">
                                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <h4 class="small font-weight-bold">Customer Database <span
                                      class="float-right">60%</span></h4>
                              <div class="progress mb-4">
                                  <div class="progress-bar" role="progressbar" style="width: 60%"
                                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <h4 class="small font-weight-bold">Payout Details <span
                                      class="float-right">80%</span></h4>
                              <div class="progress mb-4">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                      aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <h4 class="small font-weight-bold">Account Setup <span
                                      class="float-right">Complete!</span></h4>
                              <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                      aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                          </div>
                      </div>

                      <!-- Color System -->
                      <div class="row">
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-primary text-white shadow">
                                  <div class="card-body">
                                      Primary
                                      <div class="text-white-50 small">#4e73df</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-success text-white shadow">
                                  <div class="card-body">
                                      Success
                                      <div class="text-white-50 small">#1cc88a</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-info text-white shadow">
                                  <div class="card-body">
                                      Info
                                      <div class="text-white-50 small">#36b9cc</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-warning text-white shadow">
                                  <div class="card-body">
                                      Warning
                                      <div class="text-white-50 small">#f6c23e</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-danger text-white shadow">
                                  <div class="card-body">
                                      Danger
                                      <div class="text-white-50 small">#e74a3b</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-secondary text-white shadow">
                                  <div class="card-body">
                                      Secondary
                                      <div class="text-white-50 small">#858796</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-light text-black shadow">
                                  <div class="card-body">
                                      Light
                                      <div class="text-black-50 small">#f8f9fc</div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6 mb-4">
                              <div class="card bg-dark text-white shadow">
                                  <div class="card-body">
                                      Dark
                                      <div class="text-white-50 small">#5a5c69</div>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>

                  <div class="col-lg-6 mb-4">

                      <!-- Illustrations -->
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                          </div>
                          <div class="card-body">
                              <div class="text-center">
                                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                      src="img/undraw_posting_photo.svg" alt="...">
                              </div>
                              <p>Add some quality, svg illustrations to your project courtesy of <a
                                      target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                                  constantly updated collection of beautiful svg images that you can use
                                  completely free and without attribution!</p>
                              <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                                  unDraw &rarr;</a>
                          </div>
                      </div>

                      <!-- Approach -->
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                          </div>
                          <div class="card-body">
                              <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                  CSS bloat and poor page performance. Custom CSS classes are used to create
                                  custom components and custom utility classes.</p>
                              <p class="mb-0">Before working with this theme, you should become familiar with the
                                  Bootstrap framework, especially the utility classes.</p>
                          </div>
                      </div>

                  </div>
              </div>

          </div> --}}
                <!-- /.container-fluid -->
                <main>

                    <main>
                        @if (session('error'))
                            <x-alert type="danger" :message="session('error')" />
                        @endif
                        @yield('content')
                    </main>
                </main>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            {{-- <footer class="sticky-footer bg-white">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Cabinet Medical 2023</span>
              </div>
          </div>
      </footer> --}}
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    {{-- <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Elegant</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="{{ route('dash') }}"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                      <i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Rendez-vous
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{ route('docApp.index') }}">Tous les Rendez-vous</a>
                        </li>
                        <li>
                            <a href="{{ route('docApp.create')}}">Ajouter Rendez-vous</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a class="show-cat-btn" href="##">
                      <i class="fa-solid fa-hospital-user"></i>&nbsp;&nbsp;&nbsp;Patient
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{ route('Dpatient.index') }}">Tous les patient</a>
                        </li>
                        <li>
                            <a href="{{ route('Dpatient.create') }}">Ajouter patient</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="comments.html">
                      <i class="fa-solid fa-file-lines"></i>&nbsp;&nbsp;&nbsp;
                        Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                      <i class="fa-solid fa-power-off"></i>&nbsp;&nbsp;&nbsp;
                        Se déconnecter
                    </a>
                </li>
            </ul>
            
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><img src="{{Auth::user()->picture}}" alt="">
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">{{Auth::user()->name}}</span>
                <span class="sidebar-user__subtitle">{{Auth::user()->role}}</span>
            </div>
        </a>
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
      <div class="search-wrapper">
        <i data-feather="search" aria-hidden="true"></i>
        <input type="text" placeholder="Enter keywords ..." required>
      </div>
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <div class="lang-switcher-wrapper">
        <button class="lang-switcher transparent-btn" type="button">
          EN
          <i data-feather="chevron-down" aria-hidden="true"></i>
        </button>
        <ul class="lang-menu dropdown">
          <li><a href="##">English</a></li>
          <li><a href="##">French</a></li>
          <li><a href="##">Arabe</a></li>
        </ul>
      </div>
      <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
        <span class="sr-only">Switch theme</span>
        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
      </button>
      <div class="notification-wrapper">
        <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
          <span class="sr-only">To messages</span>
          <span class="icon notification active" aria-hidden="true"></span>
        </button>
        <ul class="users-item-dropdown notification-dropdown dropdown">
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">System just updated</span>
                <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon danger">
                <i data-feather="info" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">The cache is full!</span>
                <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
              </div>
            </a>
          </li>
          <li>
            <a href="##">
              <div class="notification-dropdown-icon info">
                <i data-feather="check" aria-hidden="true"></i>
              </div>
              <div class="notification-dropdown-text">
                <span class="notification-dropdown__title">New Subscriber here!</span>
                <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
              </div>
            </a>
          </li>
          <li>
            <a class="link-to-page" href="##">Go to Notifications page</a>
          </li>
        </ul>
      </div>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><img src="{{Auth::user()->picture}}" alt=""></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              <i data-feather="user" aria-hidden="true"></i>
              <span>Profile</span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="##">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav> --}}


    <!-- ! Main -->



    <!-- Chart library -->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
</body>

</html>
