@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'cpa_ff_pa'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('cpa_ff_pa') }}
            </div>
        </div>
        <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            
                        </div>
                        <div class="card-body">
                            <div class="col-md-9">
                                    <nav class="nav flex-column">
                                        <a class="nav-link active" href="{{ route('page.index', 'cpa_ff_pa_form1') }}">Certificate of Certified Public Accountant (Full-Fledged)</a>
                                        <a class="nav-link active" href="{{ route('page.index', 'cpa_ff_pa_form2') }}">Certificate of Professional Account in Public Practice</a>
                                        
                                    </nav>
                            </div>
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
<script type="text/javascript">
    $(document).ready(function (e) {
       $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-before-upload').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

       $("input[name='register_date']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });

        $("input[name='date1']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date2']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date3']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date4']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date5']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });
        $("input[name='date6']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
        });

       
    });
    </script>
    
@endpush
