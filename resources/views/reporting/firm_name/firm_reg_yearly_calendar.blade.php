@extends('reporting.main')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $data['title'] }}
                                
                            </h3>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row">
                     <div class="col-md-12 table-responsive">
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    <th class="bold-font-weight">စဥ်</th>
                                    <th class="bold-font-weight">Registration Number</th>
                                    <th class="bold-font-weight">လုပ်ငန်းအမည်</th>
                                   
                                    @if($data['firm_type'] === "1")

                                    <th class="bold-font-weight">လုပ်ငန်းကိုယ်စားရေးထိုးမယ် PAPP အမည် / နံပါတ်</th>
                                    @else
                                    <th class="bold-font-weight">တာဝန်ခံပုဂ္ဂိုလ်၏ အမည်</th>
                                    <th class="bold-font-weight"> csc_no || passport_no </th>
                                    
                                    @endif
                                    <th class="bold-font-weight">လုပ်ငန်းလိပ်စာ</th>
                                    <th class="bold-font-weight">ဖုန်းနံပါတ်</th>
                                    <th class="bold-font-weight">အီးမေလ်</th>
                                </tr>
                                </thead>
                                <!-- organization_structure_id -->
                                <tbody id="tbl_firm_reg_year_body" class="hoverTable">
                                    @php $count = 0; @endphp
                                    @foreach($data['audit_firms'] as $key => $firm)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$firm->accountancy_firm_reg_no}}</td>
                                            <td>{{$firm->accountancy_firm_name}}</td>
                                            @if($data['firm_type'] === "1")
                                            <td>
                                                <ul style="list-style-type: none;">
                                                @foreach($firm->firm_owner_audits as $owner_audit)
                                                    <li>{{$owner_audit->name}} / {{$owner_audit->public_private_reg_no}}</li>
                                                @endforeach      
                                                </ul>
                                            </td>   
                                            @else
                                            <td>{{$firm->name_of_sole_proprietor}}</td>
                                            <td>{{$firm->dir_passport_csc}}</td>
                                            @endif
                                             <td>{{$firm->head_office_address}}</td>
                                            <td>{{$firm->telephones}}</td>
                                            <td>{{$firm->h_email}}</td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection

