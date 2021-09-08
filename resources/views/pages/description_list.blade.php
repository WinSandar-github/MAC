@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'description_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12"> 
            {{ Breadcrumbs::render('ဖော်ပြချက်') }}               
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12">
               
                    <div class="card">
                        <div class="card-header">
                        
                                <div class="float-right">
                                    
                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_description_model">Create</button>
                                </div>
                                <h5 class="card-title">{{ __('Description List') }}</h5>
                           
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                     
                                    <table width="100%" id="tbl_description" class="table table-hover text-nowrap ">
                                        <thead>
                                            <tr>
                                                <th class="bold-font-weight" >Sr No</th>
                                                <th class="bold-font-weight" >Name</th>         
                                                <th class="bold-font-weight" >Action</th>
                                                                                                                                                
                                                <!-- <th class="bold-font-weight" >Course Name</th>                                         -->
                                                
                                            </tr>
                                            
                                        </thead>
                                        <tbody id="tbl_description_body">
                                            
                                        </tbody>
                                    </table>             
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_description_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <form id="description_form" method="post" action="javascript:createDescription();" enctype="multipart/form-data">
                <input type="hidden"  name="description_id" >
                 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('1') }}</label>
                        <label class="col-md-2 form-label">{{ __('Course Name') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <textarea name="description_name" class="form-control" id="des_name" placeholder="Name" autocomplete="off"></textarea>
                            </div>
                        </div>
                    </div>
                    
          
 
                    
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" form="description_form">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // var crateModal = document.getElementById('create_requirement_model');
        // crateModal.addEventListener('show.bs.modal', function (event) {
        //     var button = event.relatedTarget;       
        // });

        $('#tbl_description').DataTable({
                scrollX: true,
                processing: true,
                serverSide: true,
                ajax: FRONTEND_URL + "/show_description",
                columns: [
                    {data: "id", name: 'No'},
                    {data: 'description_name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    
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
