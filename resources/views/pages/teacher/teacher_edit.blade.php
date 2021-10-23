@extends('layouts.app', [
'class' => '',
'parentElement' => '',
'elementActive' => 'teacher_registration'
])
@section('content')
    <!-- Theme style -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row mb-2">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right card">
                <li class="breadcrumb-item active"><span class='form-name'></span></li>
            </ol>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <form action="javascript:void();" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card card-success card-outline">
                                <div class="card-header">


                                </div>
                                <div class="card-body box-profile">

                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" id="image"
                                            alt="User profile picture">
                                    </div>

                                    <h5 class="profile-username text-center" id="name"></h5>

                                    <p class="text-muted text-center" id="email"></p>
                                    <hr>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="nrc"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အရှေ့)</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span class="nrc_front"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အနောက်)</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span class="nrc_back"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>အဘအမည်(မြန်မာ)/အဘအမည်(အင်္ဂလိပ်)</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="father"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>မွေးသက္ကရာဇ်</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="date_of_birth"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>ဖုန်းနံပါတ်</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="phone"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>လူမျိုး</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="race"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <b>ကိုးကွယ်သည့်ဘာသာ</b>
                                        </div>
                                        <div class="col-md-6 ">
                                            <span id="religion"></span>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success card-outline">

                                <div class="card-header">


                                </div>

                                <div class="card-body">
                                    <h6 class="mb-3">
                                        <i class="fa fa-graduation-cap"></i> ပညာအရည်အချင်း
                                    </h6>
                                    <table id="tbl_degree" class="table table-bordered text-center">
                                        <thead class="text-nowrap table-success">
                                            <tr>
                                                <th class="bold-font-weight">စဉ်</th>
                                                <th class="bold-font-weight">တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ</th>
                                                <th class="bold-font-weight">Attached Certificate</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_degree_body">
                                        </tbody>
                                    </table>

                                    <hr>

                                    <div class="row mt-3 border-bottom ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold"><i class="fa fa-map-marker"></i> ဆက်သွယ်ရန်လိပ်စာ(မြန်မာ)
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="current_address"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 border-bottom ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold"><i class="fa fa-map-marker"></i> ဆက်သွယ်ရန်လိပ်စာ(အင်္ဂလိပ်)
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="eng_current_address"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 border-bottom ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold"><i class="fa fa-map-marker"></i> အမြဲတမ်းနေရပ်လိပ်စာ(မြန်မာ)
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="address"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 border-bottom ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold"><i class="fa fa-map-marker"></i> အမြဲတမ်းနေရပ်လိပ်စာ(အင်္ဂလိပ်)
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="eng_address"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio1" id="inlineRadio1"
                                                    value="1">
                                                <label for="inlineRadio1">ဟုတ်</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio2" id="inlineRadio2"
                                                    value="0">
                                                <label for="inlineRadio2">မဟုတ်</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recommend_row" style="display:none">
                                        <div class="row mt-3 ">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">သက်ဆိုင်ရာ ဌာနအကြီးအကဲ၏ ခွင့်ပြုမိန့်</p>
                                            </div>
                                            <div class="col-md-6 recommend_letter">

                                            </div>
                                        </div>
                                        <div class="row mt-3 ">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">ရာထူး</p>
                                            </div>
                                            <div class="col-md-6">
                                                <span id="position"></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3 ">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">ဌာန</p>
                                            </div>
                                            <div class="col-md-6">
                                                <span id="department"></span>
                                            </div>
                                        </div>
                                        <div class="row  mt-3 ">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">ရုံးစိုက်ရာဒေသ</p>
                                            </div>
                                            <div class="col-md-6">
                                                <span id="organization"></span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success card-outline">

                                <div class="card-header">


                                </div>

                                <div class="card-body">
                                    <div class="row mt-3 ">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">သင်ကြားမည့်သင်တန်းကျောင်းအမည်</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="school_name"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 teacher_card_class" style="display:none;">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">သင်တန်းဆရာမှတ်ပုံတင်</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="teacher_card"></span>
                                        </div>
                                    </div>
                                    <div class="row  mt-3">
                                        <div class="col-md-12">
                                            <h5>သင်ကြားမည့်သင်တန်းနှင့် ဘာသာရပ်များ</h5>
                                        </div>
                                    </div>
                                    <div class="row  mt-3">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">

                                        <div class="col-md-12">
                                            <table id="tbl_certificate"
                                                class="table table-bordered table-hover text-center">
                                                <thead class="text-nowrap table-success">
                                                    <tr>
                                                        <!-- <th class="bold-font-weight" >စဉ်</th> -->
                                                        <th class="bold-font-weight">သင်တန်းအမည်</th>
                                                        <th class="bold-font-weight">ဘာသာရပ်များ</th>
                                                        <th class="bold-font-weight">ဘာသာရပ်ကြေး</th>
                                                        <th class="bold-font-weight">ငွေပေးချေမှု</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_certificate_body" class="hoverTable">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row  mt-3">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">ဒီပလိုမာစာရင်းကိုင်သင်တန်း</p>
                                        </div>
                                    </div>
                                    <div class="row  mt-3 ">

                                        <div class="col-md-12">
                                            <table id="tbl_diploma" class="table table-bordered table-hover text-center">
                                                <thead class="text-nowrap table-success">
                                                    <tr>
                                                        <!-- <th class="bold-font-weight" >စဉ်</th> -->
                                                        <th class="bold-font-weight">သင်တန်းအမည်</th>
                                                        <th class="bold-font-weight">ဘာသာရပ်များ</th>
                                                        <th class="bold-font-weight">ဘာသာရပ်ကြေး</th>
                                                        <th class="bold-font-weight">ငွေပေးချေမှု</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_diploma_body" class="hoverTable">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="exist_teacher_user" style="display:none;">
                                        <div class="row mt-5 border-bottom" >
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">ဘာသာရပ်ကြေး၊စာရင်းသွင်းကြေး၊ဖောင်ကြေး စုစုပေါင်း</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type='text' id="subject_total_amount" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="row mt-5 border-bottom period" style="display:none;">
                                            <div class="col-md-6">
                                                <p style="font-weight:bold">ငွေပေးချေသည့် ရက်စွဲ</p>
                                            </div>
                                            <div class="col-md-6">
                                                <input type='text' id="payment_date" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5 border-bottom">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">သင်ကြားမည့်ဘာသာရပ်အတွက် သင်ကြားမှုနှင့်
                                                အခြားအတွေ့အကြုံများ</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="exp_desc"></span>
                                        </div>
                                    </div>
                                    <div class="row mt-3 border-bottom period" style="display:none;">
                                        <div class="col-md-6">
                                            <p style="font-weight:bold">This certificate is valid for the period</p>
                                        </div>
                                        <div class="col-md-6">
                                            <span id="period_time"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="approve_reject" style="display:none;">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="student_info_id">
                                <input type="hidden" id="teacher_id">
                                <center>

                                    <div class="row justify-content-center">

                                        <button type="button" class="btn btn-danger" style="width : 20%"
                                            data-toggle="modal" id="smallButton" data-target="#myModal"><i
                                                class="fa fa-thumbs-o-down" aria-hidden="true"></i> REJECT</button>
                                        <button id="approve" class="btn btn-primary" onclick="approveTeacherRegister();"
                                            style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                            APPROVE</button>
                                    </div>
                                </center>

                            </div>
                        </div>
                    </div>
                    <div id="cessation-btn" style="display:none;">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" id="student_info_id">
                                <input type="hidden" id="teacher_id">
                                <center>

                                    <div class="row justify-content-center">

                                        <button type="button" class="btn btn-danger" style="width : 20%"
                                            data-toggle="modal" id="smallButton" data-target="#cessationModal"><i
                                                class="fa fa-thumbs-o-down" aria-hidden="true"></i> Cessation</button>
                                        
                                    </div>
                                </center>

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
    <!-- modal -->
    <form method="post" action="javascript:cessationTeacherRegister();" enctype="multipart/form-data">
        <div class="modal" id="cessationModal">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <input type="hidden" id="initial_status" value="2">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Cessation Reason</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <textarea class="form-control " id="cessation_reason" rows="100" cols='100' required></textarea>
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
