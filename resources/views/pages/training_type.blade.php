@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'training_type'
])

@section('content')
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('training_type') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="card" style="background-color: rgb(186, 224, 241)"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Training Type Lists') }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">စဥ်</th>
                                        <th rowspan="2" style="width: 460px;">သင်တန်းအမျိူးအစားအမျိူးအစား</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($training_types as $training_type)
                                        <tr>
                                            <td>{{ $training_type->id }}</td>
                                            <td>{{ $training_type->training_type_name }}</td>
                                            <td><a href="{{ route('training_type.edit',$training_type->id) }}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-size" aria-hidden="true"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
