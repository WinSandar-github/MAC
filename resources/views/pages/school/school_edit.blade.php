@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'school_registration'
])
@section('content')
<!-- Theme style -->
<link href="{{ asset('dist/css/adminlte.min.css')}}" rel="stylesheet">
<style>
    .content {
        /* position: absolute; */
        /* position: relative; */
        /* right: 0; */
        /* top: 0; */
    }
    .modal {
      max-height: 100vh;
     /* position: absolute; */
        top: 0;
    }
</style>
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">        
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12">
            <form action="javascript:void();" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Profile</h3>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right card">
                            <li class="breadcrumb-item active">ကျောင်းပုံစံ-၁</li>
                        </ol>
                    </div> -->
                </div>
                <div class="row">
                        <div class="col-md-6">
                            
                                <div class="card card-success card-outline">
                                    <div class="card-header">
                                        
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right card">
                                                    <li class="breadcrumb-item active">ကျောင်းပုံစံ-၁</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body box-profile">
                                        
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" id="image" alt="User profile picture">
                                        </div>

                                        <h5 class="profile-username text-center" id="name"></h5>
                                        
                                        <p class="text-muted text-center" id="email"></p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</b> <span id="nrc" class="float-right"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အရှေ့)</b> <span class="nrc_front float-right" ></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>နိုင်ငံသားစိစစ်ရေးကတ်ပြား(အနောက်)</b> <span class="nrc_back float-right" ></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>အဘအမည်(မြန်မာ)/အဘအမည်(အင်္ဂလိပ်)</b> <span id="father_name_mm" class="float-right"></span> / <span id="father_name_eng" class="float-right"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>မွေးသက္ကရာဇ်</b> <span id="date_of_birth" class="float-right"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <b>ဖုန်းနံပါတ်</b> <span id="phone" class="float-right"></span>
                                            </li>
                                        </ul>

                                    </div>
                                <!-- /.card-body -->
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success card-outline">
                                
                                <div class="card-header">
                                    
                                    <ol class="breadcrumb float-sm-right card">
                                        <li class="breadcrumb-item active">ကျောင်းပုံစံ-၁</li>
                                    </ol>
                                </div>
                                
                                <div class="card-body">
                                    <h6 class="mb-3">
                                        <i class="fa fa-graduation-cap"></i> ပညာအရည်အချင်း
                                    </h6>
                                        <table id="tbl_degree"class="table table-bordered text-center">
                                            <thead class="text-nowrap table-primary">
                                                <tr>
                                                    <th class="bold-font-weight" >စဉ်</th>
                                                    <th class="bold-font-weight" >တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ</th>
                                                    <th class="bold-font-weight" >Attached Certificate</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_degree_body">
                                            </tbody>
                                        </table>

                                    <hr>
                                    <h6 class="mb-3">
                                        <i class="fa fa-map-marker"></i> ဆက်သွယ်ရန်လိပ်စာ
                                    </h6>
                                    <p class="text-muted"><span id="address"></span></p>

                                    <hr>

                                    <h6 class="mb-3"><i class="nc-icon nc-paper"></i> လျှောက်ထားသူ/အဖွဲ့အစည်း၏နောက်ခံသမိုင်း</h6>
                                        <input type="hidden" id="hidden_attach">
                                        <div class="attachment"></div>
                                        
                                    
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">သင်တန်းကျောင်းအချက်အလက်များ</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)နှင့်ကျောင်းစီမံအုပ်ချုပ်သူများ</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">ကျောင်းအဆောက်အဦး၊စာသင်ခန်း၊သန့်စင်ခန်း၊စီမံရုံးခန်း</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right card">
                                                    <li class="breadcrumb-item active">ကျောင်းပုံစံ-၁</li>
                                                </ol>
                                            </div>
                                        </div>
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p ><strong>ကျောင်းအမည်</strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <span id="school_name" ></span>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-4">
                                            <p ><strong>သင်ကြားမည့်သင်တန်း</strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <span id="attend_course" ></span>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p ><strong>ကျောင်းတည်နေရာလိပ်စာ</strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <span id="school_address" ></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p ><strong>ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <span id="school_location_attach" ></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <p ><strong>ပိုင်ဆိုင်မှုပုံစံ</strong></p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <div class="form-check mt-2 form-check-inline">
                                                    <input class="form-check-input" type="radio" name="own_type" id="private"
                                                        value="private" > ကိုယ်ပိုင်
                                                    
                                                </div>
                                                <div class="form-check mt-2 form-check-inline">
                                                    <input class="form-check-input" type="radio" name="own_type" id="rent"
                                                        value="rent" > အငှား
                                                </div>
                                                <div class="form-check mt-2 form-check-inline">
                                                    <input class="form-check-input" type="radio" name="own_type"
                                                        id="use_sharing" value="use_sharing"  > တွဲဖက်သုံး
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        
                                    
                                    <!-- /.user-block -->
                                    
                                    <p>
                                       
                                    </p>
                                    

                                    
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                    
                                    
                                    <p><strong>ကျောင်းခွဲတည်နေရာလိပ်စာ</strong></p>
                                    <div class="row">
                                
                                        <div class="col-md-12">
                                                <table class="table tbl_branch_school table-bordered input-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight text-center"  >စဉ်</th>
                                                            <th class="less-font-weight text-center"  width="30%">ကျောင်းခွဲတည်နေရာလိပ်စာ</th>
                                                            <th class="less-font-weight text-center"  >ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</th>
                                                            <th class="less-font-weight text-center"  width="30%">ပိုင်ဆိုင်မှုပုံစံ</th>
                                                            <th class="less-font-weight text-center"  >သက်ဆိုင်သည့် အထောက်အထား စာချုပ်စာတမ်းများ</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody class="tbl_branch_school_body">

                                                    </tboddy>
                                                </table>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                    

                                        <p><strong>ပူးတွဲတင်ပြသည့်အထောက်အထားများ</strong></p>
                                        
                                        <p><strong>လုပ်ငန်းလိုင်စင်/ကုမ္ပဏီမှတ်ပုံတင်လက်မှတ်/အဖွဲ့အစည်း၏မှတ်ပုံတင်လက်မှတ်မူရင်းနှင့်မိတ္တူ</strong></p>
                                        <div class="business_license"></div>
                                        <p><strong>ကျောင်းတည်ထောင်ခြင်းအတွက်ရွေးချယ်ထားသည့်လုပ်ငန်းဖွဲ့စည်းမှုပုံစံအရပူးတွဲတင်ပြရမည့်အထောက်အထားများ(အစုအစပ်သဘောတူညီချက်/သင်းဖွဲ့စည်းမျဉ်း/သင်းဖွဲ့မှတ်တမ်း၊ဉပဒေနှင့်အညီရေးဆွဲပြုစုထားသောအခြားစာချုပ်စာတမ်းများ)</strong></p>
                                        <div class="sch_establish_notes_attach"></div>
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right card">
                                                    <li class="breadcrumb-item active">ကျောင်းပုံစံ-၂</li>
                                                </ol>
                                            </div>
                                        </div>
                                    <div class="post">
                                        
                                        <p><strong>ကျောင်းတည်ထောင်သူပုဂ္ဂိုလ်(များ)</strong></p>
                                        <div class="tbl-responsive">
                                            <table class="table tbl_sch_established_persons table-bordered input-table">
                                                <thead>
                                                <tr>
                                                    <th class="less-font-weight text-center">စဉ်</th>
                                                    <th class="less-font-weight text-center">အမည်</th>
                                                    <th class="less-font-weight text-center">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                                    <th class="less-font-weight text-center">CPA(P)/CPA(FF)/PAPP No.</th>
                                                    <th class="less-font-weight text-center">ပညာအရည်အချင်း</th>
                                                    <th class="less-font-weight text-center">ဆက်သွယ်ရန်လိပ်စာ</th>
                                                    <th class="less-font-weight text-center">ဖုန်းနံပါတ်</th>
                                                    <th class="less-font-weight text-center">အီးမေးလ်</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="tbl_sch_established_persons_body">

                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                    <div class="post clearfix mb-5">
                                    <input type="hidden" id="student_info_id">
                                    <!-- /.user-block -->
                                        <p><strong>ကျောင်းစီမံအုပ်ချုပ်သူများ</strong> </p>
                                        <div class="tbl-responsive">
                                            <table class="table tbl_sch_governs table-bordered input-table">
                                                <thead>
                                                <tr>
                                                    <th class="less-font-weight text-center">စဉ်</th>
                                                    <th class="less-font-weight text-center">အမည်</th>
                                                    <th class="less-font-weight text-center">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                                    <th class="less-font-weight text-center">CPA(P)/CPA(FF)/PAPP No.</th>
                                                    <th class="less-font-weight text-center">ပညာအရည်အချင်း</th>
                                                    <th class="less-font-weight text-center">တာဝန်</th>
                                                    <th class="less-font-weight text-center">ဖုန်းနံပါတ်</th>
                                                    <th class="less-font-weight text-center">အီးမေးလ်</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="tbl_sch_governs_body">

                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                    <div class="organization mb-5" style="display:none;">
                                        <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <ol class="breadcrumb float-sm-right card">
                                                        <li class="breadcrumb-item active">ကျောင်းပုံစံ-၃</li>
                                                    </ol>
                                                </div>
                                        </div>
                                        <div class="post clearfix">
                                        
                                            <p><strong>အဖွဲ့အစည်းဖြစ်ပါကအဖွဲ့အစည်း၏အလုပ်အမှုဆောင်အဖွဲ့ဝင်များ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ</strong></p>
                                            <div class="tbl-responsive">
                                                <table class="table tbl_member_list_biography table-bordered input-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="less-font-weight text-center">စဉ်</th>
                                                        <th class="less-font-weight text-center">အမည်</th>
                                                        <th class="less-font-weight text-center">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                                        <th class="less-font-weight text-center">CPA(P)/CPA(FF)/PAPP No.</th>
                                                        <th class="less-font-weight text-center">ပညာအရည်အချင်း</th>
                                                        <th class="less-font-weight text-center">တာဝန်</th>
                                                        <th class="less-font-weight text-center">ဖုန်းနံပါတ်</th>
                                                        <th class="less-font-weight text-center">အီးမေးလ်</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody class="tbl_member_list_biography_body">

                                                    </tbody>
                                                </table>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                            <div class="col-sm-6">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right card">
                                                    <li class="breadcrumb-item active">ကျောင်းပုံစံ-၄</li>
                                                </ol>
                                            </div>
                                    </div>
                                    <div class="post clearfix">
                                    
                                        <p><strong>သင်တန်းဆရာများ၏အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ</strong></p>
                                        <div class="row mb-1">
                                       
                                        <div class="tbl-responsive">
                                            <table class="table tbl_teacher_list_biography table-bordered input-table">
                                                <thead>
                                                <tr>
                                                    <th class="less-font-weight text-center">စဉ်</th>
                                                    <th class="less-font-weight text-center">သင်တန်းဆရာမှတ်ပုံတင်အမှတ်</th>
                                                    <th class="less-font-weight text-center">အမည်</th>
                                                    <th class="less-font-weight text-center">နိုင်ငံသားစိစစ်ရေးကတ်အမှတ်</th>
                                                    <th class="less-font-weight text-center">ပညာအရည်အချင်း</th>
                                                    <th class="less-font-weight text-center">သင်ကြားမည့်ဘာသာရပ်(များ)</th>
                                                    <th class="less-font-weight text-center">ဖုန်းနံပါတ်</th>
                                                    <th class="less-font-weight text-center">အီးမေးလ်</th>
                                                    <th class="less-font-weight text-center">သင်တန်းဆရာမှတ်ပုံတင်မိတ္တူများ</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="tbl_teacher_list_biography_body" >

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right card">
                                                    <li class="breadcrumb-item active">ကျောင်းပုံစံ-၅</li>
                                                </ol>
                                            </div>
                                        </div>
                                    <div class="post">
                                        
                                        <p><strong>ကျောင်းအဆောက်အဦ(အဆောက်အဦအမျိုးအစား၊အတိုင်းအတာ၊အထပ်အရေအတွက် စသည်)</strong></p>
                                        <div class="row mb-1">
                                
                                            <table class="table tbl_bulding_type table-bordered input-table">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight text-center" >စဉ်</th>
                                                        <th class="less-font-weight text-center" >အဆောက်အဦအမျိုးအစား</th>
                                                        <th class="less-font-weight text-center" >အတိုင်းအတာ</th>
                                                        <th class="less-font-weight text-center"  >အထပ်အရေအတွက်</th>
                                                        <th class="less-font-weight text-center"  >ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody class="tbl_bulding_type_body">

                                                </tboddy>
                                            </table>
                                    
                                        </div>
                                        
                                    </div>
                                    <div class="post clearfix">
                                    
                                        <p><strong>စာသင်ခန်း(အခန်းအရေအတွက်၊အတိုင်းအတာ၊ဝင်ဆံ့သင်တန်းသား၊လေအေးပေးစက်)</strong></p>
                                        <div class="row mb-1">
                                
                                            <table class="table tbl_classroom table-bordered input-table">
                                                <thead>
                                                    <tr>
                                                        <th class="less-font-weight text-center" >စဉ်</th>
                                                        <th class="less-font-weight text-center"  >အခန်းအရေအတွက်</th>
                                                        <th class="less-font-weight text-center"  >အတိုင်းအတာ</th>
                                                        <th class="less-font-weight text-center"  >ဝင်ဆံ့သင်တန်းသား</th>
                                                        <th class="less-font-weight text-center" >လေအေးပေးစက်</th>
                                                        <th class="less-font-weight text-center"  >ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody class="tbl_classroom_body">

                                                </tboddy>
                                            </table>
                                    
                                </div>
                                    
                                    </div>
                                    <div class="post clearfix">
                                    
                                    <!-- /.user-block -->
                                        <p><strong>သန့်စင်ခန်း(အမျိုးအစား၊အရေအတွက်)</strong></p>
                                        <div class="row mb-1">
                               
                                        <table class="table tbl_toilet_type table-bordered input-table">
                                            <thead>
                                                <tr>
                                                    <th class="less-font-weight text-center"  >စဉ်</th>
                                                    <th class="less-font-weight text-center"  >အမျိုးအစား</th>
                                                    <th class="less-font-weight text-center"  >အရေအတွက်</th>
                                                    <th class="less-font-weight text-center"  >ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="tbl_toilet_type_body">

                                            </tboddy>
                                        </table>
                                
                            </div>
                                    
                                    </div>
                                    <div class="post clearfix">
                                    
                                        <p><strong>စီမံရုံးခန်း(အခန်းအရေအတွက်၊အတိုင်းအတာ)</strong></p>
                                        <div class="row mb-1">
                            
                                                <table class="table tbl_manage_room_numbers table-bordered input-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="less-font-weight text-center" >စဉ်</th>
                                                                <th class="less-font-weight text-center"  >အခန်းအရေအတွက်</th>
                                                                <th class="less-font-weight text-center"  >အတိုင်းအတာ</th>
                                                                <th class="less-font-weight text-center"  >ဓါတ်ပုံနှင့်တကွဖော်ပြချက်</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tbl_manage_room_numbers_body">

                                                        </tboddy>
                                                </table>
                                            
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
                 <div class="card">
                    <div class="card-body">
                        <!-- <div class="row">
                            <div class="col-md-10"></div>
                            <label class="col-md-2 col-form-label" style="font-weight:bold">ကျောင်းပုံစံ-၁</label>
                                                        
                        </div> -->
                        
                        <div class="row">
                            
                            <div class="col-md-12 ">
                                <!-- <h5 class="border-bottom pb-2 text-center" style="font-weight:bold">School Information</h5>
                                
                                
                                
                                
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">လုပ်ငန်းဖွဲ့စည်းမှုပုံစံကျောင်းကို အောက်ဖော်ပြပါလုပ်ငန်းဖွဲ့စည်းမှုပုံစံဖြင့်ဆောင်ရွက်ပါမည် </p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="type"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-4 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">လျှောက်ထားသူ/အဖွဲ့အစည်း၏နောက်ခံသမိုင်း</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" id="hidden_attach">
                                        <button type="button" class="btn btn-primary btn-md" style="margin-bottom:1rem;margin-top:1px;" onclick="viewAttach();"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">ဆက်သွယ်ရန်လိပ်စာ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">ဖုန်းနံပါတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="phone"></span>
                                    </div>
                                </div> -->
                                
                                <input type="hidden" name="student_info_id" >

                                <div class="row justify-content-center" id="approve_reject" style="display:none;">                                     

                                    <button  id="reject" class="btn btn-danger"  onclick="rejectSchoolRegister();" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> REJECT</button>
                                    <button id="approve" class="btn btn-primary" onclick="approveSchoolRegister();" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> APPROVE</button>
                                </div>
                                
                            </div>
                        </div>                   
                    </div>
                </div>
            </form>
        </div>
       
    </div>
</div>
 <!-- Attached Certificate -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">လျှောက်ထားသူ/အဖွဲ့အစည်း၏နောက်ခံသမိုင်း</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="attachment"></div>
      </div>
              
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/school.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script>
    getSchoolInfos();
</script>
@endpush
