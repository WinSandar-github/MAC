@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'teacher_registration'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('teacher_registration') }}
            </div>
        </div>
        <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-center">{{ __('Teacher Registration Lists') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- <div class="col-md-9">
                                <nav class="nav flex-column">
                                    <a class="nav-link active" href="{{ route('page.index', 'teacher-register-form1') }}">သင်တန်းဆရာ မှတ်ပုံတင်လျှောက်လွှာ</a>
                                    <a class="nav-link active" href="{{ route('page.index', 'teacher-register-form2') }}">သင်တန်းဆရာ မှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ</a>
                                    
                                </nav>
                            </div> -->
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbl_teacher"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Email</th>     
                                                        <th class="bold-font-weight" >Phone Number</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <th class="bold-font-weight" >Status</th>
                                                        <th class="bold-font-weight" >Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_teacher_body" class="hoverTable">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer ">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>

    </div>



    <script>
         var mmnrc_regions = {!! json_encode($nrc_regions) !!};
        // get NRC Townships data from myanmarnrc.php config file
        var mmnrc_townships = {!! json_encode($nrc_townships) !!};
        // get NRC characters data from myanmarnrc.php config file
        var mmnrc_characters = {!! json_encode($nrc_characters) !!};
        // get language data from myanmarnrc.php config file
        var mmnrc_language = "{{ $nrc_language }}";
    </script>
@endsection

@push('scripts')
<script src="{{asset('js/teacher.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
    //    $('#image').change(function(){
    //         let reader = new FileReader();
    //         reader.onload = (e) => { 
    //             $('#preview-image-before-upload').attr('src', e.target.result); 
    //         }
    //         reader.readAsDataURL(this.files[0]); 
    //    });

    //     $("input[name='register_date']").flatpickr({
    //             enableTime: false,
    //             dateFormat: "d-m-Y",
    //     });
    getTeacherRegisterList();
    });
    </script>
    
@endpush
