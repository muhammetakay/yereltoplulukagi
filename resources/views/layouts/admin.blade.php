<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | {{ config('app.name') }}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/backend/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('assets/backend/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/backend/css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('assets/backend/css/morris.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('assets/backend/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('assets/backend/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/backend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.index') }}">{{ config('app.name') }}</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="{{ route('index') }}"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ $user->name }} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Çıkış yap</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
        </nav>

        <aside class="sidebar navbar-default" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{ route('admin.index') }}"><i class="fa fa-dashboard fa-fw"></i> Gösterge Paneli</a>
                    </li>
                    @role('admin')
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Kullanıcılar<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('admin.users') }}">Kullanıcı Listesi</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.add') }}">Kullanıcı Ekle</a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                    <li>
                        <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Haberler<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.news') }}">Haber Listesi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news.add') }}">Haber Ekle</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Etkinlikler<span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.events') }}">Etkinlik Listesi</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.events.add') }}">Etkinlik Ekle</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.contacts') }}"><i class="fa fa-address-book fa-fw"></i> İletişim Bildirimleri</a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- /.sidebar -->

        @yield('content')

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/backend/js/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/backend/js/startmin.js') }}"></script>

    @stack('script')
</body>

</html>
