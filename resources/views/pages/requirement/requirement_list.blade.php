@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'requirement_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12"> 
            {{ Breadcrumbs::render('အရည်အချင်းသတ်မှတ်ချက်') }}               
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
                                    <h5 class="card-title">{{ __('Requirement List') }}</h5>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4 d-md-flex justify-content-md-end">
                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_requirement_model">Create</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-5" style="font-weight:bold;">Name</div>
                                                        <div class="col-md-7">
                                                            <input type="text" name="filter_by_name" class="form-control" placeholder="Name" autocomplete="on">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--<div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-5" style="font-weight:bold;">Course Name</div>
                                                        <div class="col-md-7">
                                                            <select class="form-control form-select" name="course_id" id="filter_course_id" style="width: 100%;">
                                                                <option value="all" selected>All</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>--}}
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary btn-round m-0" onclick="getRequirement()" id="search">Search</button>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="card-body">
                                        <hr size="5" width="95%" color="#F5F5F5"> 
                                            <table id="tbl_requirement"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                        <th class="bold-font-weight" >Sr No</th>
                                                        <th class="bold-font-weight" >Action</th>
                                                        <th class="bold-font-weight" >Name</th>                                                                                                
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
                </form>
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
                        <label class="col-md-1 form-label">{{ __('') }}</label>
                        <label class="col-md-3 form-label">{{ __('Requirement Name') }}</label>
                        <div class="col-md-8">
                            <div class="form-group">                                
                                <input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    
                    
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
    // $(document).ready(function() {
    //     var crateModal = document.getElementById('create_requirement_model');
    //     crateModal.addEventListener('show.bs.modal', function (event) {
    //         var button = event.relatedTarget;       
    //     });


        
    // });

    // loadCourse();
    // loadCourseToFilter();
    getRequirement();
    window.onclick = function(event) {
            if (event.target == document.getElementById("create_btn")) {
                document.getElementById("requirement_form").reset();  
            }
        }
</script>
@endpush
