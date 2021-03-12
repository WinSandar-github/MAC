@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'batch'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ route('batch_update.update', $batch['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Update Batch') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းအပတ်စဥ်ခုနှစ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="year" class="form-control" placeholder="သင်တန်းအပတ်စဥ်ခုနှစ်" value="{{ $batch['year'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဖော်ပြချက်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="ဖော်ပြချက်" >{{ $batch['description'] }}</textarea>
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
