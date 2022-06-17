<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kantin IT DEL</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins')}}/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('plugins')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('plugins')}}/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('plugins')}}/datatables-buttons/css/style.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist')}}/css/adminlte.min.css">
  <script src="{{asset('plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('plugins')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('plugins')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('plugins')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('plugins')}}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('plugins')}}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('plugins')}}/jszip/jszip.min.js"></script>
<script src="{{asset('plugins')}}/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('plugins')}}/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('plugins')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('plugins')}}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('plugins')}}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist')}}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist')}}/js/demo.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('tabeldenahsatulantaidua ')}}" class="brand-link">
      <img src="{{asset('dist')}}/img/bg.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kantin IT Del</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Kantin IT DEL</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('tabel ')}}" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Informasi
              </p>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Denah Kantin
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tabeldenah')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 1 Lantai 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeldenahsatulantaidua')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 1 Lantai 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeltengah')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin Tengah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeldenahdualantaisatu')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 2 Lantai 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeldenahdualantaidua')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 2 Lantai 2</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal Piket
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('tabeljadwalkantinsatusatu')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 1 Lantai 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeljadwalkantinsatudua')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 1 Lantai 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeljadwalkantintengah')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin Tengah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeljadwalkantinduasatu')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 2 Lantai 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('tabeljadwalkantinduadua')}}" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Kantin 2 Lantai 2</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('tabelproduk ')}}" class="nav-link">
              <i class="nav-icon 	fas fa-box"></i>
              <p>
                Produk
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{url('tabelkomentar')}}" class="nav-link">
              <i class="nav-icon fas fa-file-medical"></i>
              <p>
                Alergi
              </p>
            </a>
            
            <li class="nav-item">
            <a href="{{url('tabelizin')}}" class="nav-link">
              <i class="nav-icon far fa-comment-alt "></i>
              <p>
                Izin
              </p>
            </a>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-sign-out-alt"></i>{{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
            </a>
     
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>