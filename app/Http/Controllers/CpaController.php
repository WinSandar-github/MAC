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
        if ($request->hasfile('deg_certi_img')) {

            $file = $request->file('deg_certi_img');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $deg_certi_img = '/storage/student_info/'.$name;
       
    }else{
        $deg_certi_img = null;
    }

        $course_date = date('Y-m-d');

        $student_info = StudentInfo::find($request->student_id);
        $student_info->approve_reject_status = 0;
        if($request->direct_degree)
        { 
            $student_info->direct_degree                =   $request->direct_degree; 
            $student_info->degree_date                  =   date("Y-m-d",strtotime($request->degree_date));
            $student_info->degree_certificate_image     =   $deg_certi_img;
            $student_info->degree_rank                  =   $request->degree_rank;
        }
        $student_info->save();
         
        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;   
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = $course_date;
        $student_course->type            = $request->type;
        // $student_course->mac_type            = $request->mac_type;
        if($request->type == 2){

            $student_course->mac_type            = $request->mac_type;
        }
        $student_course->status          = 1;
        $student_course->save();
        return $student_info;
    }
}
