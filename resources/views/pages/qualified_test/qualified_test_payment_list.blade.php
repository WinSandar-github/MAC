@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'qualified_test_payment_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('qualified_test_payment_list') }}
            </div>
        </div> --}}
    </div>




@endsection

@push('scripts')
<script>
</script>
@endpush
