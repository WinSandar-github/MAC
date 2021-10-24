@extends('reporting.main')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center m-3" style="font-weight:bold">
                                {{ $data['title'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        
                    <div class="col-md-12">
                            <table width="100%" id="tbl_application" class="table table-hover text-nowrap ">
                                <thead>
                                <tr>
                                    @foreach($data['fields'] as $col)
                                        <th>{{$col}}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable">

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


@endsection

