@extends('layouts.app', [
    'class' => '',
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
                                    <button type="button" id="create_course" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_course_modal">Create</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">                                            
                                            <div class="row">
                                                <div class="col-md-1 text-left" style="padding-top:9px;font-weight:bold;">
                                                    {{ __('Name') }}
                                                </div>
                                                <div class="col-md-3" style="padding-top:9px;padding-right:0px;padding-left:0px;">
                                                    <input type="text"  name="filter_name" class="form-control"  placeholder="Name" autocomplete="off">
                                                </div>
                                                <div class="col-md-4" style="padding-left:0px;">
                                                    <button type="button" id="filter_course" onclick="getCourse()" class="btn btn-primary btn-round" >Search</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table id="tbl_course"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >Sr No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Form Fee</th>
                                                        <th class="bold-font-weight" >Registration Fee</th>
                                                        <th class="bold-font-weight" >Exam Fee</th>
                                                        <th class="bold-font-weight" >Tution Fee</th>
                                                        <th class="bold-font-weight" >Description</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="tbl_course_body">

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
    <div class="modal fade" id="create_course_modal" style="padding-top:80px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data"> -->
                <form id="course_form" method="post" action="javascript:createCourse();" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden"  name="course_id" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('2.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Form Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text"  name="form_fee" class="form-control"  placeholder="Form Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('3.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Registration Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="registration_fee" class="form-control" placeholder="Registration Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_fee" class="form-control" placeholder="Exam Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Tution Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="tution_fee" class="form-control" placeholder="Tution Fee" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('8.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Description') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control"  placeholder="Description" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('9.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Code') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="code" class="form-control"  placeholder="For Eg: da_1" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('10.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Type') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select name="course_type" class="form-control course_type" required>

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
    $(document).ready(function (e) {
        $("input[name='registration_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='registration_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });

        $.ajax({
            url:BACKEND_URL+'/get_course_type',
            type:'GET',
            success:function(response){
                 var opt = '<option value="" selected >Select</option>';

                $.each(response.data,function(i,v){
                    opt +=
                        `<option value=${v.id}  >${v.name}</option>`;
                    })
                $(".course_type").append(opt);
            }
        })

        window.onclick = function(event) {
            if (event.target == document.getElementById("create_course")) {
                document.getElementById("course_form").reset();
            }
        }

    });
    getCourse();
</script>
@endpush
