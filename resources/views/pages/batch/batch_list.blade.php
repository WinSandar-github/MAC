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
                                <div class="col-md-4 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_batch_modal">Create</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbl_batch" class="table table-hover text-nowrap ">
                                                <thead >
                                                    <tr>
                                                        <th class="bold-font-weight" >Sr No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Course</th>                                        
                                                        <th class="bold-font-weight">Start Date</th>
                                                        <th class="bold-font-weight">End Date</th>   
                                                        <th class="bold-font-weight">MAC Registration Start Date</th>
                                                        <th class="bold-font-weight">MAC Registration End Date</th>  
                                                        <th class="bold-font-weight">Self Registration Start Date</th>
                                                        <th class="bold-font-weight">Self Registration End Date</th>  
                                                        <th class="bold-font-weight">Private Registration Start Date</th>
                                                        <th class="bold-font-weight">Private Registration Endt Date</th>                                                       
                                                        <th class="bold-font-weight">Accept Application Date</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody id="tbl_batch_body" class="hoverTable">
                                                    
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
    <div class="modal fade" id="create_batch_modal" style="padding-top:150px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <form id="batch_form" method="post" action="javascript:createBatch();" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <input type="hidden"  name="batch_id" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Batch</h5>
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
                                <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('2.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Course') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <select class="form-control form-select" name="course_id" id="selected_course_id" style="width: 100%;">
                                    <option value="" disabled selected>Select Course</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('3.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Start Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="start_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('4.') }}</label>
                        <label class="col-md-4 form-label">{{ __('End Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="end_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('5.') }}</label>
                        <label class="col-md-4 form-label">{{ __('MAC Registration Start Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="mac_reg_start_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('6.') }}</label>
                        <label class="col-md-4 form-label">{{ __('MAC Registration End Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="mac_reg_end_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('7.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Self Registration Start Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="self_reg_start_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('8.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Self Registration End Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="self_reg_end_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('9.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Private Registration Start Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="private_reg_start_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('10.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Private Registration End Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="private_reg_end_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>
                    <input type="hidden"  value="1" name="moodle_course_id" class="form-control"  autocomplete="off">
                                                  
                    <input type="hidden" value="1" name="publish_status" class="form-control" autocomplete="off">
                            
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('11.') }}</label>
                        <label class="col-md-4 form-label">{{ __('Accept Application Date') }}</label>
                        <div class="col-md-7">
                            <div class="form-group">                                
                                <input type="text" name="acc_app_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                            </div>
                        </div>
                    </div>


                    
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" form="batch_form">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>

    loadCourse();
    getBatch();
</script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $("input[name='start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='mac_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='mac_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='self_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='self_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='private_reg_start_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='private_reg_end_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
        $("input[name='acc_app_date']").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d",
        });
    });
</script>
@endpush
