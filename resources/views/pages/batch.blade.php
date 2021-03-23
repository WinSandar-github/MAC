@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'batch'
])

@section('content')
    {{-- <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ route('batch.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Create Batch') }}</h5>
                                </div>
                                <div class="col-md-4" style="padding-left: 70px;">
                                    <button class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('သင်တန်းအပတ်စဥ်ခုနှစ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="year" class="form-control" placeholder="သင်တန်းအပတ်စဥ်ခုနှစ်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဖော်ပြချက်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="ဖော်ပြချက်" ></textarea>
                                    </div>
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
    </div> --}}
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ url('student_record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Batch Lists') }}</h5>
                                </div>
                                <div class="col-md-4" style="padding-left: 175px; margin-top: -10px;">
                                    <a href="{{ route('batch.create') }}" class="btn btn-success">Create</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>စဥ်</th>
                                        <th>သင်တန်းအပတ်စဥ်ခုနှစ်</th>
                                        <th style="width: 600px;">ဖော်ပြချက်</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=0;
                                    @endphp
                                    @foreach($batches as $batch)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $batch['year'] }}</td>
                                            <td>{{ $batch['description'] }}</td>
                                            <td>
                                                <a href="{{ route('batch.edit',$batch['id']) }}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-size" aria-hidden="true"></i></a>
                                                <a href="{{ route('batch_delete.destroy',$batch['id']) }}" class="btn btn-danger"><i class="fa fa-trash fa-size" aria-hidden="true"></i></a>
                                            </td>
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
