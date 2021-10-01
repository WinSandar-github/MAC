@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'course_list'
])

@section('content')
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('သင်တန်း') }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">{{ __('Course List') }}</h5>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-4 d-md-flex justify-content-md-end">
                                    <button type="button" id="create_course" class="btn btn-primary btn-round"
                                            data-toggle="modal" data-target="#create_course_modal">Create
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row pl-2">
                                                <div class="col-md-2 text-left" style="font-weight:bold;">
                                                    {{ __('Course Name') }}
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="filter_name" class="form-control"
                                                           placeholder="Course Name" autocomplete="off">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" id="filter_course" onclick="getCourse()"
                                                            class="btn btn-primary btn-round m-0">Search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="tbl_course" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th class="">No</th>
                                                    <th class="">Action</th>
                                                    <th class="">Course Name</th>
                                                    <th class="">Description</th>
                                                    <th class="">Application Fee</th>
                                                    <th class="">Self-Study Registration Fee</th>
                                                    <th class="">Private School Registration Fee</th>
                                                    <th class="">MAC Registration Fee</th>
                                                    <th class="" >Exam Fee</th>
                                                    <th class="">Course Fee</th>
                                                    <th class="">Requirement</th>
                                                </tr>
                                                </thead>
                                                <tbody id="tbl_course_body" class="hoverTable text-left">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_course_modal" style="padding-top:80px;">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <!-- <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data"> -->
                <form id="course_form" method="post" action="javascript:createCourse();" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Course Name"
                                           autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('2.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Description') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <textarea id="summernote" name="description" class="" width="100%"
                                              height="auto"></textarea>
                                    <!-- <input type="text" name="description" class="form-control"  placeholder="Description" autocomplete="off" required> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('3.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Application Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="form_fee" class="form-control"
                                           placeholder="Application Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Self-Study Registration Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="selfstudy_registration_fee" class="form-control"
                                           placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Private School Registration Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="privateschool_registration_fee" class="form-control"
                                           placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('MAC Registration Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="mac_registration_fee" class="form-control"
                                           placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        {{--<div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_fee" class="form-control" placeholder="Exam Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('7.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="tution_fee" class="form-control" placeholder="Course Fee"
                                           autocomplete="off" required>
                                </div>
                            </div>
                        </div>


                        {{--<div class="row">
                            <label class="col-md-1 form-label">{{ __('9.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Code') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="code" class="form-control"  placeholder="For Eg: da_1" autocomplete="off">
                                </div>
                            </div>
                        </div>--}}

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('8.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Show In Menu') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select name="course_type" class="form-control course_type" required>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('9.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Requirement') }}</label>
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
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            var requirement_list;
            getRequirementCourse();

            // getCourse();

            var course_name = $("input[name=filter_name]").val() == "" ? 'all' : $("input[name=filter_name]").val() ;

            $('#tbl_course').DataTable({
                processing : true,
                serverSide : true,
                ajax : BACKEND_URL + "/filter_course/" + course_name,
                columns :[
                    { data : "id", name : 'No' },
                    { data : 'action', name : 'action'},
                    { data : 'name', name : 'name'},
                    { data : 'description', name : 'Description'},
                    { data : 'form_fee', name : 'Application Fee'},
                    { data : 'selfstudy_registration_fee', name : 'Self-Study Registration Fee'},
                    { data : 'privateschool_registration_fee', name : 'Private School Registration Fee'},
                    { data : 'mac_registration_fee', name : 'MAC Registration Fee'},
                    { data : 'exam_fee', name : 'Exam Fee'},
                    { data : 'tution_fee', name : 'Course Fee'},
                    { data : 'requirement_id', name : 'Requirement'},
                ]
            })

            $('#summernote').summernote({
                placeholder: 'Enter Descriptions!',
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
                success: function (response) {
                    var opt = `<option value='' selected >Select</option>`;
                    $.each(response.data, function (i, v) {
                        opt += `<option value=${v.id}  >${v.name}</option>`;
                    });

                    $(".course_type").append(opt);
                }
            });

            $.ajax({
                url: BACKEND_URL + '/get_requirement_id',
                type: 'GET',
                success: function (response) {
                    var opt = `<option value="" selected >Select</option>`;
                    $.each(response.data, function (i, v) {
                        opt += `<option value=${v.id}  >${v.name}</option>`;
                    })
                    $(".requirement_id").append(opt);
                }
            });

            window.onclick = function (event) {
                if (event.target == document.getElementById("create_course")) {
                    document.getElementById("course_form").reset();
                }
            }
        });

    </script>
@endpush
