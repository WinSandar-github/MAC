@extends('layouts.app', [
    'class' => '',
    'parentElement' => 'administrator',
    'elementActive' => 'exam_list'
])

@section('content')
    <div class="content">
        @include('flash-message')
        {{-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('exam_list') }}
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between px-4">
                                <h5 class="card-title text-center">{{ __('Exam List') }}</h5>
                                <button type="button" class="btn btn-primary btn-round" id="create_btn" data-toggle="modal"
                                    data-target="#create_exam_modal">Create</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tbl_exam" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight">Sr No</th>
                                        <th class="bold-font-weight">Action</th>
                                        <th class="bold-font-weight">Course Name</th>

                                        <th class="bold-font-weight">Batch Name</th>
                                        <th class="bold-font-weight">Exam Start Date</th>
                                        <th class="bold-font-weight">Exam End Date</th>
                                        <th class="bold-font-weight">Exam Start Time</th>
                                        <th class="bold-font-weight">Exam End Time</th>
                                        <th class="bold-font-weight">Exam Place</th>

                                    </tr>

                                </thead>
                                <tbody id="tbl_exam_body" class="hoverTable text-left">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_exam_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form id="exam_form" method="post" action="javascript:createExam();" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <input type="hidden" name="batch_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Exam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Type') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select class="form-control form-select" name="exam_type_id" id="selected_examtype_id"
                                        style="width: 100%;" onchange="loadeCourse()" required>
                                        <option value="" disabled selected>Select Exam Type</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select class="form-control form-select" name="course_id" id="selected_ecourse_id"
                                        style="width: 100%;" onchange="loadeBatch()" required>
                                        <option value="" disabled selected>Select Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select class="form-control form-select" name="batch_id" id="selected_ebatch_id"
                                        style="width: 100%;" required>
                                        <option value="" disabled selected>Select Batch</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_start_date" class="form-control"
                                        placeholder="DD-MMM-YYYY">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Start Time') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_start_time" class="form-control" placeholder="H:m">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam End Time') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_end_time" class="form-control" autocomplete="off"
                                        placeholder="H:m" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Place') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_place" class="form-control" autocomplete="off"
                                        placeholder="Enter the exam palce" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" form="exam_form">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create_exam_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="exam_form" method="post" action="javascript:createExam();" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <input type="hidden" name="exam_id" id="exam_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Exam </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_start_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('2.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('3.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Place') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_place" class="form-control" autocomplete="off"
                                        placeholder="Place" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Time') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_time" class="form-control" autocomplete="off"
                                        placeholder="Exam Time" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" form="exam_form">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("input[name='exam_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });

            $("input[name='exam_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='exam_start_time']").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            $("input[name='exam_end_time']").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });

            window.onclick = function(event) {
                if (event.target == document.getElementById("create_btn")) {
                    document.getElementById("exam_form").reset();
                }
            }

            getExam();

        });

        // $("#search").click(function(){

        //     table.draw();
        // });

        // function searchBatch(){

        //     table.draw();
        // }

        // loadeCourse();
        loadExamType();
        // loadeBatch();
        // loadCourseToFilter();
    </script>
@endpush
