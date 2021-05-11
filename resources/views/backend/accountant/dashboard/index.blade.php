
   
@extends('backend.layouts.main')


@section ('styles')

@endsection


@section('main')
     
            <!--Statistics cards Starts-->
            <div class="row">
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card bg-white">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h4 class="font-medium-5 card-title mb-0">$5789</h4>
                          <span class="grey darken-1">Total Visits</span>
                        </div>
                        <div class="media-right text-right">
                          <i class="icon-cup font-large-1 primary"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart" class="height-150 lineChartWidget WidgetlineChart mb-2">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card bg-white">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h4 class="font-medium-5 card-title mb-0">$4567</h4>
                          <span class="grey darken-1">Total Sales</span>
                        </div>
                        <div class="media-right text-right">
                          <i class="icon-wallet font-large-1 warning"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart1" class="height-150 lineChartWidget WidgetlineChart1 mb-2">
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="card bg-white">
                  <div class="card-body">
                    <div class="card-block pt-2 pb-0">
                      <div class="media">
                        <div class="media-body white text-left">
                          <h4 class="font-medium-5 card-title mb-0">$9822</h4>
                          <span class="grey darken-1">Total Value</span>
                        </div>
                        <div class="media-right text-right">
                          <i class="icon-basket-loaded font-large-1 success"></i>
                        </div>
                      </div>
                    </div>
                    <div id="Widget-line-chart2" class="height-150 lineChartWidget WidgetlineChart2 mb-2">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Statistics cards Ends-->

            <!--Line with Area Chart 1 Starts-->
            <div class="row match-height">
              <div class="col-xl-8 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-success">
                      <h4 class="card-title">Product Valuation</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <div id="line-chart" class="height-300 lineChart lineChartShadow">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-danger">
                      <h4 class="card-title">Today's Activity</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="col-12 timeline-left" id="activity">
                      <div class="timeline">
                        <ul class="list-unstyled base-timeline activity-timeline">
                          <li class="">
                            <div class="timeline-icon bg-danger">
                              <i class="fa fa-tasks"></i>
                            </div>
                            <div class="act-time">Today</div>
                            <div class="base-timeline-info">
                              <a href="#" class="text-uppercase text-danger">Task Added</a>
                            </div>
                            <small class="text-muted">
                              25 mins ago
                            </small>
                          </li>
                          <li class="">
                            <div class="timeline-icon bg-primary">
                              <i class="fa fa-handshake-o"></i>
                            </div>
                            <div class="act-time">Yesterday</div>
                            <div class="base-timeline-info">
                              <a href="#" class="text-uppercase text-primary">Deal Added</a>
                            </div>
                            <small class="text-muted">
                              23 hours ago
                            </small>
                          </li>
                          <li class="">
                            <div class="timeline-icon bg-dark">
                              <i class="fa fa-tasks"></i>
                            </div>
                            <div class="act-time">09 March</div>
                            <div class="base-timeline-info">
                              <a href="#" class="text-uppercase text-dark">Task Updated</a>
                            </div>
                            <small class="text-muted">
                              15 days ago
                            </small>
                          </li>
                          <li class="">
                            <div class="timeline-icon bg-warning">
                              <i class="fa fa-handshake-o"></i>
                            </div>
                            <div class="act-time">04 March</div>
                            <div class="base-timeline-info">
                              <a href="#" class="text-uppercase text-warning">Started Task</a>
                            </div>
                            <small class="text-muted">
                              20 days ago
                            </small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Line with Area Chart 1 Ends-->

            <div class="row match-height">
              <div class="col-xl-4 col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-warning">
                      <h4 class="card-title">Sales</h4>
                    </div>
                  </div>
                  <div class="card-body">
                    <p class="font-medium-2 text-muted text-center pb-2">Last 12 Months Sales</p>
                    <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-8" id="recent-sales">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                      <h4 class="card-title">Recent Buyers</h4>
                    </div>
                    <a class="heading-elements-toggle">
                      <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                  </div>
                  <div class="card-content mt-1">
                    <div class="table-responsive">
                      <table class="table table-hover table-xl mb-0" id="recent-orders">
                        <thead>
                          <tr>
                            <th class="border-top-0">Product</th>
                            <th class="border-top-0">Customers</th>
                            <th class="border-top-0">Categories</th>
                            <th class="border-top-0">Popularity</th>
                            <th class="border-top-0">Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-truncate">iPone X</td>
                            <td class="text-truncate">Jim</td>
                            <td>
                              <button class="btn btn-sm btn-outline-danger round mb-0" type="button">Mobile</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="20" aria-valuemax="100" style="width:85%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1200.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">iPad</td>
                            <td class="text-truncate">Jack</td>
                            <td>
                              <button class="btn btn-sm btn-outline-success round mb-0" type="button">Tablet</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="20" aria-valuemax="100" style="width:75%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1190.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">OnePlus</td>
                            <td class="text-truncate">Dolly</td>
                            <td>
                              <button class="btn btn-sm btn-outline-danger round mb-0" type="button">Mobile</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="70" aria-valuemin="20" aria-valuemax="100" style="width:70%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 999.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">ZenPad</td>
                            <td class="text-truncate">Sam</td>
                            <td>
                              <button class="btn btn-sm btn-outline-success round mb-0" type="button">Tablet</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="20" aria-valuemax="100" style="width:60%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1150.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Pixel 2</td>
                            <td class="text-truncate">John</td>
                            <td>
                              <button class="btn btn-sm btn-outline-danger round mb-0" type="button">Mobile</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="45" aria-valuemin="20" aria-valuemax="100" style="width:45%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1180.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Pixel 2</td>
                            <td class="text-truncate">John</td>
                            <td>
                              <button class="btn btn-sm btn-outline-danger round mb-0" type="button">Mobile</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="45" aria-valuemin="20" aria-valuemax="100" style="width:45%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1180.00</td>
                          </tr>
                          <tr>
                            <td class="text-truncate">Pixel 1</td>
                            <td class="text-truncate">Tony</td>
                            <td>
                              <button class="btn btn-sm btn-outline-danger round mb-0" type="button">Mobile</button>
                            </td>
                            <td>
                              <div class="box-shadow-2 mt-1">
                                <div class="progress" style="height: 8px;">
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="45" aria-valuemin="20" aria-valuemax="100" style="width:45%"></div>
                                </div>
                              </div>
                            </td>
                            <td class="text-truncate">$ 1080.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row match-height">
              <div class="col-xl-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                      <h4 class="card-title">Product Statistics</h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <p class="font-medium-2 text-muted text-center">Hobbies</p>
                    <div id="bar-chart" class="height-250 BarChartShadow BarChart">
                    </div>

                    <div class="card-block">
                      <div class="row">
                        <div class="col text-center">
                          <span class="gradient-pomegranate d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">48</span>
                          <span>Sport</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-green-tea d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">9</span>
                          <span>Music</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-blackberry d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">26</span>
                          <span>Travel</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-ibiza-sunset d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">17</span>
                          <span>News</span>
                        </div>
                        <div class="col text-center">
                          <span class="gradient-back-to-earth d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                          <span class="font-large-1 d-block mb-2">52</span>
                          <span>Blog</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-warning">
                      <h4 class="card-title">Project Stats</h4>
                    </div>
                  </div>
                  <div class="card-body">

                    <p class="font-medium-2 text-muted text-center">Project Tasks</p>
                    <div id="donut-dashboard-chart" class="height-250 donut donutShadow">
                    </div>

                    <div class="card-block">
                      <div class="row my-3">
                        <div class="col">
                          <span class="mb-1 text-muted d-block">23% - Started</span>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar gradient-blackberry" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col">
                          <span class="mb-1 text-muted d-block">35% - In Progress</span>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar gradient-pomegranate" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div class="col">
                          <span class="mb-1 text-muted d-block">14% - Done</span>
                          <div class="progress" style="height: 8px;">
                            <div class="progress-bar gradient-green-tea" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       

      @endsection

  <!-- ////////////////////////////////////////////////////////////////////////////-->

 