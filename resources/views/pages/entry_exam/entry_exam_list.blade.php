@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'entry_exam_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
                {{ Breadcrumbs::render('entry_exam_list') }}
            </div>
        </div>      
    </div>

   


@endsection

@push('scripts')
<script>
</script>
@endpush
