@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'da_list'
])
@section('content')
<div class="content">
    @include('flash-message')
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <form action="javascript:void()" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img id="image" width="30%" class="rounded-circle" style="width: 100px;height : 100px" />
                                    <br/><span class='text-info'>Profile Picture</span>
                                </center>
                                <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Education</h5>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">University Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="university_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2"  style="font-weight:bold">Degree Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="degree_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Qualified Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="qualified_date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Roll Number</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="roll_number"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Attached Certificate</p>
                                    </div>
                                    <div class="col-md-6 text-left certificate">

                                        <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-paperclip"></i></button> -->
                                        <!-- <button type="button" style="width: 30%;margin-top:1% ;" class="btn btn-primary" onclick="file_read('certificate')"><i class="fa fa-paperclip"></i></button> -->
                                    </div>
                                </div> 

                                <div class="da_two_pass_info" style="display:none">
                                    <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">Informations of Passed the DA Part-Two Exam</h5>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Certificate of Passed the DA Part-Two Exam</p>
                                        </div>
                                        <div class="col-md-6 text-left da_pass_certificate">                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Passed the Date</p>
                                        </div>
                                        <div class="col-md-6 text-left da_pass_date">                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Passed Roll-Number</p>
                                        </div>
                                        <div class="col-md-6 text-left da_pass_roll_number">                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="acca_cima_info" style="display:none">
                                    <h5 class="border-bottom pb-2 mt-3"  style="font-weight:bold">ACCA / CIMA Info</h5>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">ACCA (OR) CIMA</p>
                                        </div>
                                        <div class="col-md-6 text-left acca_cima">                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">အောင်မြင်ထားသည့်အဆင့်</p>
                                        </div>
                                        <div class="col-md-6 text-left acca_cima_pass_roll_no">                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">လ/ခုနှစ်</p>
                                        </div>
                                        <div class="col-md-6 text-left acca_cima_pass_date">                                            
                                            
                                        </div>
                                    </div>

                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">မှတ်ပုံတင်အမှတ်</p>
                                        </div>
                                        <div class="col-md-6 text-left acca_cima_id_no">                                            
                                            
                                        </div>
                                    </div>
                                    <div class="row m-2 mt-3 border-bottom">
                                        <div class="col-md-6 text-left">
                                            <p class="ml-2" style="font-weight:bold">Attched Certificate</p>
                                        </div>
                                        <div class="col-md-6 text-left acca_cima_certificate">                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2"  style="font-weight:bold">Job</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Job Position</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="position"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Department</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="department"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Organization</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="organization"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Company Name</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="company_name"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Salary</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="salary"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="office_address"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2"  style="font-weight:bold">Payment Information</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Payment Method</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="payment_method">Cash</span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Status</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="payment_status">Paid</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="border-bottom pb-2" style="font-weight:bold">Student Information</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2 text-bold" style="font-weight:bold">Name(Eng) / Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="name_eng"></span> / <span id="name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="nrc"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Front</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_front">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">NRC Back</p>
                                    </div>
                                    <div class="col-md-6 text-left nrc_back">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Father Name(Eng) / Father Name(Myanmar)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span  id="father_name_eng"></span> / <span id="father_name_mm"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ကျား/မ (Gender)</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gender"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Race</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="race"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Religion</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="religion"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="date_of_birth"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Current Address</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="current_address"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Phone</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="phone"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Email</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="email"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">နိုင်ငံ့ဝန်ထမ်း</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="gov_staff"></span>
                                        {{--<p>{{ $user->gov_staff == 0 ? 'No' : 'Yes'}}</p>--}}
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom recommend_row" style="display:none">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                    </div>
                                    <div class="col-md-6 text-left recommend_letter">

                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">ကိုယ်ပိုင်အမှတ်</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="registration_no"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Register Date</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="date"></span>
                                    </div>
                                </div>
                                <div class="row m-2 mt-3 border-bottom">
                                    <div class="col-md-6 text-left">
                                        <p class="ml-2" style="font-weight:bold">Batch</p>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span id="batch_name"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <img class="nrc-style" id="nrc_front_img"  accept="image/png,image/jpeg" alt="">
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <img class="nrc-style" id="nrc_back_img"  accept="image/png,image/jpeg" alt="">
                                    </div>
                                </div>
                                <input type="hidden" name="student_course_id" id="student_info_id">

                                <!-- <div class="row mt-5 justify-content-center" id="approve_reject">
                                    <button type="submit" name="save" id="reject" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                                    <button type="submit" name="save" id="approve" class="btn btn-primary" onclick="approveUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                                Button trigger modal


                                </div> -->

                                <!-- Attached Certificate -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                                    <div class="modal-dialog modal-lg" role="document" >
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <embed id="attach_file"  width="700px" height="500px">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="border-bottom pb-2"  style="font-weight:bold">Course History</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-border" id="tbl_course">
                                        <thead>
                                            <th>Course Name</th>
                                            <th>Batch Name</th>
                                            <th>Module</th>
                                            <th>Success Year</th>
                                        </thead>
                                        <tbody class="course">

                                        </tbody>
                                    </table>
                                </div>
                            <div class="row mt-5 justify-content-center" id="approve_reject"> 
                                <button type="submit" name="save" id="reject" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" style="width : 20%"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>REJECT</button>
                               
                                 <button type="submit" name="save" id="approve" class="btn btn-primary" onclick="approveUser()" style="width : 20%"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>APPROVE</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="remark-form"  method="post" action="javascript:rejectUser()" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                        <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="remark-form">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
    loadData();
</script>
@endpush
