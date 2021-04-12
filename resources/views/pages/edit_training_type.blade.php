@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'training_type'
])

@section('content')
    <div class="content">
        <div class="row">
<<<<<<< HEAD
            <div class="col-md-12">
                {{ Breadcrumbs::render('edit_training_type') }}
            </div>
        </div>
        <div class="row">
=======
>>>>>>> 956e7043820bb1df64b9c363d9517b368351031e
            <div class="col-md-12 text-center">
                @foreach ($training_type as $training)
                    <form action="{{ route('training_type.update' , $training->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ __('Update Training Types') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                    <label class="col-md-2 col-form-label">{{ __('သင်တန်းအမျိုးအစား') }}</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="training_type_name" class="form-control" placeholder="သင်တန်းအမျိုးအစား" value="{{ $training->training_type_name }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-info btn-round">{{ __('ပြင်မည်') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

@endsection
