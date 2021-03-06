@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'administrator',
    'elementActive' => 'requirement_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
       {{-- <div class="row">
            <div class="col-md-12">
            {{ Breadcrumbs::render('အရည်အချင်းသတ်မှတ်ချက်') }}
            </div>
        </div>  --}}

        <div class="row">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">

                            <div class="float-right">

                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_requirement_model">Create</button>
                            </div>

                                    <h5 class="card-title">{{ __('Requirement List') }}</h5>

                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">


                                            <table id="tbl_requirement"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >Sr No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <!-- <th class="bold-font-weight" >Type</th>                                                                                                 -->
                                                        <!-- <th class="bold-font-weight" >Course Name</th>                                         -->

                                                    </tr>

                                                </thead>
                                                <tbody id="tbl_requirement_body">

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
    <div class="modal fade" id="create_requirement_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <form id="requirement_form" method="post" action="javascript:createRequirement();" enctype="multipart/form-data">
                <input type="hidden"  name="requirement_id" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Requirement</h5>
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
                    {{--
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('2.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Type') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="form-control form-select" name="type" id="selected_type" style="width: 100%;">
                                    <option value="0" selected>Select Type</option>
                                    <option value="COURSE">COURSE</option>
                                    <option value="SCHOOL">SCHOOL</option>
                                    <option value="TEACHER">TEACHER</option>
                                    <option value="MENTOR">MENTOR</option>
                                    <option value="AUDIT_FIRM">AUDIT_FIRM</option>
                                    <option value="NON_AUDIT_FIRM">NON_AUDIT_FIRM</option>
                                    <option value="CPA_FF">CPA_FF</option>
                                    <option value="PAPP">PAPP</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    --}}

                    {{--<div class="row">
                        <label class="col-md-1 form-label">{{ __('2.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Course Name') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select class="form-control form-select" name="course_id" id="selected_course_id" style="width: 100%;">
                                    <option value="" disabled selected>Select Course</option>
                                </select>
                            </div>
                        </div>
                    </div>--}}


                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" form="requirement_form">Save</button>
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

    $('#tbl_requirement').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: FRONTEND_URL + "/show_requirement",
                columns: [
                    {data: "id", name: 'No'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'requirement_name', name: 'requirement_name'},

                ],
            });


    });

    // loadCourse();
    // loadCourseToFilter();
    // getRequirement();
    window.onclick = function(event) {
            if (event.target == document.getElementById("create_btn")) {
                document.getElementById("requirement_form").reset();
            }
        }
</script>
@endpush
