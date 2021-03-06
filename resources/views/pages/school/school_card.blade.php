
@extends('layouts.app', [
'class' => '',
'parentElement' => '',
'elementActive' => 'teacher_registration'
])
@section('content')
    <!-- Theme style -->
<link href="{{ asset('dist/css/adminlte.min.css')}}" rel="stylesheet">
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
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
            .table {
            border-collapse: collapse !important;

            td,
            th {
                background-color: $white !important;
            }
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
                float:right;
                margin-top:2%;
                margin-left:70%;
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
                                    <h5><b>??????????????????????????????????????????????????????????????????????????????</b></h5>
                                    <h6><b>MYANMAR ACCOUNTANCY COUNCIL</b></h6>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center">
                                            <img class="fileinput-new thumbnail img-circle logo" src="{{ asset('img/logo/mac_logo.jpeg') }}"
                                                alt="User profile picture" style="width:120px;">
                                        </div>
                                        
                                    </div>
                                    <h5 class="mt-3"><b>????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</b></h5>
                                    <h6 class="mt-3"><b>Registration Certificate of Private Accounting School </b></h6>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                        ??????????????????????????????????????????????????????????????????????????????????????? ??????????????????????????????????????? ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ??????????????????????????????????????????????????????????????????????????????
                                        ???????????? ??????????????? ?????? ???????????????????????? ????????????????????????????????????????????????????????????????????????????????????????????????????????? ?????????????????????????????? ????????????????????? ????????????????????????????????????????????????
                                        </div>
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            Myanmar Accountancy Council hereby issues this Registration Certificate of Private Accounting School to the following Private Accounting School in accordance with section 29 of its Law.
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                                
                                        <table style="width:100%" id="tbl_school" class="table table-bordered">
                                            <tbody id="tbl_school_body">
                                            <tr>
                                                <td width="55%">???????????????????????????????????????????????????????????? ???????????????????????????????????????????????????</td>
                                                
                                                <td id='regno_date' rowspan="2"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td >Registration Number and Date of Issue</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td width="55%">??????????????????????????????????????????????????????</td>
                                                <td id='school_name' rowspan="2"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td >Name of school</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>??????????????????????????????????????????????????????</td>
                                                <td  rowspan="2">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="school_type1"
                                                                    value='PCS' > Sole proprietorship

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="school_type2"
                                                                    value='PCP' > Partnership

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="school_type3" id=""
                                                                    value='PCC' > Company incorporated

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="school_type4" id=""
                                                                    value='P' > Other

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Organization Structure</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>???????????????????????????????????????????????????/???????????????????????? ????????????</td>
                                                
                                                <td id="founder_name" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>Name of School Founder</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>?????????????????????????????????????????????????????? ?????????????????????????????????????????????</td>
                                                
                                                <td id="founder_csc" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>School Founder???s CSC. No</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>???????????????????????????????????????????????????????????????</td>
                                                
                                                <td rowspan="2" id="course"> </td>
                                            </tr>
                                            <tr>
                                                <td>Types of Classes</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>??????????????????????????????????????????</td>
                                                
                                                <td id="school_location" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>Location of school</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>??????????????????????????????????????????????????????</td>
                                                
                                                <td id="expiry_date" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>Date of Expiry</td>
                                                
                                                
                                            </tr>
                                            </tbody>
                                        </table>
                                        
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <diiv class="row" style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10"><p>Location of Branch School is mentioned on the reverse.</p></div>
                                        
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            Location of Branch School
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            
                                        <table style="width:100%" id="tbl_branch" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Branch</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_branch_body">
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <textarea></textarea>
                                            <label>???????????????????????????????????????????????? (Register)</label>
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

                
    

@endsection
@push('scripts')
    <script src="{{ asset('js/school.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    
    <script>
        loadSchoolCard();
        
    </script>
@endpush
