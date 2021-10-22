@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'administrator',
    'elementActive' => 'course_list'
])

@section('content')
    <div class="content">
        @include('flash-message')

        {{-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('သင်တန်း
            </div>
        </div> --}}

        <!-- Main Courses List -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <button type="button" id="main_course_create" class="btn btn-primary btn-round"
                                data-toggle="modal" data-target="#main_course_modal">Create New Main Course
                            </button>
                        </div>
                        <h5 class="card-title">Main Courses List</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl_main_course" class="table table-striped nowrap">
                                    <thead>
                                        <tr>
                                            <th class="">No</th>
                                        <th class="">Action</th>
                                            <th class="
                                                ">Main Course Name</th>
                                        <th class="">
                                                Description</th>
                                            <th class="">Created Date</th>
                                        <th class="">Updated Date</th>
                                        </tr>
                                        </thead>
                                        <tbody id=" tbl_main_course_body" class="hoverTable text-left">
                                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sub Courses List -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <button type="button" id="create_course" class="btn btn-primary btn-round" data-toggle="modal"
                                data-target="#create_course_modal">Create New Sub Course
                            </button>
                        </div>
                        <h5 class="card-title">Sub Course List</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tbl_sub_course" class="table table-striped nowrap">
                                    <thead>
                                        <tr>
                                            <th class="">No</th>
                                        <th class="">Action</th>
                                            <th class="
                                                ">Sub Course Name</th>
                                            <th class="">Application Fee</th>
                                        <th class="">Self-Study Registration Fee</th>
                                            <th class="
                                                ">Private School Registration Fee</th>
                                        <th class="">
                                                MAC Registration Fee</th>
                                        <th class="">Exam Fee</th>
                                        <th class="">Entry Exam Fee</th>
                                        <th class="">Course Fee</th>
                                        
                                        <th class="">Requirement</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbl_course_body"
                                                class="hoverTable text-left">
                                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Course Create Modal -->
    <div class="modal fade" id="main_course_modal" style="padding-top:80px;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- <form method="post" action="{{ route('course.store" enctype="multipart/form-data"> -->
                <form id="main_course_form" method="post" action="javascript:createMainCourse();"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="main_course_id">

                    <div class="modal-header">
                        <h5 class="modal-title" id="mainModalLabel">Create Main Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <!-- Course Name Field -->
                        <div class="row">
                            <label class="col-md-3 form-label">1.Course Name</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="main_course_name" class="form-control"
                                        placeholder="Course Name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                         <!-- Course Name MM Field -->
                         <div class="row">
                            <label class="col-md-3 form-label">1.Course Name (MM)</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="main_course_name_mm" class="form-control"
                                        placeholder="သင်တန်းအမည်" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <!-- Course Description Field -->
                        <div class="row">
                            <label class="col-md-3 form-label">2.Description</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea id="main_summernote" name="main_course_description" class="" width="
                                        100%" height="auto"></textarea>
                                    <!-- <input type="text" name="description" class="form-control"  placeholder="Description" autocomplete="off" required> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="save" class="btn btn-primary" form="main_course_form">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Sub Course Create Modal -->
    <div class="modal fade" id="create_course_modal" style="padding-top:80px;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- <form method="post" action="{{ route('course.store" enctype="multipart/form-data"> -->
                <form id="course_form" method="post" action="javascript:createCourse();" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subModalLabel">Create Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <label class="col-md-1 form-label">1.</label>
                            <label class="col-md-4 form-label">Main Course Name</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select name="course_type" class="form-control course_type" required>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">2.</label>
                            <label class="col-md-4 form-label">Course Name</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="course_name" class="form-control" placeholder="Course Name"
                                        autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">2.</label>
                            <label class="col-md-4 form-label">Course Name(မြန်မာ)</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="course_name_mm" class="form-control" placeholder="Course Name(မြန်မာ)"
                                        autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">3.</label>
                            <label class="col-md-4 form-label">Application Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="form_fee" class="form-control" placeholder="Application Fee"
                                        autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">4.</label>
                            <label class="col-md-4 form-label">Self-Study Registration Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="selfstudy_registration_fee" class="form-control"
                                        placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">5.</label>
                            <label class="col-md-4 form-label">Private School Registration Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="privateschool_registration_fee" class="form-control"
                                        placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">6.</label>
                            <label class="col-md-4 form-label">MAC Registration Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="mac_registration_fee" class="form-control"
                                        placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <label class="col-md-1 form-label">7.</label>
                            <label class="col-md-4 form-label">Exam Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_fee" class="form-control" placeholder="Exam Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <label class="col-md-1 form-label">7.</label>
                            <label class="col-md-4 form-label">Course Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="tution_fee" class="form-control" placeholder="Course Fee"
                                        autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <label class="col-md-1 form-label">8.</label>
                            <label class="col-md-4 form-label">Exam Registration Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_fee" class="form-control"
                                        placeholder="Exam Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">9.</label>
                            <label class="col-md-4 form-label">Entry Exam Registration Fee</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="entry_exam_fee" class="form-control"
                                        placeholder="Entry Exam Registration Fee" autocomplete="off" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">10.</label>
                            <label class="col-md-4 form-label">Requirement</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select name="requirement_id[]"
                                        class="form-control requirement_id multiple-requirement" multiple="multiple"
                                        required style="width:100%">
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="save" class="btn btn-primary" form="course_form">Save</button>
                    </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // reset modal
            $('.modal').on('hidden.bs.modal', function(event) {
                $(this).find('form').trigger('reset');
                $('#main_summernote').summernote('code', '');
                $('#sub_summernote').summernote('code', '');
                $('#mainModalLabel').text("Create Main Course");
                $('#subModalLabel').text("Create Course");
            });

            var requirement_list;
            getRequirementCourse();

            // getCourse();

            $('#tbl_main_course').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: BACKEND_URL + "/get_main_course",
                columns: [{
                        data: "id",
                        name: 'No',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'course_name',
                        name: 'Main Course Name'
                    },
                    {
                        data: 'course_description',
                        name: 'Description'
                    },
                    {
                        data: 'created_at',
                        name: 'Created Date'
                    },
                    {
                        data: 'updated_at',
                        name: 'Updated Date'
                    }
                ],
            });

            var course_name = $("input[name=filter_name]").val() == "" ? 'all' : $("input[name=filter_name]").val();

            getCourseList();

            $('#main_summernote, #sub_summernote').summernote({
                placeholder: 'Enter Descriptions!',
                height: 300
            });

            $('.multiple-requirement').select2({
                placeholder: "Select Requirement"
            });

            $("input[name='registration_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $("input[name='registration_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            $.ajax({
                url: BACKEND_URL + '/get_course_type',
                type: 'GET',
                success: function(response) {
                    var opt = `<option value='' selected >Select</option>`;
                    $.each(response.data, function(i, v) {
                        opt += `<option value=${v.id}  >${v.course_name}</option>`;
                    });

                    $(".course_type").append(opt);
                }
            });

            $.ajax({
                url: BACKEND_URL + '/get_requirement_id',
                type: 'GET',
                success: function(response) {
                    var opt; //`<option value="" selected >Select</option>`;
                    $.each(response.data, function(i, v) {
                        opt += `<option value=${v.id}  >${v.requirement_name}</option>`;
                    })
                    $(".requirement_id").append(opt);
                }
            });

            window.onclick = function(event) {
                if (event.target == document.getElementById("create_course")) {
                    document.getElementById("course_form").reset();
                }
            }
        });
    </script>
@endpush
