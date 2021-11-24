@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'administrator',
    'elementActive' => 'esign_list'
])

@section('content')

    <div class="content">
        @include('flash-message')

        <div class="row">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">

                            <div class="float-right">

                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_esign_model">Create</button>
                            </div>

                                    <h5 class="card-title">{{ __('E-sign List') }}</h5>

                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">


                                            <table id="tbl_esign"class="table table-hover text-nowrap " style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >Sr No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Position</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="tbl_esign_body">

                                                </tbody>
                                            </table>


                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_esign_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <form id="esign_form" method="post" action="javascript:createEsignUser();" enctype="multipart/form-data">
                <input type="hidden" name="esign_id" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create E-Sign User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('1') }}</label>
                        <label class="col-md-2 form-label">{{ __('Name') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('2') }}</label>
                        <label class="col-md-2 form-label">{{ __('Position') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="position" class="form-control" placeholder="Position" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('3') }}</label>
                        <label class="col-md-2 form-label">{{ __('Attach File') }}</label>
                        {{--<div class="col-md-9">
                            <input type="file" class="form-control" id="esign_file" name="esign_file">
                        </div>--}}
                        <div class="col-md-6 text-center">
                            <div class="fileinput fileinput-new text-center mt-4" data-provides="fileinput">
                                <div class="fileinput-new thumbnail shadow">
                                    <img src="{{ asset('assets/images/image_placeholder.png') }}" alt="Upload Photo" id="esign_file">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                <div>
                                    <span class="btn btn-secondary btn-round btn-file">
                                        <span class="fileinput-new">Upload File</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="hidden" value="">
                                        <input type="file" id="esign_file" name="esign_file" value="{{ old('esign_file') }}" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                                <span class="form-text text-danger">Allowed Jpeg and Png Image.</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" form="esign_form">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>
    $(document).ready(function() {
    //     var crateModal = document.getElementById('create_requirement_model');
    //     crateModal.addEventListener('show.bs.modal', function (event) {
    //         var button = event.relatedTarget;
    //     });

    $('#tbl_esign').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: FRONTEND_URL + "/show_esign",
                columns: [
                    {data: "id", name: 'No'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'position', name: 'position'},

                ],
            });


    });

    // loadCourse();
    // loadCourseToFilter();
    // getRequirement();
    window.onclick = function(event) {
            if (event.target == document.getElementById("create_btn")) {
                document.getElementById("esign_form").reset();
            }
        }
</script>
@endpush
