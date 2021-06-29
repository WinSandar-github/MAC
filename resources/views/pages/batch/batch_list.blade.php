@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'batch_list'
])

@section('content')
    
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('သင်တန်းအပတ်စဥ်') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Batch Lists') }}</h5>
                                </div>
                                <div class="col-md-4" style="padding-left: 175px; margin-top: -10px;">
                                    <a href="" class="btn btn-success">Create</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Sr No</th>
                                        <th rowspan="2" width="15%">Name</th>
                                        <th rowspan="2" width="15%">Batch Name</th>                                        
                                        <th rowspan="1" colspan="2" width="10%">Date</th>
                                        <th rowspan="2" width="15%">Moodle Course</th>
                                        <th rowspan="2" width="15%">Publish Status</th>
                                        <th rowspan="2" width="10%">Accept Application Date</th>
                                        <th rowspan="2" width="15%">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
