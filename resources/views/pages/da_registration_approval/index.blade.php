@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'index'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
                   
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio" value="1" name="register_name" onclick="selectedRegistration()"> <label class='form-check-label'> Registration Self Study</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" value="2" name="register_name" onclick="selectedRegistration()"> <label class='form-check-label'> Registration Private Shool</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="radio" value="3" name="register_name" onclick="selectedRegistration()"> <label class='form-check-label'> Registration Mac</label>
                                                </div>
                                            </div>
                                            <div class="row" id="self_study_container">
                                                <table id="tbl_student"class="table text-nowrap ">
                                                    <thead>
                                                        <tr>
                                                            <th class="less-font-weight" >Sr No</th>
                                                            <th class="less-font-weight" >Name</th>
                                                            <th class="less-font-weight" >Email</th>                                        
                                                            <th class="less-font-weight" >Registration No</th>
                                                            <th class="less-font-weight" >Phone</th>
                                                            
                                                            <th class="less-font-weight" >Action</th>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody id="tbl_student_body">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
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

   


@endsection

@push('scripts')
<script>
    getStudent();
</script>
@endpush
