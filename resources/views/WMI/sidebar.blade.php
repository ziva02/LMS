<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .main-sidebar {
            width: 200px;
            min-width: 200px;
        }

        .brand-link img {
            width: 180px;
        }

        .nav-treeview .nav-item-child {
            padding-left: 20px;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : '' }}</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Bootstrap CSS (gunakan satu versi saja) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    @yield('styles')



    <!-- Navbar code here -->

    <!-- jQuery (gunakan satu versi saja) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap Bundle with Popper (gunakan satu versi saja) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="https://cdn.jsdelivr.net/npm/demo@1.0.0/demo.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2)
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Add your left navbar links here -->
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('profil/' . Auth::user()->foto) }}" alt="Profile Picture"
                                        class="rounded-circle me-2"
                                        style="width: 35px; height: 35px; object-fit: cover;">
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('edit-profile') }}">Profil</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">Keluar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Bootstrap 5 Modal for Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin keluar?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="{{ route('logout') }}" class="btn btn-primary">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <i class="nav-icon fas fa-user-friends"></i>
                                            <p>Data Mentee</p>
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
