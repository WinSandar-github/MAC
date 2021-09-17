@extends('reporting.main')

@section('content')
<div class="row">
                    <div class="col-md-12 text-center">
                            <input type="hidden" id="course_code" name="course_code"  >
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-center m-3">တက်ရောက်ခွင့်ရသူများစာရင်း ထုတ်ပြန်ရန်</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                {{-- <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                                <div class="col-md-7 text-left" style="padding-left:0px;">
                                                                    <input type="text" name="filter_by_name" class="form-control" placeholder="Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                            <div class="col-md-1"></div>
                                                                <div class="col-md-3 text-left" style="font-weight:bold;">Batch</div>
                                                                <div class="col-md-7 text-left">
                                                                    <select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
                                                                        <option value="all" selected>All Batches</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-3 text-left" style="font-weight:bold;">NRC</div>
                                                                <div class="col-md-7 text-left" style="padding-left:0px;">
                                                                    <input type="text" name="filter_by_nrc" class="form-control" placeholder="eg. ၁/ကမတ(နိုင်)၁၂၃၄၅၆">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" style="vertical-align: top;">
                                                            <button type="button" class="btn btn-primary btn-round m-0" onclick="getDAList('da_1')" id="search">Search</button>
                                                        </div>
                                                    </div>

                                                

                                                </div> --}}
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="bold-font-weight" >No</th>
                                                                        <th class="bold-font-weight" >အမည်</th>
                                                                        <th class="bold-font-weight" >မှတ်ပုံတင်နံပါတ်</th>
                                                                        
                                                                        <th class="bold-font-weight" >ကိုယ်ပိုင်နံပါတ်</th>
        
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbl_app_list_body" class="hoverTable">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                            
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


@endsection

@push('scripts')
<script>
        $('document').ready(function(){
            var course_code = $('#course_code').val();
              showAppList(course_code);
        })
        </script>


@endpush