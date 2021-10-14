<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ __('DPRMS') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="{{ asset('css/bootstrap/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('paper/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('paper/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2/select2.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/summernote/summernote.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/treeview.css') }}" rel="stylesheet" />
        <link href="{{ asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet">
        <style>
            body {
                background: rgb(204,204,204); 
            }

            .content-section {
                background: white;
                display: block;
                box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
            }

            .main-content {
                margin: 0.5cm auto;
                overflow-x: hidden;
            }

            .main-section {
                background: white;
                box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
                display: block;
            }

            .sticky-filter {
                border-radius: 0px;
                margin-left: 10px;
                position: fixed;
                width: 23%;
                z-index: 999;
            }

            fieldset {
                border: 1px solid black;
            }

            legend {
                font-size: 15px;
            }

            @media print {
                .sticky-filter {
                    display: none;
                }

                .main-section {
                    visibility: visible;
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    margin: 15px;
                }
            }
        </style>
    </head>
    <body>
        <div class="main-content">
            <div class="row">
                <div class="col-md-3 filter-section">
                    <div class="card sticky-filter">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Filter By</h6>
                                </div>
                            </div>
                            <div id="dynamic-filter-option">
                                @php
                                    $filters = $data_collection['filter_options'];
                                @endphp

                                @foreach( $filters as $filter ) 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ $filter['title'] }}</label>
                                            <select class="form-control" id="{{ $filter['title'] }}">
                                            @foreach ( $filter['options'] as $option )
                                                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-default">Filter</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-default pull-right">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 main-section">
                    <div style="margin: 10px;">
                        <h5>This is just a concept not determined yet.</h5>
                        <h5>ဤစာမျက်နှာ ဒီဇိုင်း တစ်ခုလုံးသည် စဥ်းစားထားသည့်ပုံစံသက်သက်သာဖြစ်သည်။ အတည်ရယ်လို့ မဟုတ်သေးပါ။</h5>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                        <p>Hello Main</p>
                    </div>   
                </div>
            </div>
        </div>
        <!-- Sharrre libray -->
        <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
        <script src="{{ asset('paper/demo/jquery.sharrre.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    </body>
</html>