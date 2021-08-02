@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'course_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
            {{ Breadcrumbs::render('course_list') }}             
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Course List') }}</h5>
                                </div>
                                <div class="col-md-4 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_course_modal">Create</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
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
                                                        <th class="bold-font-weight" >Registration Start Date</th>
                                                        <th class="bold-font-weight" >Registration End Date</th>
                                                        <th class="bold-font-weight" >Description</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody id="tbl_course_body" class="hoverTable">
                                                    
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
    <div class="modal fade" id="create_course_modal" style="padding-top:150px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('2.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Form Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text"  name="form_fee" class="form-control"  placeholder="Form Fee" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('3.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Registration Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text" name="registration_fee" class="form-control" placeholder="Registration Fee" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('4.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Exam Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text" name="exam_fee" class="form-control" placeholder="Exam Fee" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('5.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Tution Fee') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text" name="tution_fee" class="form-control" placeholder="Tution Fee" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('6.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Registration Start Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text" name="registration_start_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('7.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Registration End Date') }}</label>
                            <div class="col-md-7">
                                <div class="form-group">                                
                                    <input type="text" name="registration_end_date" class="form-control" autocomplete="off" placeholder="yyyy/mm/dd">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('8.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Description') }}</label>
                            <div class="col-md-7">
                                <div class="form-group"> 
                                    <input type="text" name="description" class="form-control"  placeholder="Description" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('9.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Code') }}</label>
                            <div class="col-md-7">
                                <div class="form-group"> 
                                    <input type="text" name="code" class="form-control"  placeholder="Description" autocomplete="off">
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <label class="col-md-1 form-label">{{ __('10.') }}</label>
                            <label class="col-md-4 form-label">{{ __('Course Type') }}</label>
                            <div class="col-md-7">
                                <div class="form-group"> 
                                    <select name="course_type" class="form-control course_type">

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
                 var opt = '<option selected >Select</option>';

                $.each(response.data,function(i,v){
                    opt +=
                        `<option value=${v.id}  >${v.name}</option>`;
                    })
                $(".course_type").append(opt);
            }
        })
        
    });
    getCourse();
</script>
@endpush
