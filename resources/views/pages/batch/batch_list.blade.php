@extends('layouts.app', [
'class' => '',
'parentElement' => 'administrator',
'elementActive' => 'batch_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        {{-- <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('သင်တန်းအပတ်စဥ်') }}
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between px-3">
                                <h5 class="card-title">{{ __('Batch List') }}</h5>
                                <button type="button" class="btn btn-primary btn-round" id="create_btn" data-toggle="modal"
                                    data-target="#create_batch_modal">Create</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tbl_batch" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight">Sr No</th>
                                        <th class="bold-font-weight">Action</th>
                                        <th class="bold-font-weight">Batch Name</th>
                                        <th class="bold-font-weight">Batch Number</th>
                                        <th class="bold-font-weight">Course Name</th>
                                        <th class="bold-font-weight">Batch Start Date</th>
                                        <th class="bold-font-weight">Batch End Date</th>
                                        <th class="bold-font-weight">Application Accept Start Date</th>
                                        <th class="bold-font-weight">Application Accept End Date</th>
                                        <th class="bold-font-weight">MAC Registration Start Date</th>
                                        <th class="bold-font-weight">MAC Registration End Date</th>
                                        <th class="bold-font-weight">Self Registration Start Date</th>
                                        <th class="bold-font-weight">Self Registration End Date</th>
                                        <th class="bold-font-weight">Private Registration Start Date</th>
                                        <th class="bold-font-weight">Private Registration Endt Date</th>
                                        <th class="bold-font-weight">Exam Registration Start Date</th>
                                        <th class="bold-font-weight">Exam Registration End Date</th>
                                        <th class="bold-font-weight">Entrance Exam Form Start Date</th>
                                        <th class="bold-font-weight">Entrance Exam Form End Date</th>

                                    </tr>

                                </thead>
                                <tbody id="tbl_batch_body" class="hoverTable text-left">

                                </tbody>
                            </table>
                            {{--

                                <div class="row">
                                   <div class="col-md-12">
                                       <div class="card">
                                           <div class="card-header">
                                               <div class="row">
                                                   <div class="col-md-12 text-center">
                                                       <!-- <form method="post" enctype="multipart/form-data"> -->
                                                       <div class="row">
                                                           <div class="col-md-5">
                                                               <div class="row">
                                                                   <div class="col-md-1"></div>
                                                                   <div class="col-md-4 text-left"
                                                                       style="padding-left:0px;font;font-weight:bold;">Batch
                                                                       Number</div>
                                                                   <div class="col-md-7"
                                                                       style="padding-right:0px;padding-left:0px;">
                                                                       <input type="text" name="filter_by_name"
                                                                           class="form-control filter_by_name"
                                                                           placeholder="Batch Number">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-5">
                                                               <div class="row">
                                                                   <div class="col-md-1"></div>
                                                                   <div class="col-md-4 text-left"
                                                                       style="padding-left:0px;font;font-weight:bold;">Course
                                                                       Name</div>
                                                                   <div class="col-md-7"
                                                                       style="padding-right:0px;padding-left:0px;">
                                                                       <select class="form-control form-select"
                                                                           name="course_id" id="filter_course_id"
                                                                           style="width: 100%;" required>
                                                                           <option value="all" selected>All</option>
                                                                       </select>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div><br />
                                                       <div class="row">
                                                           <div class="col-md-5">
                                                               <div class="row">
                                                                   <div class="col-md-1"></div>
                                                                   <div class="col-md-4 text-left"
                                                                       style="padding-left:0px;font;font-weight:bold;">Batch
                                                                       Start Date</div>
                                                                   <div class="col-md-7"
                                                                       style="padding-right:0px;padding-left:0px;">
                                                                       <input type="text" name="filter_by_start_date"
                                                                           class="form-control" placeholder="DD-MMM-YYYY">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-5">
                                                               <div class="row">
                                                                   <div class="col-md-1"></div>
                                                                   <div class="col-md-4 text-left"
                                                                       style="padding-left:0px;font;font-weight:bold;">Batch
                                                                       End Date</div>
                                                                   <div class="col-md-7"
                                                                       style="padding-right:0px;padding-left:0px;">
                                                                       <input type="text" name="filter_by_end_date"
                                                                           class="form-control" placeholder="DD-MMM-YYYY">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="col-md-2" style="vertical-align: top;">
                                                               <button type="button" class="btn btn-primary btn-round m-0"
                                                                   id="search">Search</button>
                                                           </div>
                                                       </div>
                                                       <!-- </form> -->
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="card-body">
                                               <hr size="5" width="95%" color="#F5F5F5">
                                               
                                           </div>
                                       </div>
                                   </div>
                               </div> 
                            --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_batch_modal">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form id="batch_form" method="post" action="javascript:createBatch();" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <input type="hidden" name="batch_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Batch</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('1.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Batch Name" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('2.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch Name(မြန်မာ)') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="name_mm" class="form-control" placeholder="Batch Name(မြန်မာ)" autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('3.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch Number') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="number" name="number" class="form-control" placeholder="Batch Number"
                                        autocomplete="off" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Name') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <select class="form-control form-select" name="course_id" id="selected_course_id"
                                        style="width: 100%;" required onchange="checkCpaOne(value)">
                                        <option value="" disabled selected>Select Course</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="start_date" class="form-control" placeholder="DD-MMM-YYYY">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Batch End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('7.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Application Accept Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="app_acc_start_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('8.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Application Accept End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="app_acc_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('9.') }}</label>
                            <label class="col-md-4 form-label">{{ __('MAC Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="mac_reg_start_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('10.') }}</label>
                            <label class="col-md-4 form-label">{{ __('MAC Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="mac_reg_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('11.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Self Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="self_reg_start_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('12.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Self Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="self_reg_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('13.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Private Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="private_reg_start_date" class="form-control"
                                        autocomplete="off" placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('14.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Private Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="private_reg_end_date" class="form-control"
                                        autocomplete="off" placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('15.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_start_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('16.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" name="exam_end_date" class="form-control" autocomplete="off"
                                        placeholder="DD-MMM-YYYY" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" value="1" name="moodle_course_id" class="form-control" autocomplete="off">

                        <input type="hidden" value="1" name="publish_status" class="form-control" autocomplete="off">

                        <div id="entrance_pass" style="display:none;">
                            <div class="row">
                                <label class="col-md-1 form-label">{{ __('17.') }}</label>
                                <label class="col-md-4 form-label">{{ __('Entrance Exam Form Start Date') }}</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="entrance_pass_start_date" class="form-control"
                                            autocomplete="off" placeholder="DD-MMM-YYYY">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 form-label">{{ __('18.') }}</label>
                                <label class="col-md-4 form-label">{{ __('Entrance Exam Formx End Date') }}</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" name="entrance_pass_end_date" class="form-control"
                                            autocomplete="off" placeholder="DD-MMM-YYYY">
                                    </div>
                                </div>
                            </div>
                        </div>  

                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary" form="batch_form">Save</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>


    <div class="modal fade" id="create_exam_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="exam_form" method="post" action="javascript:createExam();" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <input type="hidden" name="batch_id" id="batch_id">
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
    <script>


    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("input[name='start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            // $("input[name='start_date']").flatpickr({
            //         enableTime: false,
            //         dateFormat: "d-M-Y",
            //         allowInput: true,
            // });
            $("input[name='end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='mac_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='mac_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='self_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='self_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='private_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='private_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='app_acc_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='app_acc_end_date']").flatpickr({

                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            // $("input[name='acc_app_end_date']").flatpickr({
            //         enableTime: false,
            //         dateFormat: "Y-m-d",
            // });
            $("input[name='entrance_pass_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='entrance_pass_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
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
            $("input[name='filter_by_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });
            $("input[name='filter_by_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-M-Y",
                allowInput: true,
            });

            window.onclick = function(event) {
                if (event.target == document.getElementById("create_btn")) {
                    document.getElementById("batch_form").reset();
                }
            }
        });
        var table = $('#tbl_batch').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            searching: false,
            paging: true,
            ajax: {
                url: BACKEND_URL + "/filter_batch",
                type: "POST",
                data: function(d) {
                    d.name = "",
                        d.course_name = "all",
                        d.start_date = "",
                        d.end_date = ""
                }
            },
            columns: [

                {
                    data: "id",
                    name: 'No'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'course.name',
                    name: 'course.name'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'accept_application_start_date',
                    name: 'accept_application_start_date'
                },
                {
                    data: 'accept_application_end_date',
                    name: 'accept_application_end_date'
                },
                {
                    data: 'mac_reg_start_date',
                    name: 'mac_reg_start_date'
                },
                {
                    data: 'mac_reg_end_date',
                    name: 'mac_reg_end_date'
                },
                {
                    data: 'self_reg_start_date',
                    name: 'self_reg_start_date'
                },
                {
                    data: 'self_reg_end_date',
                    name: 'self_reg_end_date'
                },
                {
                    data: 'private_reg_start_date',
                    name: 'private_reg_start_date'
                },
                {
                    data: 'private_reg_end_date',
                    name: 'private_reg_end_date'
                },
                {
                    data: 'exam_start_date',
                    name: 'exam_start_date'
                },
                {
                    data: 'exam_end_date',
                    name: 'exam_end_date'
                },
                {
                    data: 'entry_start_date',
                    name: 'entry_start_date'
                },
                {
                    data: 'entry_end_date',
                    name: 'entry_end_date'
                },
            ],
        });
        

        $("#search").click(function() {

            table.draw();
        });

        // function searchBatch(){

        //     table.draw();
        // }

        loadCourse();
        // getBatch();
        // loadCourseToFilter();
    </script>
@endpush
