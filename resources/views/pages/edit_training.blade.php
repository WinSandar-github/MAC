@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'training'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ route('training_update.update', $training_class['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Update Training Classes') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်ကြားပေးသောသင်တန်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="training_name" class="form-control" placeholder="သင်ကြားပေးသောသင်တန်းအမည်" value="{{ $training_class['training_name'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်ကြားပေးသောသင်တန်းအမည်(Englishဘာသာဖြင့်)') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="training_name_eng" class="form-control" placeholder="သင်ကြားပေးသောသင်တန်းအမည်(Englishဘာသာဖြင့်)" value="{{ $training_class['training_name_eng'] }}" required>
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
            </div>
        </div>
    </div>

@endsection
