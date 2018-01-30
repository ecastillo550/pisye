<div class="header ">
  <!-- START MOBILE SIDEBAR TOGGLE -->
  <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
  </a>
  <!-- END MOBILE SIDEBAR TOGGLE -->
  <div class="">
    <div class="brand inline">
      <img src="/img/logo.png" alt="logo" data-src="/img/logo.png" data-src-retina="/img/logo_2x.png" height="35">
    </div>
  </div>
  <div class="d-flex align-items-center">

    <!-- START User Info-->
    <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down m-l-20">
      <span class="semi-bold">{{ Auth::user()->name }}</span>
    </div>

    <div class="dropdown pull-right hidden-md-down">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}
        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="cursor: pointer;">
            <span class="pull-right"><i class="pg-settings"></i></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
          {{-- <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a> --}}
          <button type="submit" class="clearfix bg-master-lighter dropdown-item" style="width: 115px">
            <span class="pull-left">Logout</span>
            <span class="pull-right"><i class="pg-power"></i></span>
          </button>
        </div>
      </form>
    </div>
    <!-- END User Info-->
  </div>
</div>
<!-- END HEADER