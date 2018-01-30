<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
  <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
  <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
    <img src="/img/logo.png" alt="logo" class="brand" data-src="/img/logo.png" data-src-retina="/img/logo_2x.png" height="35">
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
  <div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
      {{-- <li class="m-t-30">
        <a href="{{ route('home') }}"><span class="title">Dashboard</span></a>
        <span class="icon-thumbnail"><i data-feather="users"></i></span>
      </li> --}}
      <li class="m-t-30">
        <a href="{{ route('groups.index') }}"><span class="title">Grupos</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      <li>
        <a href="{{ route('students.create') }}"><span class="title">Alumnos</span></a>
        <span class="icon-thumbnail"><i class="fa fa-plus"></i></span>
      </li>
      <li>
        <a href="{{ route('users.index') }}"><span class="title">Usuarios</span></a>
        <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
      </li>
      <li>
        <a href="{{ route('users.create') }}"><span class="title">Crear Usuario</span></a>
        <span class="icon-thumbnail"><i class="fa fa-user-plus"></i></span>
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
  <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->