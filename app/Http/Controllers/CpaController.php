<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EducationLevel;
use App\StudentCourseReg;
use App\StudentInfo;

class CpaController extends Controller
{
    public function cpa_ff_registration(){
           return view('pages.cpa.cpa_ff_registration');
    }

    public function cpa_ff_registration_form1()
    {
       $education_level = EducationLevel::all();  
       return view('pages.cpa.cpa_ff_register_form1',compact('education_level'));
    }

    public function store_da_cpa_app_form(Request $request)
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
