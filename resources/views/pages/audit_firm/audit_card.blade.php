
@extends('layouts.app', [
'class' => '',
'parentElement' => '',
'elementActive' => 'audit_firm_registration'
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

                                {{--<div class="card-header">


                                </div>--}}

                                <div class="card-body text-center">
                                <center>
                                    <h5><b>မြန်မာနိုင်ငံစာရင်းကောင်စီ</b></h5>
                                    <h6><b>MYANMAR ACCOUNTANCY COUNCIL</b></h6>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center">
                                            <img class="fileinput-new thumbnail img-circle logo" src="{{ asset('img/logo/mac_logo.jpeg') }}"
                                                alt="User profile picture" style="width:120px;">
                                        </div>
                                        
                                    </div>
                                    <h5 class="mt-3"><b>ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းမှတ်ပုံတင်လက်မှတ်</b></h5>
                                    <h6 class="mt-3"><b>Certificate Of Audit Firm Name Registration</b></h6>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                        မြန်မာနိုင်ငံစာရင်းကောင်စီသည် အောက်ဖော်ပြပါလုပ်ငန်းအဖွဲ့အား မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေပုဒ်မ ၅၁ နှင့်အညီ စာရင်းစစ်လုပ်ငန်းအမည်မှတ်ပုံတင်လက်မှတ်ထုတ်ပေးလိုက်သည်။
                                        </div>
                                    </div>
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            Myanmar Accountancy Council hereby issues this Certificate of Audit Firm Name to the following firm in accordance with section 51 of its Law.
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                                
                                        <table style="width:100%" id="tbl_school" class="table table-bordered">
                                            <tbody id="tbl_school_body">
                                            <tr>
                                                <td width="55%">မှတ်ပုံတင်အမှတ်နှင့် ထုတ်ပေးသည့်ရက်စွဲ</td>
                                                
                                                <td id='regno_date' rowspan="2"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td >Registration Number and Date of Issue</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td width="55%">လုပ်ငန်းအမည်</td>
                                                <td id='accountancy_firm_name' rowspan="2"></td>
                                                
                                            </tr>
                                            <tr>
                                                <td >Name of the Firm</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>လုပ်ငန်းအမျိုးအစား</td>
                                                <td  rowspan="2">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="os1"> Sole proprietorship

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="os2"> Partnership

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="os3"> Company incorporated

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check mt-2 form-check-inline">
                                                                <input class="form-check-input" type="radio" name="os4"> Other

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
                                                <td>တာဝန်ခံPAPP အမည်</td>
                                                
                                                <td id="name" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>Name of Responsible PAPP</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>တာဝန်ခံPAPP မှတ်ပုံတင်အမှတ်</td>
                                                
                                                <td id="public_private_reg_no" rowspan="2"> </td>
                                            </tr>
                                            <tr>
                                                <td>Responsible PAPP’s Reg. No.</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>လုပ်ငန်းတည်နေရာ</td>
                                                
                                                <td rowspan="2" id="head_office_address"> </td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td>သက်တမ်းကုန်ဆုံးရက်</td>
                                                
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
                                    <div class="row mt-3 " style="text-align: justify;">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            This certificate is issued to the Firm to facilitate engagement appointment and auditors report must be signed off by the engagement partner holding practicing certificate.
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mt-3 " >
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <textarea></textarea>
                                            <label>မှတ်ပုံတင်အရာရှိ (Register)</label>
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
    <script src="{{ asset('js/audit_card.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    
    <script>
        loadAuditCard();
        
    </script>
@endpush
