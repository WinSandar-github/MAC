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
                    <table class="table table-striped cell-border display compact ui table-hover tbl_repeat student_info_list" id="sortable">
                        <thead class="text-center">
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone Number</td>
                                <td>NRC Number</td>
                                <td>Status</td>
                                <td>Detail</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
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
                                    <a href="{!! route('da_approval.show', [$user->id]) !!}" class='btn btn-primary'><i class="fa fa-eye" aria-hidden="true"></i></a>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.student_info_list').DataTable({
                "paging":   true,
                "ordering": false,
                "info":     false
            });
        });
    </script>
@endpush