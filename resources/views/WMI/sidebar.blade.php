<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .main-sidebar {
            width: 200px; /* Atur lebar sidebar sesuai kebutuhan */
            min-width: 200px; /* Atur lebar minimum jika diperlukan */
        }
    
        .brand-link img {
            width: 180px; /* Sesuaikan dengan lebar sidebar baru */
        }
    </style>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : '' }}</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
    <script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('plugins') }}/jszip/jszip.min.js"></script>
    <script src="{{ asset('plugins') }}/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('plugins') }}/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist') }}/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://cdn.jsdelivr.net/npm/demo@1.0.0/demo.js"></script>
    <style>
        .nav-treeview .nav-item-child {
            padding-left: 20px;
            /* Adjust the value as needed */
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2)
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <img src="{{ asset('profil/' . Auth::user()->foto) }}" alt="Profile Picture"
                                class="rounded-circle"
                                style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item" data-toggle="modal"
                                data-target="#logoutModal">Keluar</a>
                            <a href="{{ route('edit-profile') }}" class="dropdown-item">Profil</a>
                        </div>
                    </li>
                </ul>

            </nav>
        @endif
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Keluar dari Aplikasi LMS?
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('logout') }}" class="btn btn-primary">Keluar</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="javascript:;" class="brand-link"
                style="text-align:center; display: flex; flex-direction: column; align-items: center;">
                <img src="{{ asset('img/infinite.png') }}" alt="Infinite Learning Logo"
                    style="width:230px;height:80px;">
            </a>




            <!-- Sidebar -->

            <div class="sidebar">
                @if (auth()->user()->is_admin == 0)
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                        <div class="text-white">
                            <h7>{{ Auth::user()->name }}</h7>
                        </div>

                        <div class="info">
                            <a href="#" class="d-block"> </a>
                        </div>
                    </div>
                @endif



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->

                        @if (auth()->user()->is_admin == 0)
                            <li class="nav-item">
                                <a href="{{ url('landingwmi') }}"
                                    class="nav-link @if (Request::path() == 'landingwmi') active @endif">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Beranda
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->is_admin == 1)
                            <li class="nav-item">
                                <a href="{{ url('landingmentor') }}"
                                    class="nav-link @if (Request::path() == 'landingmentor') active @endif">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Beranda
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->is_admin == 2)
                            <li class="nav-item">
                                <a href="{{ url('landingmentee') }}"
                                    class="nav-link @if (Request::path() == 'landingmentee') active @endif">
                                    <i class="nav-icon fa fa-home"></i>
                                    <p>
                                        Beranda
                                    </p>
                                </a>
                            </li>
                        @endif



                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-clipboard"></i>
                                <p>
                                    Program
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (auth()->user()->is_admin == 0)
                                    <li class="nav-item nav-item-child">
                                        <a href="{{ url('pengumumann') }}"
                                            class="nav-link @if (Request::path() == 'pengumumann') active @endif">
                                            <i class="fas fa-bullhorn nav-icon"></i>
                                            <p>Pengumuman</p>
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->is_admin == 1)
                                    <li class="nav-item nav-item-child">
                                        <a href="{{ url('coursementor') }}"
                                            class="nav-link @if (Request::path() == 'course') active @endif">
                                            <i class="fas fa-file-alt nav-icon"></i>
                                            <p>Daftar Kelas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item nav-item-child">
                                        <a href="/datament"
                                            class="nav-link @if (Request::path() == 'course') active @endif">
                                            <i class="fas fa-file-alt nav-icon"></i>
                                            <p>Daftar Mentee</p>
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->is_admin == 2)
                                    <li class="nav-item nav-item-child">
                                        <a href="{{ url('coursementee') }}"
                                            class="nav-link @if (Request::path() == 'course') active @endif">
                                            <i class="fas fa-file-alt nav-icon"></i>
                                            <p>Daftar Kelas</p>
                                        </a>
                                    </li>
                                @endif
                                @if (auth()->user()->is_admin == 0)
                                    <li class="nav-item nav-item-child">
                                        <a href="{{ url('course') }}"
                                            class="nav-link @if (Request::path() == 'course') active @endif">
                                            <i class="fas fa-file-alt nav-icon"></i>
                                            <p>Daftar Kelas</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        
                        @if (auth()->user()->is_admin == 0)
                            <li class="nav-item">
                                <a href="{{ url('datamentor') }}"
                                    class="nav-link @if (Request::path() == 'datamentor') active @endif">
                                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                    <p>
                                        Data Mentor
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('datamentee') }}"
                                    class="nav-link @if (Request::path() == 'datamentee') active @endif">
                                    <i class="nav-icon fas fa-user-friends"></i>
                                    <p>
                                        Data Mentee
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->is_admin == 0)
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Keluar
                                    </p>
                                </a>
                            </li>
                        @endif

                        <!-- Logout Modal -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="logoutModalLabel">Apakah Anda yakin ingin keluar?
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <a href="{{ route('logout') }}" class="btn btn-primary">Ya, Keluar</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

        </aside>
