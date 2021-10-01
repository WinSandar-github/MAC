@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'training'
])

@section('content')
    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('training') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="card" style="background-color: rgb(186, 224, 241)"> --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Training Class Lists') }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">စဥ်</th>
                                        <th rowspan="2" style="width: 460px;">သင်တန်းအမည်</th>
                                        <th rowspan="2" style="width: 460px;">သင်တန်းအမည်(English ဘာသာဖြင့်)</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=0;
                                    @endphp
                                    @foreach($training_classes as $training_class)
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $training_class['training_name'] }}</td>
                                            <td>{{ $training_class['training_name_eng'] ? $training_class['training_name_eng'] : 'English ဘာသာဖြင့် မရှိပါ'}}</td>
                                            <td>
                                                <a href="{{ route('training.edit',$training_class['id']) }}" class="btn btn-success"><i class="fa fa-pencil-square-o fa-size" aria-hidden="true"></i></a>
                                                {{-- <a href="{{ route('training_delete.delete',$training_class['id']) }}" class="btn btn-danger"><i class="fa fa-trash fa-size" aria-hidden="true"></i></a> --}}
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
    <!-- @if(Session::has('success'))
        <script type="text/javascript" >
            alert("{{ session()->get('success') }}");
        </script>
    @endif -->
    {{-- @if (session('success'))
        <script type="text/javascript">
            $(function(){
                $('#showsuccess').modal('show');
            })
        </script>
        <div class="modal" id="showsuccess">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-success">အောင်မြင်သည်</h4>
                </div>

                <div class="modal-body text-dark">
                {{session('success')}}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ပိတ်မည်</button>
                </div>
            </div>
            </div>
        </div>
    @endif --}}

@endsection
