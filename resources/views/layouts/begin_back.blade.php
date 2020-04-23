<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dasbor - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('back/plugins/summernote/summernote-bs4.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('back/plugins/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('back/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Users Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ Auth::user()->name }} <i class="pl-2 fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ url('/') }}" class="dropdown-item">
                            <i class="fas fa-home pr-2"></i> Portofolio
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('dashboard.account.setting') }}" class="dropdown-item">
                            <i class="fas fa-user-cog pr-2"></i> Akun
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt pr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard.index') }}" class="brand-link">
                <img src="{{ asset('back/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Portofolio</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ Auth::user()->avatar_link }}" style="object-fit: cover; object-position: 50% 0%;"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link @yield('dashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dasbor
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.portofolio.index') }}" class="nav-link @yield('portofolio')">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Portofolio
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.option.index') }}" class="nav-link @yield('option')">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Opsi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.account.setting') }}" class="nav-link @yield('account')">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Akun
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} </strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Yuri</b> Dimas
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('back/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Validation -->
    <script src="{{ asset('back/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('back/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('back/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('back/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('back/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back/js/adminlte.min.js') }}"></script>
    <!-- Custom Script -->
    <script type="text/javascript">
        var success = '{{ Session::has('success') }}';
        var error = '{{ Session::has('error') }}';
        var warning = '{{ Session::has('warning') }}';
        var info = '{{ Session::has('info') }}';

        if(success){
            toastr.success('{{ Session::get('success') }}');
        } else if(error){
            toastr.error('{{ Session::get('error') }}');
        } else if(warning){
            toastr.warning('{{ Session::get('warning') }}');
        } else if(info){
            toastr.info('{{ Session::get('info') }}');
        }
    </script>
    @yield('footer-script')
</body>

</html>