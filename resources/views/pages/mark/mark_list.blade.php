@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'mark_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mark_list') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form action="" method="get" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 class="title" style="padding-left: 330px;">{{ __('Student List') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbl_exam_result"class="table table-hover text-nowrap ">
                                                <thead>
                                                    <tr>
                                                      <th class="less-font-weight" >No</th>
                                                      <th class="less-font-weight" >Action</th>
                                                      <th class="less-font-weight" >Student Name</th>
                                                      <th class="less-font-weight" >Student Info ID</th>
                                                      <th class="less-font-weight" >Registeration ID</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php $index = 1; ?>
                                                	@foreach($marks as $mark)
                                                	    <tr>
                                                	        <td>{{ $index++ }}</td>
                                                            <td>
                                                                <a href="{{ url("/mark/$mark->id") }}"
                                                                class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                                                	        </td>
                                                	        <td>{!! $mark->student_info->name_eng !!}</td>
                                                	        <td>{!! $mark->student_info_id !!}</td>
                                                	        <td>{!! $mark->registeration_id !!}</td>

                                                	    </tr>
                                                	@endforeach
                                                </tbody>
                                            </table>
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
