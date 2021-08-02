@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mark_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">   
                   
            </div>
        </div>       

        <div class="row">
            <div class="col-md-12 text-center">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Basic Info
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Student Name') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span>{{ $mark->student_info->name_eng }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Student Info ID') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span>{{ $mark->student_info_id }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-md-2 form-label"></label>
                                                <label class="col-md-3 form-label text-left">{{ __('Registeration ID') }}</label>
                                                <label class="col-md-1 form-label"></label>
                                                <div class="col-md-5 text-left">
                                                    <div class="form-group">
                                                        <span>{{ $mark->registeration_id }}</span>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <input type="hidden" name="batch_id">
                                            <h5 style="font-weight:bold" align="center">အမှတ်ပေးရန်ဖြည့်သွင်းပါ</h3>
                                            <div class="row">
                                                <table class="table mark table-bordered input-table" width="100%" style="margin: 3% 3% 0 3%;">
                                                    <tr>
                                                        <th width="40%">Subject Name</th>
                                                        <th width="30%">အမှတ်ပေးရန်</th>
                                                        <th width="20%">Grade</th>
                                                    </tr>
                                                    <tr>
                                                        <td width="40%">
                                                            @foreach($result['subject_name'] as $key => $sn)
                                                            {!! Form::text('subject_name[]', $sn, ['class' => 'form-control']) !!}
                                                            @endforeach
                                                        </td>
                                                        <td width="30%">
                                                            @foreach($result['mark'] as $key => $m)
                                                            {!! Form::text('mark[]', $m, ['class' => 'form-control']) !!}
                                                            @endforeach
                                                        </td>
                                                        <td width="20%">
                                                            @foreach($result['grade'] as $key => $g)
                                                            {!! Form::text('grade[]', $g, ['class' => 'form-control']) !!}
                                                            @endforeach
                                                        </td> 
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>  
                                        <div class="card-footer"> 
                                            <div class="modal-footer">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
