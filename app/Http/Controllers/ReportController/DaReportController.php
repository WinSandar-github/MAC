<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Http\Controllers\Controller;
use App\StudentRegister;
use Illuminate\Http\Request;

class DaReportController extends Controller
{
    public function daAttendList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
            ->with('active_batch','course_type')
            ->first();

        $student_registers = StudentRegister::where('form_type', $request->batch)
            ->join('student_infos','student_infos.id','=','student_register.student_info_id')
            ->where('student_register.status',1)
            ->orderBy('student_infos.name_mm','asc')
            ->orderBy('student_register.type','asc')
            ->with('student_info')
            ->select('student_infos.name_mm','student_register.*')
            ->get();

        return view('reporting.application_list',compact('course','student_registers'));
    }

    public function daRegList(Request $request)
    {
        return $request;
    }

    public function daExamRegList(Request $request)
    {
        return $request;
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
