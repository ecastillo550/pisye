<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
  <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
  <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
    <img src="/img/pisye.jpg" alt="logo" class="brand" data-src="/img/pisye.jpg" data-src-retina="/img/logo_2x.png" height="35">
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
  <div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
      @role(['teacher', 'admin'])
      <li class="m-t-30">
        <a href="{{ route('groups.my_groups') }}"><span class="title">Mis Grupos</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      @endrole
      @role('admin')
      <li>
        <a href="{{ route('groups.index') }}"><span class="title">Grupos</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      <li>
        <a href="{{ route('students.index') }}"><span class="title">Alumnos</span></a>
        <span class="icon-thumbnail"><i class="fa fa-plus"></i></span>
      </li>
      <li>
        <a href="{{ route('users.index') }}"><span class="title">Usuarios</span></a>
        <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
      </li>
      <li>
        <a href="{{ route('subjects.index') }}"><span class="title">Materias</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      <li>
        <a href="{{ route('semesters.index') }}"><span class="title">Semestres</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      <li>
        <a href="{{ route('levels.index') }}"><span class="title">Niveles</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      <li>
        <a href="{{ route('cualitative_grades.index') }}"><span class="title">Opciones de Cal.</span></a>
        <span class="icon-thumbnail"><i class="pg-note"></i></span>
      </li>
      @endrole
    </ul>
    <div class="clearfix"></div>
  </div>
  <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->