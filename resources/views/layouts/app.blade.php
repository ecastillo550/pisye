<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>PISYE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/nvd3/nv.d3.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/mapplic/css/mapplic.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="/css/themes/light.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/js/jquery-ui.theme.min.css">
    <link href="/css/autocomplete.css" rel="stylesheet" text="text/css">

    <script src="/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>


    <script src="/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js" type="text/javascript"></script>

    <script src="/js/autocomplete.js" type="text/javascript"></script>

    <link type="text/css" rel="stylesheet" href="/plugins/jquery-datatable/media/css/jquery.dataTables.css">
    <link type="text/css" rel="stylesheet" href="/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css">
    <link media="screen" type="text/css" rel="stylesheet" href="/plugins/datatables-responsive/css/datatables.responsive.css">

    <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  <body class="fixed-header dashboard menu-pin">

    @include('partials.sidebar_panel')

    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      @include('partials.header')

      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        @yield('content')

        @include('partials.footer')
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    {{-- @include('partials.quickview') --}}

    {{-- @include('partials.overlay') --}}


    <!-- BEGIN VENDOR JS -->
    <script src="/plugins/feather-icons/feather.min.js" type="text/javascript"></script>
    <script src="/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="/plugins/classie/classie.js"></script>
    <script src="/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/lib/d3.v3.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/nv.d3.min.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/utils.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/tooltip.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/interactiveLayer.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/models/axis.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/models/line.js" type="text/javascript"></script>
    <script src="/plugins/nvd3/src/models/lineWithFocusChart.js" type="text/javascript"></script>
    <script src="/plugins/mapplic/js/hammer.js"></script>
    <script src="/plugins/mapplic/js/jquery.mousewheel.js"></script>
    <script src="/plugins/mapplic/js/mapplic.js"></script>
    <!-- <script src="/plugins/rickshaw/rickshaw.min.js"></script> -->
    <script src="/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/plugins/skycons/skycons.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <script type="text/javascript" src="/plugins/select2/js/select2.full.min.js"></script>

    <!-- DATATABLES -->
    <script type="text/javascript" src="/plugins/jquery-datatable/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src="/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js"></script>
    <script src="/plugins/datatables-responsive/js/datatables.responsive.js" type="text/javascript"></script>
    <script src="/plugins/datatables-responsive/js/lodash.min.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/js/printThis.js" type="text/javascript"></script>
    <script src="/js/dashboard.js" type="text/javascript"></script>
    <script src="/js/scripts.js" type="text/javascript"></script>
    <script src="/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <!-- vue JS -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

