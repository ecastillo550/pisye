@extends('layouts.app')

@section('content')
<!-- START CONTAINER FLUID -->
<div class="container-fluid padding-25 sm-padding-10">
  <div class="row">
    <div class="col-lg-4 col-xl-3 col-xlg-2 ">
      <div class="row">
        <div class="col-md-12 m-b-10">
          <!-- START WIDGET D3 widget_graphTileFlat-->
          <div class="widget-8 card no-border bg-warning no-margin widget-loader-bar">
            <div class="container-xs-height full-height">
              <div class="row-xs-height">
                <div class="col-xs-height col-top">
                  <div class="card-header  top-left top-right">
                    <div class="card-title text-black hint-text">
                      <span class="font-montserrat fs-11 all-caps">Weekly Sales <i
                          class="fa fa-chevron-right"></i>
                                          </span>
                    </div>
                    <div class="card-controls">
                      <ul>
                        <li>
                          <a data-toggle="refresh" class="card-refresh text-black" href="#"><i
            class="card-icon card-icon-refresh"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-xs-height ">
                <div class="col-xs-height col-top relative">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="p-l-20">
                        <h3 class="no-margin p-b-5 text-white">$14,000</h3>
                        <p class="small hint-text m-t-5">
                          <span class="label  font-montserrat m-r-5">60%</span>Higher
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                  </div>
                  <div class='widget-8-chart line-chart' data-line-color="black" data-points="true" data-point-color="warning" data-stroke-width="2">
                    <svg></svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 m-b-10">
          <!-- START WIDGET widget_progressTileFlat-->
          <div class="widget-9 card no-border bg-success no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title text-black">
                  <span class="font-montserrat fs-11 all-caps">Weekly Sales <i
            class="fa fa-chevron-right"></i>
                        </span>
                </div>
                <div class="card-controls">
                  <ul>
                    <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
      class="card-icon card-icon-refresh"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5 text-white">$23,000</h3>
                <a href="#" class="btn-circle-arrow text-white"><i
  class="pg-arrow_minimize"></i>
</a>
                <span class="small hint-text text-white">65% lower than last month</span>
              </div>
              <div class="mt-auto">
                <div class="progress progress-small m-b-20">
                  <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                  <div class="progress-bar progress-bar-white" style="width:45%"></div>
                  <!-- END BOOTSTRAP PROGRESS -->
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 md-m-b-10 sm-m-b-10">
          <!-- START WIDGET widget_statTile-->
          <div class="widget-10 card no-border bg-white no-margin widget-loader-bar">
            <div class="card-header  top-left top-right ">
              <div class="card-title text-black hint-text">
                <span class="font-montserrat fs-11 all-caps">Weekly Sales <i class="fa fa-chevron-right"></i>
                              </span>
              </div>
              <div class="card-controls">
                <ul>
                  <li><a data-toggle="refresh" class="card-refresh text-black" href="#"><i
    class="card-icon card-icon-refresh"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-block p-t-40">
              <div class="row">
                <div class="col-sm-12">
                  <h4 class="no-margin p-b-5 text-danger semi-bold">APPL 2.032</h4>
                  <div class="pull-left small">
                    <span>WMHC</span>
                    <span class=" text-success font-montserrat">
                                          <i class="fa fa-caret-up m-l-10"></i> 9%
                                      </span>
                  </div>
                  <div class="pull-left m-l-20 small">
                    <span>HCRS</span>
                    <span class=" text-danger font-montserrat">
                                          <i class="fa fa-caret-up m-l-10"></i> 21%
                                      </span>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="p-t-10 full-width">
                <a href="#" class="btn-circle-arrow b-grey"><i
  class="pg-arrow_minimize text-danger"></i></a>
                <span class="hint-text small">Show more</span>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-xl-9 col-xlg-6 m-b-10">
      <div class="row">
        <div class="col-md-12">
          <!-- START WIDGET D3 widget_graphWidget-->
          <div class="widget-12 card no-border widget-loader-circle no-margin">
            <div class="row">
              <div class="col-lg-8 ">
                <div class="card-header  pull-up top-right ">
                  <div class="card-controls">
                    <ul>
                      <li class="hidden-xlg">
                        <div class="dropdown">
                          <a data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                            <i class="card-icon card-icon-settings"></i>
                          </a>
                          <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">AAPL</a>
                            </li>
                            <li><a href="#">YHOO</a>
                            </li>
                            <li><a href="#">GOOG</a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <a data-toggle="refresh" class="card-refresh text-black" href="#"><i class="card-icon card-icon-refresh"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-block">
              <div class="row">
                <div class="col-sm-8">
                  <div class="p-l-5">
                    <h2 class="pull-left m-t-5 m-b-5">Apple Inc.</h2>
                    <h2 class="pull-left m-l-50 m-t-5 m-b-5 text-danger">
    <span class="">448.97</span>
    <span class="text-danger fs-12">-318.24</span>
  </h2>
                    <div class="clearfix"></div>
                    <div class="full-width">
                      <ul class="list-inline">
                        <li><a href="#" class="font-montserrat text-master">1D</a>
                        </li>
                        <li class="active"><a href="#" class="font-montserrat  bg-master-light text-master">5D</a>
                        </li>
                        <li><a href="#" class="font-montserrat text-master">1M</a>
                        </li>
                        <li><a href="#" class="font-montserrat text-master">1Y</a>
                        </li>
                      </ul>
                    </div>
                    <div class="nvd3-line line-chart text-center" data-x-grid="false">
                      <svg></svg>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="widget-12-search">
                    <p class="pull-left">Company
                      <span class="bold">List</span>
                    </p>
                    <button class="btn btn-default btn-xs pull-right">
                      <span class="bold">+</span>
                    </button>
                    <div class="clearfix"></div>
                    <input type="text" placeholder="Search list" class="form-control m-t-5">
                  </div>
                  <div class="company-stat-boxes">
                    <div data-index="0" class="company-stat-box m-t-15 active padding-20 bg-master-lightest">
                      <div>
                        <button type="button" class="close" data-dismiss="modal">
                          <i class="pg-close fs-12"></i>
                        </button>
                        <p class="company-name pull-left text-uppercase bold no-margin">
                          <span class="fa fa-circle text-success fs-11"></span> AAPL
                        </p>
                        <small class="hint-text m-l-10">Yahoo Inc.</small>
                        <div class="clearfix"></div>
                      </div>
                      <div class="m-t-10">
                        <p class="pull-left small hint-text no-margin p-t-5">9:42AM ET</p>
                        <div class="pull-right">
                          <p class="small hint-text no-margin inline">37.73</p>
                          <span class=" label label-important p-t-5 m-l-5 p-b-5 inline fs-12">+ 0.09</span>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div data-index="1" class="company-stat-box m-t-15  padding-20 bg-master-lightest">
                      <div>
                        <button type="button" class="close" data-dismiss="modal">
                          <i class="pg-close fs-12"></i>
                        </button>
                        <p class="company-name pull-left text-uppercase bold no-margin">
                          <span class="fa fa-circle text-primary fs-11"></span> YHOO
                        </p>
                        <small class="hint-text m-l-10">Yahoo Inc.</small>
                        <div class="clearfix"></div>
                      </div>
                      <div class="m-t-10">
                        <p class="pull-left small hint-text no-margin p-t-5">9:42AM ET</p>
                        <div class="pull-right">
                          <p class="small hint-text no-margin inline">37.73</p>
                          <span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">+ 0.09</span>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div data-index="2" class="company-stat-box m-t-15  padding-20 bg-master-lightest">
                      <div>
                        <button type="button" class="close" data-dismiss="modal">
                          <i class="pg-close fs-12"></i>
                        </button>
                        <p class="company-name pull-left text-uppercase bold no-margin">
                          <span class="fa fa-circle text-complete fs-11"></span> GOOG
                        </p>
                        <small class="hint-text m-l-10">Yahoo Inc.</small>
                        <div class="clearfix"></div>
                      </div>
                      <div class="m-t-10">
                        <p class="pull-left small hint-text no-margin p-t-5">9:42AM ET</p>
                        <div class="pull-right">
                          <p class="small hint-text no-margin inline">37.73</p>
                          <span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">+ 0.09</span>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END WIDGET -->
        </div>
      </div>
    </div>
    <div class="col-lg-6 hidden-lg visible-xlg col-xlg-4 m-b-10">
      <!-- START WIDGET D3 widget_stackedBarWidget-->
      <div class="widget-15 card card-condensed  no-margin no-border widget-loader-circle">
        <div class="card-header ">
          <div class="card-controls">
            <ul>
              <li><a href="#" class="card-collapse" data-toggle="collapse"><i
    class="card-icon card-icon-collapse"></i></a>
              </li>
              <li><a href="#" class="card-refresh text-black" data-toggle="refresh"><i
    class="card-icon card-icon-refresh"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-block no-padding">
          <ul class="nav nav-tabs nav-tabs-simple">
            <li class="nav-item">
              <a href="#" data-toggle="tab" class="p-t-5 active">
  APPL<br>
  22.23<br>
  <span class="text-success">+60.223%</span>
</a>
            </li>
            <li class="nav-item"><a href="#" data-toggle="tab" class="p-t-5">
FB<br>
45.97<br>
<span class="text-danger">-06.56%</span>
</a>
            </li>
            <li class="nav-item"><a href="#" data-toggle="tab" class="p-t-5">
GOOG<br>
22.23<br>
<span class="text-success">+60.223%</span>
</a>
            </li>
          </ul>
          <div class="tab-content p-l-20 p-r-20">
            <div class="tab-pane no-padding active" id="widget-15-tab-1">
              <div class="full-width">
                <div class="full-width">
                  <div class="widget-15-chart rickshaw-chart"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane no-padding" id="widget-15-tab-2">
            </div>
            <div class="tab-pane" id="widget-15-tab-3">
            </div>
          </div>
          <div class="p-t-20 p-l-20 p-r-20 p-b-30">
            <div class="row">
              <div class="col-md-9">
                <p class="fs-16 text-black">Apple’s Motivation - Innovation
                  <br>distinguishes between A leader and a follower.
                </p>
                <p class="small hint-text p-b-10">VIA Apple Store (Consumer and Education Individuals)
                  <br>(800) MY-APPLE (800-692-7753)
                </p>
              </div>
              <div class="col-md-3 text-right">
                <p class="font-montserrat bold text-success m-r-20 fs-16">+0.94</p>
                <p class="font-montserrat bold text-danger m-r-20 fs-16">-0.63</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END WIDGET -->
    </div>
  </div>
</div>
<!-- END CONTAINER FLUID -->

@endsection

@section('scripts')
<script src="/js/sb-admin-datatables.js"></script>
<script src="/js/sb-admin-charts.js"></script>
@endsection