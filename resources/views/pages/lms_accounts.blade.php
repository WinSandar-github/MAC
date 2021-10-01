@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'lms_accounts'
])

@section('content')
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs:: render('lms_accounts') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                        <h5 class="card-title">{{ __("LMS Accounts") }}</h5>
                        </div>
                        <div class="col-md-3">
                        <a href="{{ route('account.index') }}" class="btn btn-success float-right">{{ __("Create Account") }}</a>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __("First Name / Surname") }}</th>
                                        <th>{{ __("Username") }}</th>
                                        <th>{{ __("Email") }}</th>
                                        <th>{{ __("Suspended") }}
                                        <th>{{ __("Edit") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lms_accounts as $lms_account)
                                        <tr>
                                            <td>{{ $lms_account->firstname.' '.$lms_account->last_name }}</td>
                                            <td>{{ $lms_account->username }}</td>
                                            <td>{{ $lms_account->email }}</td>
                                            <td>
                                                {{ $lms_account->suspended == 1 ? "Yes" : "No" }}
                                            </td>
                                            <td>
                                            <a href="{{ route('account.show',$lms_account['id']) }}" class="btn btn-success">
                                                <i class="fa fa-pencil-square-o fa-size" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('account.destroy',$lms_account['id']) }}" class="btn btn-danger">
                                                <i class="fa fa-trash fa-size" aria-hidden="true"></i>
                                            </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $lms_accounts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
