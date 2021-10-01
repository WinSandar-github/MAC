@php
	$nrc_language = config('myanmarnrc.language');
	$nrc_regions = config('myanmarnrc.regions_states');
	$nrc_townships = config('myanmarnrc.townships');
	$nrc_citizens = config('myanmarnrc.citizens');
	$nrc_characters = config('myanmarnrc.characters');
@endphp

@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'registered_user_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="{{ url('student_record') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Registered User Lists') }}</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>စဥ်</th>
                                        <th style="width: 220px;">အမည်</th>
                                        <th style="width: 340px;">နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th>Force</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($register_lists as $register_list)
                                        <tr>
                                            <td>{{ $register_list['id'] }}</td>
                                            <td>{{ $register_list['name'] }}</td>
                                            <td>{{ $register_list['nrc_state_region'].'/'.$register_list['nrc_township'].'('.$register_list['nrc_citizen'].')'.$register_list['nrc_number'] }}</td>
                                            <td>
                                                <select name="" id="" style="width: 70px; height: 30px;">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('registered_user_list.show',$register_list['id']) }}" class="btn btn-success" type="submit"><i class="fa fa-pencil-square-o fa-size" aria-hidden="true"></i></a>
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
    <script>
        // get NRC Townships data from myanmarnrc.php config file
        var mmnrc_regions = {!! json_encode($nrc_regions) !!};
        // get NRC Townships data from myanmarnrc.php config file
        var mmnrc_townships = {!! json_encode($nrc_townships) !!};
        // get NRC characters data from myanmarnrc.php config file
        var mmnrc_characters = {!! json_encode($nrc_characters) !!};
        // get language data from myanmarnrc.php config file
        var mmnrc_language = "{{ $nrc_language }}";
    </script>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            var counter = 0;

                $("#student_add").on("click", function () {
                      // alert('hello world');
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td class="border-color"><input type="text" class="form-control" name="education[] placeholder="ပညာအရည်အချင်း"/></td>';
                    cols += '<td class="border-color"><input type="button" class="student_delete btn btn-sm btn-danger "  value="X"></td>';
                    newRow.append(cols);
                    $("table.student_profile").append(newRow);
                    counter++;
                });



                $("table.student_profile").on("click", ".student_delete", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });
            });
    </script>
@endpush
