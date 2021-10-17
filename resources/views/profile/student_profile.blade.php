@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'da_one_app_list'
])
@section('content')
    <div class="content">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="title">Student Info</h5>
                        </div>

                        {{--Student Info--}}
                        <div class="card-body">
                            <div class="text-center">
                                <a href="#">
                                    <img class="avatar border-gray"
                                         src="{{ asset( $student->image ?? 'assets/images/blank-profile-picture-2.png') }}" alt="...">
                                </a>
                            </div>
                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Name/အမည်</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->name_eng }} / {{ $student->name_mm }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Email</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->email }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Phone</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->phone }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">NRC Number</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->nrc_state_region . "/" . $student->nrc_township . '(' . $student->nrc_citizen . ')' . $student->nrc_number }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">NRC Image</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <a href="{{ asset($student->nrc_front) }}">NCR Front Side</a>
                                    <a href="{{ asset($student->nrc_back) }}">NCR Back Side</a>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Father Name/အဘအမည်</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->father_name_eng . " / " . $student->father_name_mm }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Race</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->race }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Religion</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->religion }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Date of Birth</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->date_of_birth }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Current Address</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->current_address }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Address</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->address }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Personal Code</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->personal_no ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">အစိုးရဝန်ထမ်းဟုတ်/မဟုတ်</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->gov_staff == 0 ? 'မဟုတ်' : 'ဟုတ်' }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">သက်ဆိုင်ရာဌာနအကြီးအကဲ၏ထောက်ခံစာ</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    @if($student->recommend_letter != null)
                                        <a href="{{ $student->recommend_letter }}">View Recommended Letter</a>
                                    @else
                                        <a href="#">File Not Found</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Student Job Info--}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Job Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Job Name</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->name }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Job Position</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->position }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Department</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->department }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Organization</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->organization }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Company Name</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->company_name }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Salary</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->salary }}</span>
                                </div>
                            </div>

                            <div class="row m-2 mt-3 border-bottom">
                                <div class="col-md-6 text-left">
                                    <p class="ml-2" style="font-weight:bold">Office Address</p>
                                </div>
                                <div class="col-md-6 text-left">
                                    <span>{{ $student->student_job->office_address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">

                    {{--Course Info--}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Course Info</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Attend Place</td>
                                    <td>Course</td>
                                    <td>Batch</td>
                                    <td>Grade</td>
                                    <td>Status</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($student->student_course_regs as $key=>$history)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <?php
                                            if($history->type !== null){
                                                if($history->type === 0){
                                                    echo '<td>Self Study</td>';
                                                }else if($history->type === 1){
                                                    echo '<td>Private School</td>';
                                                }else if( $history->type === 2){
                                                    echo '<td>MAC</td>';
                                                }else{
                                                    echo '<td>-</td>';
                                                }
                                            }else{
                                                echo '<td>N/A</td>';
                                            }
                                        ?>
                                        <td>{{ $history->batch->course->name_mm }}</td>
                                        <td>{{ $history->batch->name_mm }}</td>
                                        <td>"A"</td>
                                        <td>Pass/Fail</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--Apprentice Accountant Info--}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Apprentice Accountant (if exist) Info</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                <tr>
                                    <td>No</td>
                                    <td>Attend Place</td>
                                    <td>Course</td>
                                    <td>Batch</td>
                                    <td>Grade</td>
                                    <td>Status</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($student->student_course_regs !== null)
                                    @foreach($student->student_course_regs as $key=>$history)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <?php
                                            if($history->type !== null){
                                                if($history->type === 0){
                                                    echo '<td>Self Study</td>';
                                                }else if($history->type === 1){
                                                    echo '<td>Private School</td>';
                                                }else if( $history->type === 2){
                                                    echo '<td>MAC</td>';
                                                }else{
                                                    echo '<td>-</td>';
                                                }
                                            }else{
                                                echo '<td>N/A</td>';
                                            }
                                            ?>
                                            <td>{{ $history->batch->course->name_mm }}</td>
                                            <td>{{ $history->batch->name_mm }}</td>
                                            <td>"A"</td>
                                            <td>Pass/Fail</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Data</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--Membership Info--}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Membership (if exist) Info</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                <tr>
                                    <td>No</td>
                                    <td>Attend Place</td>
                                    <td>Course</td>
                                    <td>Batch</td>
                                    <td>Grade</td>
                                    <td>Status</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if($student->student_course_regs !== null)
                                @foreach($student->student_course_regs as $key=>$history)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <?php
                                        if($history->type !== null){
                                            if($history->type === 0){
                                                echo '<td>Self Study</td>';
                                            }else if($history->type === 1){
                                                echo '<td>Private School</td>';
                                            }else if( $history->type === 2){
                                                echo '<td>MAC</td>';
                                            }else{
                                                echo '<td>-</td>';
                                            }
                                        }else{
                                            echo '<td>N/A</td>';
                                        }
                                        ?>
                                        <td>{{ $history->batch->course->name_mm }}</td>
                                        <td>{{ $history->batch->name_mm }}</td>
                                        <td>"A"</td>
                                        <td>Pass/Fail</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Data</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 600px !important">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">မှတ်ချက်</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="remark-form" method="post" action="javascript:rejectUser()" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                    <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" form="remark-form">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    {{--    <script>--}}
    {{--        loadData();--}}
    {{--    </script>--}}
@endpush
