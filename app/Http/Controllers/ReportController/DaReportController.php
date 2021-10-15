<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Batch;

use App\ExamRegister;
use App\Http\Controllers\Controller;
use App\StudentRegister;
use App\StudentCourseReg;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DaReportController extends Controller
{
    public function daAttendList(Request $request)
    {
        if($request->course != '' && $request->batch != ""){
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

            $data = [
                'title' => 'This is a title',
                'filter' => ['mac', 'self study', 'private school'], // 0 self, 1 private, 2 mac
                'batch' => $batch,
                'course' => $course,
                'student' => $student_registers->groupBy('type'),
            ];

            /*return view('reporting.application_list',compact('batch','course','student_registers'));*/
            return view('reporting.application_list', compact('data'));
        }
    }

    public function daRegList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
                ->with('active_batch','course_type')
                ->first();

        $batch = Batch::where('id','=',$request->batch)->first();


        $student_registers = StudentRegister::where('batch_id', $request->batch)
                ->join('student_infos','student_infos.id','=','student_register.student_info_id')
                ->join('modules', 'modules.id', '=', 'student_register.module')
                ->where('student_register.status',1)
                ->orderBy('student_register.type','desc')
                ->orderBy('student_infos.name_mm','asc')
                ->with('student_info')
                ->select('student_infos.name_mm','student_register.*', 'modules.name as module_name')
                ->get();

        $data = [
            'title' => 'This is a title',
            'filter' => ['module one', 'module two', 'all module'], // 1 module one, 2 module two, 3 all module
            'batch' => $batch,
            'course' => $course,
            'student' => $student_registers->groupBy('module'),
        ];

        return view('reporting.registration_list',compact('data'));
    }

    public function daExamRegList(Request $request)
    {
        $current_course = Course::where('id',$request->course)->with('active_batch')->first();

        return $student_infos = ExamRegister::where('batch_id',$request->batch)
            ->join('student_infos', 'student_infos.id', '=', 'exam_register.student_info_id')
            ->where('exam_type_id','!=',3)
            ->where('status',1)
            ->with('student_info')
            ->select('exam_register.*')
            ->get();

        $student_infos = $current_course->course_type->course_code == "da"
            ? $student_infos->orderByRaw('LENGTH(student_infos.personal_no)','ASC')->orderBy('student_infos.personal_no','ASC')
            : $student_infos->orderByRaw('LENGTH(student_infos.cpersonal_no)','ASC')->orderBy('student_infos.cpersonal_no','ASC');

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
