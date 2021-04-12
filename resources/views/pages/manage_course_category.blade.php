@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'administraion'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('course-category') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                </div>
            </div>
        </div>
    </div>
@endsection

