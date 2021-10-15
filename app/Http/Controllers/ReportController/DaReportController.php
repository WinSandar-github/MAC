<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Batch;

use App\Http\Controllers\Controller;
use App\StudentRegister;
use App\StudentCourseReg;

use Illuminate\Http\Request;

class DaReportController extends Controller
{
    public function daAttendList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
            ->with('active_batch','course_type')
            ->first();

        $batch = Batch::where('id','=',$request->batch)->first();    

        $student_registers = StudentCourseReg::where('batch_id', $request->batch)
            ->join('student_infos','student_infos.id','=','student_course_regs.student_info_id')
            ->where('student_course_regs.approve_reject_status',1)
            ->orderBy('student_course_regs.type','asc')
            ->orderBy('student_infos.name_mm','asc')
            ->with('student_info')
            ->select('student_infos.name_mm','student_course_regs.*')
            ->get();

        return view('reporting.application_list',compact('batch','course','student_registers'));
    }

    public function daRegList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
        ->with('active_batch','course_type')
        ->first();

        $batch = Batch::where('id','=',$request->batch)->first();    

        
        $student_registers = StudentRegister::where('batch_id', $request->batch)
        ->join('student_infos','student_infos.id','=','student_register.student_info_id')
        ->where('student_register.status',1)
        ->orderBy('student_register.type','desc')
        ->orderBy('student_infos.name_mm','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','student_register.*')
        ->get();

    return view('reporting.registration_list',compact('course','batch','student_registers'));
    }

    public function daExamRegList(Request $request)
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.exam_list',compact('course'));
    }

    public function daPassList(Request $request)
    {
        return $request;
    }

    public function da_report5()
    {
        return view('reporting.da.da_report5');
    }

    public function da_report6()
    {
        return view('reporting.da.da_report6');
    }

    public function da_report7()
    {
        return view('reporting.da.da_report7');
    }

    public function da_report8()
    {
        return view('reporting.da.da_report8');
    }

    public function da_report9()
    {
        return view('reporting.da.da_report9');
    }
}
