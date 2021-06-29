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

        <div class="bg-modal">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <div class="popup">
                    <div class="popup-header">
                        <a href="#" class="close">
                        <div class="close"> <i class="fa fa-close"></i></div>
                        </a>
                    </div>
                    <div class="popup-body">
                        <p> hello you there </p>
                    </div>
                    <div class="popup-footer">
                        <ul>
                        <li> <a href="#"> yes  </a> </li>
                        <li> <a href="#"> no  </a> </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
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
                                    <a href="" class="btn btn-success" id="create_batch_form">Create</a>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#create_batch_form').on('click', function() {
            $('.bg-modal').addClass('bg-modal-visible');
        });
        // $('.bg-modal').on('click', function(e) {
        //     e.preventDefault();
        //     console.log($(e.target));
        //     if ($(e.target).is('.fa-close') || $(e.target).is('.col-md-12') || $(e.target).is('.bg-modal')) {
        //     $('.bg-modal').removeClass('bg-modal-visible');
        //     }
        // });
    });
</script>
@endpush
