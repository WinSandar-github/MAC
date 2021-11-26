<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EducationLevel;
use App\StudentCourseReg;
use App\StudentInfo;
use App\Invoice;
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
        if($request->da_pass_roll_number){
            $student_info->da_pass_date                 =   $request->da_pass_date;
            $student_info->da_pass_roll_number          =   $request->da_pass_roll_number;
        }
        
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
        if($request->type == 2){

            $student_course->mac_type            = $request->mac_type;
        }
        $student_course->status          = 0;
        $student_course->save();

        //invoice        
        $invoice = new Invoice();
        $invoice->student_info_id = $student_info->id;

        // $invNo = str_pad( date('Ymd') . Str::upper(Str::random(5)) . $student_info->id, 20, "0", STR_PAD_LEFT);
        // $invoice->invoiceNo       = $invNo;

        
        $invoice->name_eng        = $student_info->name_eng;
        $invoice->email           = $student_info->email;
        $invoice->phone           = $student_info->phone;
        
        $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->latest()->first();

        $invoice->invoiceNo = 'cpa_app_'.$student_course->id;
        $invoice->productDesc     = 'App Fee,' . $std->batch->course->name;
        $invoice->amount          = $std->batch->course->form_fee ;
        $invoice->status          = 0;
        $invoice->save();
        return $student_info;
    }
}
