@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'description_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12"> 
            {{ Breadcrumbs::render('Membership') }}               
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12">
               
                    <div class="card">
                        <div class="card-header">
                        
                                <div class="float-right">
                                    
                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_membership_model">Create</button>
                                </div>
                                <h5 class="card-title">{{ __('Membership List') }}</h5>
                           
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                     
                                    <table  id="tbl_membership" class="table table-hover text-nowrap ">
                                        <thead>
                                            <tr>
                                                <th class="bold-font-weight" >Sr No</th>
                                                <th class="bold-font-weight" >Action</th>
                                                <th class="bold-font-weight" >Name</th>  
                                                <th class="bold-font-weight" >Form Fee</th>   
                                                <th class="bold-font-weight" >Registration Fee</th>
                                                <th class="bold-font-weight" >Yearly Fee</th>
                                                <th class="bold-font-weight" >Renew Fee</th>

                                                <th class="bold-font-weight" >Delayed Fee</th>  
                                                <th class="bold-font-weight">Requirement</th>
                                                <th class="bold-font-weight">Description</th>

                                                       

                                            </tr>
                                            
                                        </thead>
                                        <tbody id="tbl_membership_body">
                                            
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
    <div class="modal fade" id="create_membership_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
            <form id="membership_form" method="post" action="javascript:createMembership();" enctype="multipart/form-data">
                <input type="hidden"  name="membership_id" >
                 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('1.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Membership Name') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="text" name="membership_name" class="form-control" id="ms_name" placeholder="Membership Name Eg.School" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('2.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Form Fee') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="number" name="form_fee" class="form-control" id="form_fee" placeholder="Form Fee" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('3.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Registration Fee') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="number" name="registration_fee" class="form-control" id="registration_fee" placeholder="Registration Fee" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('4.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Yearly Fee') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="number" name="yearly_fee" class="form-control" id="yearly_fee" placeholder="Yearly Fee" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('5.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Renew Fee') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="number" name="renew_fee" class="form-control" id="yearly_fee" placeholder="Yearly Fee" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-1 form-label">{{ __('6.') }}</label>
                        <label class="col-md-2 form-label">{{ __('Delayed Fee') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">                                
                                <input type="number" name="late_fee" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <label class="col-md-1 form-label">{{ __('7.') }}</label>
                            <label class="col-md-2 form-label">{{ __('Requirement') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="requirement_id[]"
                                        class="form-control requirement_id multiple-requirement" multiple="multiple"
                                        required style="width:100%">


                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <label class="col-md-1 form-label">{{ __('8.') }}</label>
                            <label class="col-md-2 form-label">{{ __('Description') }}</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="description_id[]"
                                        class="form-control description_id multiple-requirement" multiple="multiple"
                                        required style="width:100%">


                                </select>
                            </div>
                        </div>
                    </div>
                    
          
 
                    
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" form="membership_form">Save</button>
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
        getMembership();
        var requirement_list;

        $('.multiple-requirement').select2({
                placeholder: "Select Requirement"
            });



        $.ajax({
            url: BACKEND_URL + '/get_requirement_id',
            type: 'GET',
            success: function (response) {
                var opt ; //`<option value="" selected >Select</option>`;
                $.each(response.data, function (i, v) {
                    console.log(typeof v.id)
                    opt += `<option value=${v.id}  >${v.requirement_name}</option>`;
                })
                $(".requirement_id").append(opt);
            }
        });    
        
        $.ajax({
            url: BACKEND_URL + '/descriptions',
            type: 'GET',
            success: function (response) {
                console.log(response)
                let opt ; //`<option value="" selected >Select</option>`;
                $.each(response.data, function (i, v) {
                    opt += `<option value=${v.id}  >${v.description_name}</option>`;
                })
                $(".description_id").append(opt);
            }
        });

        $('#tbl_membership').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: FRONTEND_URL + "/show_membership",
            columns: [
                {data: "id", name: 'No'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
                {data: 'requirement_name', name: 'name'},
                
            ],
    });

// getMembership();
        
    });

  
</script>
@endpush
