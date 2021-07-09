@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'da_approval'
])
@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($users->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>NRC Number</th>
                            <th>Admin Approved</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{!! $user->name_mm !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->phone !!}</td>
                                <td>{!! $user->nrc !!}</td>
                                <td>{!! showApproved($user->approve_reject_status) !!}</td>
                                <td>
                                    @if(FALSE == $user->approve_reject_status)
                                        <a href="{!! route('da_approval.edit', [$user->id]) !!}"
                                           class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Show</a>
                                    @endif
                                </td>   
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection