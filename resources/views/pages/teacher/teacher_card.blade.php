
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
            #printbtn {
                display :  none;
            }
            /* .card-body{
                
                margin:auto;
            } */
            .content {
                display: inline-block;
                margin: 0px auto;
                text-align: left;
            }
            .sidebar,.noprint {
                visibility: hidden;
            }
            
            #image{
                float:right;
                margin-top:-100px;
            }
            
            .serial{
                float:left;
            }
            .serial2{
                float:right;
                margin-top:-35px;
            }
            textarea{
                border-top-style: hidden;
                border-right-style: hidden;
                border-left-style: hidden;
                border-bottom-style: hidden;
                float:right;
                
            }
            label{
                /* float:right; */
                margin-left:63%;
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
                            <div class="card">

                                <div class="card-header">


                                </div>

                                <div class="card-body text-center">
                                <center>
                                    <h6><b>REPUBLIC OF THE UNION OF MYANMAR</b></h6>
                                    <h6><b>MYANMAR ACCOUNTANCY COUNCIL</b></h6>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center">
                                            <img class="fileinput-new thumbnail img-circle logo" src="{{ asset('img/logo/mac_logo.jpeg') }}"
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
                                        
                                        <div class="col-md-6 ">
                                            <p class="serial"><span style="font-weight:bold" >Serial No.</span><span class="invoice_no " style="border-bottom:1px dotted black;"></span></p>
                                        </div>
                                        <div class="col-md-6 ">
                                            <p class="serial2 "><span style="font-weight:bold" >Dated.</span><span class="payment_date" style="border-bottom:1px dotted black;"></span></p>
                                        </div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <span id="father_eng" style="border-bottom:1px dotted black;"></span>, son / daughter  of <span id="name_eng" style="border-bottom:1px dotted black;"></span>,  holder of
                                            CSC No 
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <span id="nrc_eng" style="border-bottom:1px dotted black;"></span>, has been registered as a Lecturer/Tutor of  a Private Accounting  
                                             
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            School or an individual Lecturer/Tutor under section 32 of the Myanmar Accountancy Council Law.
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            He/ She is permitted to engage as a Lecturer/Tutor of a Private Accounting School.
                                            
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            His/ Her teaching Course(s) and Subject(s) are shown as below:
                                           
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 menu_one_div" style="text-align: justify;display:none;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <input type="text" id="cpa_one" disabled class="no-outline">
                                           <ol id="menu_one"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 menu_two_div" style="text-align: justify;display:none;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                           <input type="text" id="cpa_two" disabled class="no-outline">
                                           <ol id="menu_two"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 menu_da_one_div" style="text-align: justify;display:none;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                            <input type="text" id="da_one" disabled class="no-outline">
                                           <ol id="menu_da_one"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 menu_da_two_div" style="text-align: justify;display:none;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-6">
                                           <input type="text" id="da_two" disabled class="no-outline">
                                           <ol id="menu_da_two"></ol>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3 period" style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <p >This certificate is valid for the period <span id="period_time_start" style='border-bottom:1px dotted black;'></span> to <span id="period_time_end" style='border-bottom:1px dotted black;'></span></p>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <textarea></textarea><br/>
                                            <label>Registrar</label>
                                        </div>
                                    </div>
                                    <center>

                                        <div class="row justify-content-center">

                                            
                                            <button id="printbtn" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i>
                                                Print</button>
                                        </div>
                                    </center>
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
