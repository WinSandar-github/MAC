@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'batch'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('update_batch') }}
            </div>
        </div>
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
                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းအပတ်စဥ်အမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="batch_name" value="{{ $batch->batch_name }}" class="form-control" placeholder="သင်တန်းအပတ်စဥ်အမည်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="training_class" id="training_class" style="height : 50px" class="form-control">
                                            @foreach($training_classes as $training_class)
                                                <option value="{{ $training_class['id'] }}" {{ $training_class->id == $batch->training_id ? 'selected' : '' }} height="30">{{ $training_class['training_name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('မှ') }}</label>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="from" placeholder="DD-MM-YYYY" value="{{ $batch->from }}" class="from" required>
                                    </div>
                                </div>
                                <label class="col-md-1 col-form-label">{{ __('သို့') }}</label>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="to" placeholder="DD-MM-YYYY" value="{{ $batch->to }}" class="from" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အတန်း') }}</label>
                                <div class="col-md-8 d-flex">
                                    <input type="hidden" value="{{ $batch->class_id }}" class="class_id">
                                    @foreach ($classes as $class)
                                        <div class="form-check-inline float-left">
                                            <input type="checkbox" class="form-check-input float-left" name="class[]" value="{{ $class->id }}" @php 
                                                foreach (json_decode($batch->class_id) as $c){
                                                    if ($c == $class->id){
                                                        echo "checked";
                                                        }
                                                    else
                                                        {
                                                            echo "";
                                                        }
                                                    }
                                                @endphp/>
                                            <label class="form-check-label" for="inlineCheckbox2">
                                                {{ $class->class_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('သိမ်းမည်') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function(){
            $id = $('.class_id').val();
            $array = JSON.parse($id);
            $.each($array,function($index){
                console.log($index);
            })
        });
    </script>
    @endpush
@endsection
