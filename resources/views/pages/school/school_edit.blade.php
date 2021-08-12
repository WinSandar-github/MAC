@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'school_registration'
])
@section('content')
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
        <div class="col-md-12 text-center">
            <form action="javascript:void();" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-4 ">
                                <center>
                                    <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                </center>
                                <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Education</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Universtry Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="university_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2"  style="font-weight:bold">Degree Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="degree_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="qualified_date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="roll_number"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Attched Certificate</p>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>

                                <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Job</h5>
                        
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Job Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Job Position</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="position"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Department</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="department"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Organization</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="organization"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Company Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="company_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Salary</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="salary"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="office_address"></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-md-12 text-left">
                                <h5 class="border-bottom pb-2 text-center" style="font-weight:bold">School Information</h5>
                                
                                
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
                                        <p class="ml-2" style="font-weight:bold">၂။ နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၃။ အဘအမည်(မြန်မာ) / အဘအမည်(အင်္ဂလိပ်)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="father_name_mm"></span> / <span id="father_name_eng"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၄။ မွေးသဣရာဇ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="date_of_birth"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၅။ ပညာအရည်အချင်း</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="degree"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၆။ လုပ်ငန်းဖွဲ့စည်းမှုပုံစံကျောင်းကို အောက်ဖော်ပြပါလုပ်ငန်းဖွဲ့စည်းမှုပုံစံဖြင့်ဆောင်ရွက်ပါမည် </p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="type"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-4 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၇။ လျှောက်ထားသူ/အဖွဲ့အစည်း၏နောက်ခံသမိုင်း</p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" id="hidden_attach">
                                        <button type="button" class="btn btn-primary btn-md" style="margin-bottom:1rem;margin-top:1px;" onclick="viewAttach();"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၈။ ဆက်သွယ်ရန်လိပ်စာ</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၉။ ဖုန်းနံပါတ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6">
                                        <p class="ml-2" style="font-weight:bold">၁၀။ အီးမေးလ်</p>
                                    </div>
                                    <div class="col-md-6">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="student_info_id" >

                                <div class="row mt-5 justify-content-center" id="approve_reject" style="display:none;"> 
                                    <button id="approve" class="btn btn-primary" onclick="approveSchoolRegister();" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> APPROVE</button>

                                    <button  id="reject" class="btn btn-danger"  onclick="rejectSchoolRegister();" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> REJECT</button>
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
<script>
    getSchoolInfos();
</script>
@endpush
