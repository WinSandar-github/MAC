@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('teacher_registration') }}
            </div>
        </div>
        <form method="GET">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">{{ __('Teacher Registration Lists') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <div class="col-md-9">
                                <nav class="nav flex-column">
                                    <a class="nav-link active" href="{{ route('page.index', 'teacher-register-form1') }}">သင်တန်းဆရာ မှတ်ပုံတင်လျှောက်လွှာ</a>
                                    <a class="nav-link active" href="{{ route('page.index', 'teacher-register-form2') }}">သင်တန်းဆရာ မှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ</a>
                                    
                                </nav>
                            </div> -->
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">Name</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-3 text-left" style="font-weight:bold;">NRC</div>
                                                    <div class="col-md-7 text-left" style="padding-left:0px;">
                                                        <input type="text" name="nrc" class="form-control" placeholder="eg. ၁/ကမတ(နိုင်)၁၂၃၄၅၆">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="vertical-align: top;">
                                                <button type="submit" class="btn btn-primary btn-round">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="card-body">
                                        <hr size="5" width="95%" color="#F5F5F5"> 
                                            {{--<table id="tbl_teacher"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Email</th>     
                                                        <th class="bold-font-weight" >Phone Number</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                        <th class="bold-font-weight" >Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_teacher_body" class="hoverTable">
                                                </tbody>
                                            </table>--}}

                                            <table id="tbl_teacher"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>NRC</th>
                                                    <th>Status</th>
                                                    <th colspan="3">Detail</th>
                                                </thead>
                                                <tbody>
                                                <?php $index = 1; ?>
                                                @foreach($teacher as $teach)
                                                    <tr>
                                                        <td>{{ $index++ }}</td>
                                                        <td>{!! $teach->name_mm !!}</td>
                                                        <td>{!! $teach->email !!}</td>
                                                        <td>{!! $teach->phone !!}</td>
                                                        <td>{!! $teach->nrc_state_region !!}/{!! $teach->nrc_township !!}({!! $teach->nrc_citizen !!}){!! $teach->nrc_number !!}</td>
                                                        @if($teach->approve_reject_status == 0)
                                                            <td>PENDING</td>
                                                        @elseif($teach->approve_reject_status == 1)
                                                            <td>APPROVED</td>
                                                        @else
                                                            <td>REJECTED</td>
                                                        @endif
                                                        <td>
                                                            <button type='button' class='btn btn-primary btn-xs' onClick="showTeacher({!! $teach->id !!})"><li class='fa fa-eye fa-sm'></li></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                {{ $teacher->appends($_GET)->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer ">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
<script src="{{asset('js/teacher.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
        //
    });
    </script>
    
@endpush
