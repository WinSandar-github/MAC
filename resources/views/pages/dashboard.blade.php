@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    {{--<div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Capacity</p>
                                    <p class="card-title">150GB
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Revenue</p>
                                    <p class="card-title">$ 1,345
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> Last day
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Errors</p>
                                    <p class="card-title">23
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> In the last hour
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Followers</p>
                                    <p class="card-title">+45K
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update now
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Users Behavior</h5>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id=chartHours width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Email Statistics</h5>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="chartEmail"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-primary"></i> Opened
                            <i class="fa fa-circle text-warning"></i> Read
                            <i class="fa fa-circle text-danger"></i> Deleted
                            <i class="fa fa-circle text-gray"></i> Unopened
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar"></i> Number of emails sent
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">NASDAQ: AAPL</h5>
                        <p class="card-category">Line Chart with Points</p>
                    </div>
                    <div class="card-body">
                        <canvas id="speedChart" width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Tesla Model S
                            <i class="fa fa-circle text-warning"></i> BMW 5 Series
                        </div>
                        <hr />
                        <div class="card-stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-left" style="font-weight:bold;font-size:25px;">Student Chart</div>
                            <div class="col-md-5 text-left" style="padding-right:0px;">
                                <select class="form-control form-select" name="selected_type" id="selected_type" onchange="getStudentChart(true)">                                
                                    <option value="0" selected>Student Application</option>
                                    <option value="1">Student Registration</option>
                                    <option value="2">Exam Registration</option>
                                </select>
                            </div> 
                        </div>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3">Date Range    :</div>
                            <div class="col-md-2" style="padding-left:0px;">From</div>
                            <div class="col-md-4" style="padding-left:0px;padding-right:0px">
                                <input type="text" name="dash_from_date"  id="dash_from_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2" style="padding-left:0px;">To </div>
                            <div class="col-md-4" style="padding-left:0px;;padding-right:0px">
                                <input type="text" name="dash_to_date" id="dash_to_date"  class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                            <div class="col-md-2"  style="vertical-align: top;">
                                <button type="button" class="btn btn-primary btn-round m-0" onclick="getStudentChart(false)">Search</button>
                            </div>
                        </div><br/>
                        <div class="row">
                            <canvas id="studentChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    {{--<div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-left"  style="font-weight:bold;font-size:25px;">Mentor Chart</div>
                           
                        </div>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3">Date Range    :</div>
                            <div class="col-md-2" style="padding-left:0px;">From</div>
                            <div class="col-md-4" style="padding-left:0px;padding-right:0px">
                                <input type="text" name="dash_from_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2" style="padding-left:0px;">To </div>
                            <div class="col-md-4" style="padding-left:0px;;padding-right:0px">
                                <input type="text" name="dash_to_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                            <div class="col-md-2"  style="vertical-align: top;">
                                <button type="button" class="btn btn-primary btn-round m-0">Search</button>
                            </div>
                        </div><br/>
                        <div class="row">
                            <canvas id="mentorChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    {{--<div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 text-left" style="font-weight:bold;font-size:25px;">Teacher Chart</div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3">Date Range    :</div>
                            <div class="col-md-2" style="padding-left:0px;">From</div>
                            <div class="col-md-4" style="padding-left:0px;padding-right:0px">
                                <input type="text" name="dash_from_date"  id="dash_from_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2" style="padding-left:0px;">To </div>
                            <div class="col-md-4" style="padding-left:0px;;padding-right:0px">
                                <input type="text" name="dash_to_date" id="dash_to_date"  class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                            <div class="col-md-2"  style="vertical-align: top;">
                                <button type="button" class="btn btn-primary btn-round m-0" onclick="getStudentChart(false)">Search</button>
                            </div>
                        </div><br/>
                        <div class="row">
                            <canvas id="teacherChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    {{--<div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-left"  style="font-weight:bold;font-size:25px;">School Chart</div>
                           
                        </div>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3">Date Range    :</div>
                            <div class="col-md-2" style="padding-left:0px;">From</div>
                            <div class="col-md-4" style="padding-left:0px;padding-right:0px">
                                <input type="text" name="dash_from_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-2" style="padding-left:0px;">To </div>
                            <div class="col-md-4" style="padding-left:0px;;padding-right:0px">
                                <input type="text" name="dash_to_date" class="form-control" autocomplete="off" placeholder="DD-MMM-YYYY">
                            </div>
                            <div class="col-md-2"  style="vertical-align: top;">
                                <button type="button" class="btn btn-primary btn-round m-0">Search</button>
                            </div>
                        </div><br/>
                        <div class="row">
                            <canvas id="schoolChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    {{--<div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        $(document).ready(function() {
            $("input[name='dash_from_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='dash_to_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
             // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
             getStudentChart(true);
        });

    </script>
@endpush