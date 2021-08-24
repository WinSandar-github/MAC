@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher_registration'
])
@section('content')
<style>
    
</style>
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">        
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="javascript:void();" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="card">
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-12 text-left">
                                <h5 class="border-bottom pb-2 text-center" style="font-weight:bold">Teacher Information</h5>
                                
                                
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2 text-bold" style="font-weight:bold">၁။ အမည်(မြန်မာ) / အမည်(အင်္ဂလိပ်)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="name_mm"></span> / <span id="name_eng"></span>
                                    </div>
                                </div>
                                
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၂။ အဘအမည်(မြန်မာ) / အဘအမည်(အင်္ဂလိပ်)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="father_name_mm"></span> / <span id="father_name_eng"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၃။ နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၄။ ဖုန်းနံပါတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၅။ အီးမေးလ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၆။ ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <table id="tbl_degree"class="table table-bordered table-hover text-center">
                                            <thead class="text-nowrap table-primary">
                                                <tr>
                                                    <th class="bold-font-weight" >စဉ်</th>
                                                    <th class="bold-font-weight" >ပညာအရည်အချင်း</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_degree_body" class="hoverTable">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၇။ နိုင်ငံ့ဝန်ထမ်း ဟုတ်/မဟုတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="radio1" id="inlineRadio1" value="1">
                                          <label for="inlineRadio1">ဟုတ်</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="radio2" id="inlineRadio2" value="0">
                                          <label for="inlineRadio2">မဟုတ်</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3">
                                    <div class="col-md-12">
                                        <p class="ml-2" style="font-weight:bold">၈။ သင်ကြားမည့်သင်တန်းနှင့် ဘာသာရပ်များ</p>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">(က)လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း</p>
                                    </div>
                                    <div class="col-md-6">
                                        <table id="tbl_certificate"class="table table-bordered table-hover text-center">
                                            <thead class="text-nowrap table-primary">
                                                <tr>
                                                    <th class="bold-font-weight" >စဉ်</th>
                                                    <th class="bold-font-weight" >လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_certificate_body" class="hoverTable">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">(ခ)ဒီပလိုမာစာရင်းကိုင်သင်တန်း</p>
                                    </div>
                                    <div class="col-md-6">
                                        <table id="tbl_diploma"class="table table-bordered table-hover text-center">
                                            <thead class="text-nowrap table-primary">
                                                <tr>
                                                    <th class="bold-font-weight" >စဉ်</th>
                                                    <th class="bold-font-weight" >ဒီပလိုမာစာရင်းကိုင်သင်တန်း</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_diploma_body" class="hoverTable">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၉။ သင်ကြားမည့်ဘာသာရပ်အတွက် သင်ကြားမှုနှင့် အခြားအတွေ့အကြုံများ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="exp_desc"></span>
                                    </div>
                                </div>
                                <div class="row mt-5 justify-content-center" id="approve_reject" style="display:none;">                                    

                                    <button  id="reject" class="btn btn-danger"  onclick="rejectTeacherRegister();" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> REJECT</button>
                                    <button id="approve" class="btn btn-primary" onclick="approveTeacherRegister();" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> APPROVE</button>
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
<script src="{{asset('js/teacher.js')}}"></script>
<script>
    getTeacherInfos();
</script>
@endpush
