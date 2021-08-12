<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentCourseReg;
use App\StudentInfo;

class DATwoController extends Controller
{
    public function store(Request $request)
    {

        $course_date = date('Y-m-d');

        $student_info = StudentInfo::find($request->student_id);
        $student_info->approve_reject_status = 0;
        $student_info->save();
         
        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;   
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->status          = 1;
        $student_course->save();

        return $student_info;
    }
}
