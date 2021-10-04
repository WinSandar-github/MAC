@extends('layouts.app', [
'class' => '',
'parentElement' => '',
'elementActive' => 'teacher_registration'
])
@section('content')
    <!-- Theme style -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <style>
        .no-outline{
            border-top-style: hidden;
            border-right-style: hidden;
            border-left-style: hidden;
            border-bottom-style: hidden;
            background-color: rgb(255 255 255 / 20%);
            font-weight:bold;
            text-align:center;
        }
        @media print {
            #printbtn,.sidebar {
                display :  none;
            }
            .card-body{
                text-align:center;
                margin:auto;
            }
            .content {
                display: inline-block;
                margin: 0px auto;
                text-align: center;
            }
        }
    </style>
@section('content')
<div class="content">
    @include('flash-message')
    
        <div class="row">
            <div class="col-md-12">
                <form action="javascript:void();" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success card-outline">

                                <div class="card-header">


                                </div>

                                <div class="card-body text-center">
                                    <h6><b>REPUBLIC OF THE UNION OF MYANMAR</b></h6>
                                    <h6><b>MYANMAR ACCOUNTANCY COUNCIL</b></h6>
                                    <div class="row">
                                        <div class="col-md-4 pull-right"></div>
                                        <div class="col-md-4 text-center">
                                            <img class="fileinput-new thumbnail img-circle" src="{{ asset('img/logo/mac_logo.jpeg') }}"
                                                alt="User profile picture" style="width:120px;">
                                        </div>
                                        <div class="col-md-4 pull-right">
                                        
                                        {{--User Photo--}}
                                                    
                                            <img class="fileinput-new thumbnail img-circle" id="image"  style="width:120px;height:100px;" accept="image/png,image/jpeg" alt="">
                                                
                                        {{--User Photo--}}
                                        </div>
                                    </div>
                                    <h6 class="mt-3"><b>Registration Certificate of Lecturer/Tutor </b></h6>
                                    <div class="row mt-3 " >
                                        <div class="col-md-6">
                                            <span style="font-weight:bold">Serial No.</span><span class="invoice_no"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <span style="font-weight:bold">Dated.</span><span class="payment_date"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <span id="father_eng"></span>, son / daughter  of <span id="name_eng"></span>,  holder of
                                            CSC No <span id="nrc"></span>, 
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            has been registered as a Lecturer/Tutor of  a Private Accounting School or an  individual
                                             
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-9">
                                             Lecturer/Tutor under section 32 of the Myanmar Accountancy Council Law.
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            He/ She is permitted to engage as a Lecturer/Tutor of a Private Accounting School.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-1"></div>
                                        <div class="col-md-8">
                                            His/ Her teaching Course(s) and Subject(s) are shown as below:&nbsp;
                                           
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <input type="text" id="cpa_one" disabled class="no-outline">
                                           <ol id="menu_one"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                           <input type="text" id="cpa_two" disabled class="no-outline">
                                           <ol id="menu_two"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <input type="text" id="da_one" disabled class="no-outline">
                                           <ol id="menu_da_one"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                           <input type="text" id="da_two" disabled class="no-outline">
                                           <ol id="menu_da_two"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 border-bottom period" style="display:none;">
                                        <div class="col-md-12">
                                            <p >This certificate is valid for the period <span id="period_time"></span></p>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                    
                                    <center>

                                        <div class="row justify-content-center">

                                            
                                            <button id="printbtn" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i>
                                                Print</button>
                                        </div>
                                    </center>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

                
    <!-- modal -->
    <form method="post" action="javascript:rejectTeacherRegister();" enctype="multipart/form-data">
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Reject Reason</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <textarea class="form-control " id="reason" rows="100" cols='100' required></textarea>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

@endsection
@push('scripts')
    <script src="{{ asset('js/teacher.js') }}"></script>
    
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script>
        getTeacherInfos();
    </script>
@endpush
