<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PISYE</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/node_modules/metismenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="/dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('root') }}">Calificaciones PISYE 1.0</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
            @if(Auth::user())
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li> -->
                        <li>
                            <a href="{{ route('root') }}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        @permission('see-students')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Alumnos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            @permission('student-management')
                                <li>
                                    <a href="{{ route('students.index') }}">Ver</a>
                                </li>
                                <li>
                                    <a href="{{ route('students.add') }}">Agregar nuevo</a>
                                </li>
                            @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                        @permission('see-classes')
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Clases<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @permission('class-management')
                                <li>
                                    <a href="{{ route('classes.index') }}">Ver</a>
                                </li>
                                @endpermission
                                <li>
                                    <a href="{{ route('teacher.index') }}">Mis clases</a>
                                </li>
                                @permission('class-management')
                                <li>
                                    <a href="{{ route('classes.add') }}">Agregar nuevo</a>
                                </li>
                                @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                        @permission('see-subjects')
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Materias<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @permission('subject-management')
                                <li>
                                    <a href="{{ route('subjects.index') }}">Ver</a>
                                </li>
                                <li>
                                    <a href="{{ route('subjects.add') }}">Agregar nuevo</a>
                                </li>
                                @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                        @permission('see-levels')
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Niveles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @permission('level-management')
                                <li>
                                    <a href="{{ route('levels.index') }}">Ver</a>
                                </li>
                                <li>
                                    <a href="{{ route('levels.add') }}">Agregar nuevo</a>
                                </li>
                                @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                        @permission('see-semesters')
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Semestres<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @permission('semester-management')
                                <li>
                                    <a href="{{ route('semesters.index') }}">Ver</a>
                                </li>
                                <li>
                                    <a href="{{ route('semesters.add') }}">Agregar nuevo</a>
                                </li>
                                @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                        @permission('see-users')
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @permission('user-management')
                                <li>
                                    <a href="{{ route('users.index') }}">Ver</a>
                                </li>
                                <li>
                                    <a href="{{ route('users.add') }}">Agregar nuevo</a>
                                </li>
                                @endpermission
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endpermission
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/node_modules/metismenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

</body>

</html>
