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
  {{-- <link rel="stylesheet" href="./css/style.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
</head>

<body>
<!-- ! Body -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-tachometer-alt"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      {{-- <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li> --}}

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
                 
                  
                  <a class="collapse-item" href="{{ route('adApp.index') }}">Tous les Rendez-vous</a>
                  <a class="collapse-item" href="{{ route('adApp.create')}}">Ajouter Rendez-vous</a>
                  
              </div>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
            aria-expanded="true" aria-controls="collapseTwo1">
            <i class="fa-solid fa-calendar-check"></i>
            <span>Docteurs</span>
        </a>
        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               
                
                <a class="collapse-item" href="{{ route('doctors.index') }}">Tous Docteurs
                <a class="collapse-item" href="{{ route('doctors.create')}}">Ajouter Docteur</a>
                
            </div>
        </div>
    </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
              aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fa-solid fa-hospital-user"></i>
              <span>Patients</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a  class="collapse-item" href="{{ route('patients.index') }}">Tous les patient</a>
                  <a class="collapse-item" href="{{ route('patients.create') }}">Ajouter patient</a>
                  
              </div>
          </div>
      </li>
      
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
              aria-expanded="true" aria-controls="collapseUtilities1">
              <i class="fa-solid fa-hospital-user"></i>
              <span>Staffs</span>
          </a>
          <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
              data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a  class="collapse-item" href="{{ route('staffs.index') }}">Tous les Sttafs</a>
                  <a class="collapse-item" href="{{ route('staffs.create') }}">Ajouter Sttaf</a>
                  
              </div>
          </div>
      </li>

      

      
      <li class="nav-item">
          <a class="nav-link" href="{{route('admin.profile')}}">
            
              <i class="fa-solid fa-file-lines"></i>
               <span>Profil</span> 
            </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          
          <i class="fa-solid fa-house"></i>
             <span >Page d'acceuil</span> 
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
     <form action="{{url('/search')}}"  method="get"
     class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
     <div class="input-group">
         <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Votre recherche..."
             aria-label="Search" aria-describedby="basic-addon2">
         <div class="input-group-append">
             <button class="btn btn-primary" type="submit">
                 <i class="fas fa-search fa-sm"></i>
             </button>
         </div>
     </div>
 </form>
        


              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                  <!-- Nav Item - Alerts -->
                 

                  <!-- Nav Item - Messages -->

                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <div class="d-flex flex-column">
                            <span class="mr-4 d-none d-lg-block text-gray-600 small">{{Auth::user()->name}}</span>
                            <h5 class="mr-4 d-none d-lg-block text-primary small">{{Auth::user()->role}}</h5>
                        </div>
                      <img class="img-profile rounded-circle"
                      src="{{ asset(Auth::user()->picture) }}">
                              
                      </a>
                      <!-- Dropdown - User Information -->
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                          aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="{{route('admin.profile')}}">
                            {{-- {{ __('Profile') }} --}}
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profil
                          </a>
                          
                          <a class="dropdown-item" href="{{route('edit.profile')}}">
                          
                              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                              Modifier 
                          </a>
                          
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}" >
                              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                              Se déconnecter
                          </a>
                      </div>
                  </li>

              </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- /.container-fluid -->
          <main>
      
            @yield('content')
          </main>
      </div>
      <!-- End of Main Content -->



  </div>
  <!-- End of Content Wrapper -->

</div>



    <!-- ! Main -->
    
   

<script src="{{ asset('js/script.js') }}"></script> 
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
</body>

</html>