<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{!empty($header_title) ? $header_title: ''}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables-buttons/css/style.css">
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
    <script src="{{ asset('dist') }}/js/demo.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="javascript:;" class="brand-link" style="text-align:center;">
                <span class="brand-text font-weight-light">Infinite Learning</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <span class="img-circle elevation-2">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                        

                        <li class="nav-item">
                            <a href="{{ url('beranda') }}" class="nav-link @if(Request::path() == 'beranda') active @endif">
                                <i class="nav-icon fa fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-clipboard"></i>
                                <p>
                                    Program
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('pengumumann') }}" class="nav-link @if(Request::path() == 'pengumumann') active @endif">
                                        <i class="fas fa-bullhorn nav-icon"></i>
                                        <p>Pengumuman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('course') }}" class="nav-link @if(Request::path() == 'course') active @endif">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Course List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                
                        <li class="nav-item">
                            <a href="{{ url('datamentor') }}" class="nav-link @if(Request::path() == 'datamentor') active @endif">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Data Mentor
                                </p>
                            </a>
                        </li>
                
                        <li class="nav-item">
                            <a href="{{ url('datamentee') }}" class="nav-link @if(Request::path() == 'datamentee') active @endif">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Data Mentee
                                </p>
                            </a>
                        </li>
                
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
