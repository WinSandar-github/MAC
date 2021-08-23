@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div>
        <form method="GET">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <table width="100%">
                                    <tr>
                                        <td width="90%"><h5 style="text-align: center;" class="card-title">{{ __('Mentor Lists (MAC)') }}</h5></td>
                                        <td width="10%">
                                            <button type="button" onclick="createForm()" class="btn btn-primary btn-round">Create</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
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
                                            {{--<table id="tbl_mentor"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Email</th>
                                                        <th class="bold-font-weight" >Phone Number</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                        <th class="bold-font-weight" >Type</th>
                                                        <th class="bold-font-weight" >Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_mentor_body" class="hoverTable">
                                                </tbody>
                                            </table>--}}
                                            <table id="tbl_mentor"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>NRC</th>
                                                    <th>Status</th>
                                                    <th>Type</th>
                                                    <th colspan="3">Detail</th>
                                                </thead>
                                                <tbody>
                                                <?php $index = 1; ?>
                                                @foreach($mentor as $men)
                                                    <tr>
                                                        <td>{{ $index++ }}</td>
                                                        <td>{!! $men->name_mm !!}</td>
                                                        <td>{!! $men->m_email !!}</td>
                                                        <td>{!! $men->phone_no !!}</td>
                                                        <td>{!! $men->nrc_state_region !!}/{!! $men->nrc_township !!}({!! $men->nrc_citizen !!}){!! $men->nrc_number !!}</td>
                                                        @if($men->status == 0)
                                                            <td>PENDING</td>
                                                        @elseif($men->status == 1)
                                                            <td>APPROVED</td>
                                                        @else
                                                            <td>REJECTED</td>
                                                        @endif
                                                        <td>{!! $men->type !!}</td>
                                                        @if($men->type == 'MAC')
                                                            <td>
                                                                <button type='button' class='btn btn-primary btn-xs' onClick="showMentor({!! $men->id !!})"><li class='fa fa-edit fa-sm'></li></button><button type='button' class='btn btn-danger btn-xs'><li class='fa fa-trash fa-sm'></li></button>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <button type='button' class='btn btn-primary btn-xs' onClick="showMentorStudent({!! $men->id !!})"><li class='fa fa-eye fa-sm'></li></button>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="pull-right">
                                                {{ $mentor->appends($_GET)->links() }}
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
<script>
    // getMentorList();
</script>
@endpush
