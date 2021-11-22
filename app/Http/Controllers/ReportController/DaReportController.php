<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Batch;
use App\ExamDepartment;
use App\Module;


use App\ExamRegister;
use App\Http\Controllers\Controller;
use App\StudentRegister;
use App\StudentCourseReg;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DaReportController extends Controller
{
    public function daAttendList(Request $request, $type)
    {
        if($request->course != '' && $request->batch != "" && $type != ""){

            $course = Course::where('id', '=', $request->course)
                ->with('active_batch','course_type')
                ->first();

            $batch = Batch::where('id','=',$request->batch)->first();
             
            $student_registers = StudentCourseReg::where('student_course_regs.batch_id', $request->batch)
                ->when($type !== 'all', function($query) use($type){
                    $query->where('type', '=', $type);
                })
                ->join('student_infos','student_infos.id','=','student_course_regs.student_info_id')
                ->where('student_course_regs.approve_reject_status',1)
                ->where('student_course_regs.qt_entry',0)
                ->orderBy('student_course_regs.type','asc')
                ->orderBy('student_course_regs.mac_type','asc')
                ->orderBy('student_infos.name_mm','asc')

                ->with('student_info')
                ->select('student_infos.name_mm','student_course_regs.*')
                ->get();

            if($type == 'all'){
                $title = $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>တက်ရောက်ခွင့်ရသူများစာရင်း";
            }else{
                $title = $type == 0 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ"
                            : ( $type == 1 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းများတွင် တက်ရောက်ခွင့်ရသူများ" 
                                            : $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>မြန်မာနိုင်ငံစာရင်းကောင်စီတွင်တက်ရောက်ခွင့်ရသူများ");
            }

            if($type == 2){
               
                $filter = ['ရန်ကုန်သင်တန်းကျောင်း', 'နေပြည်တော်သင်တန်းကျောင်း'];
                $student_registers = $student_registers->groupBy(['type', 'mac_type']);
                
              ;
            }else{
                // $filter = ['mac', 'self study', 'private school']; // 0 self, 1 private, 2 mac
                $filter = [];
                $student_registers = $student_registers->groupBy(['type']);
            }
 
            $data = [
                'title' => $title,
                'filter' => $filter,
                'batch' => $batch,
                'course' => $course,
                'student' => $student_registers,
            ];
            return $student_registers;

            /*return view('reporting.application_list',compact('batch','course','student_registers'));*/
            return view('reporting.application_list', compact('data'));
        }
    }

    public function daRegList(Request $request, $type)
    {
        
        $course = Course::where('id', '=', $request->course)
                ->with('active_batch','course_type')
                ->first();

        $batch = Batch::where('id','=',$request->batch)->first();
         
        $student_registers = StudentRegister::where('batch_id', $request->batch)
                ->when($type !== 'all', function($query) use($type){
                    $query->where('type', '=', $type);
                })
                ->join('student_infos','student_infos.id','=','student_register.student_info_id')
                ->join('modules', 'modules.id', '=', 'student_register.module')
                ->where('student_register.status',1)
                ->orderBy('student_register.type','asc')
                ->orderBy('student_infos.name_mm','asc')
                ->with('student_info')
                ->select('student_infos.name_mm','student_register.*', 'modules.name as module_name')
                ->get();
         if($type == 'all'){
            $title = $course->name_mm . "သင်တန်းကျောင်း<br>" . $batch->name_mm . "<br>မှတ်ပုံတင်ထားသူများစာရင်း";
        }else{
            $title = $type == 0 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br> မှတ်ပုံတင်ထားသူများ"
                        : ( $type == 1 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းတွင်တက်ရောက်မည့်မှတ်ပုံတင်ထားသူများ" 
                        : $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>မြန်မာနိုင်ငံစာရင်းကောင်စီတွင်တက်ရောက်မည့်မှတ်ပုံတင်ထားသူများစာရင်း");
        }

        if($type == 2){
            $filter = ['ရန်ကုန်သင်တန်းကျောင်း', 'နေပြည်တော်သင်တန်းကျောင်း'];
            $student_registers = $student_registers->groupBy(['module']);
        }else{
            // $filter = ['mac', 'self study', 'private school']; // 0 self, 1 private, 2 mac
            $filter = [];
            $student_registers = $student_registers->groupBy(['module']);
        }

        $data = [
            'title' => $title,
            'filter' => ['module one', 'module two', 'all module'], // 1 module one, 2 module two, 3 all module
            'batch' => $batch,
            'course' => $course,
            'student' => $student_registers,
        ];

        return view('reporting.registration_list',compact('data'));
    }

    public function daExamRegList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
            ->with('active_batch','course_type')
            ->first();

        $batch = Batch::where('id','=',$request->batch)->first();   
        $exam_departments = ExamDepartment::get();
        $modules = Module::get();

        return view('reporting.exam_list',compact('course','batch','exam_departments','modules'));
    }

    public function daPassList(Request $request)
    {
        $course = Course::where('id', '=', $request->course)
        ->with('active_batch','course_type')
        ->first();

        $batch = Batch::where('id','=',$request->batch)->first();   
        $exam_departments = ExamDepartment::get();
        $modules = Module::get();

 
 
        return view('reporting.exam_result_list',compact('course','batch','exam_departments','modules'));
    }

    public function attendEntryExamList(Request $request, $type)
    {
        
        if($request->course != '' && $request->batch != "" && $type != ""){

            $course = Course::where('id', '=', $request->course)
                ->with('active_batch','course_type')
                ->first();

            $batch = Batch::where('id','=',$request->batch)->first();
             $student_registers = StudentCourseReg::where('batch_id', $request->batch)
                ->when($type !== 'all', function($query) use($type){
                    $query->where('type', '=', $type);
                })
                ->join('student_infos','student_infos.id','=','student_course_regs.student_info_id')
                ->where('student_course_regs.approve_reject_status',1)
                ->where('student_course_regs.qt_entry',1)
                ->orderBy('student_course_regs.type','asc')
                ->orderBy('student_infos.name_mm','asc')
                ->with('student_info')
                ->select('student_infos.name_mm','student_course_regs.*')
                ->get();
               
            if($type == 'all'){
                $title = $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ဖြေဆိုခွင့်ရသူများစာရင်း";
            }else{
                $title = $type == 0 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ဝင်ခွင့်စာမေးပွဲအောင်မြင်သူများ ( ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ )"
                            : ( $type == 1 ? $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ဝင်ခွင့်စာမေးပွဲအောင်မြင်သူများ ( ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းများတွင် တက်ရောက်ခွင့်ရသူများ )" 
                                            : $course->name_mm . "သင်တန်း<br>" . $batch->name_mm . "<br>ဝင်ခွင့်စာမေးပွဲအောင်မြင်သူများ ( မြန်မာနိုင်ငံစာရင်းကောင်စီတွင်တက်ရောက်ခွင့်ရသူများ )");
            }

            if($type == 2){
                $filter = ['ရန်ကုန်သင်တန်းကျောင်း', 'နေပြည်တော်သင်တန်းကျောင်း'];
                $student_registers = $student_registers->groupBy(['type', 'mac_type']);
            }else{
                // $filter = ['mac', 'self study', 'private school']; // 0 self, 1 private, 2 mac
                $filter = [];
                $student_registers = $student_registers->groupBy(['type']);
            }
                
            $data = [
                'title' => $title,
                'filter' => $filter,
                'batch' => $batch,
                'course' => $course,
                'student' => $student_registers,
            ];

            /*return view('reporting.application_list',compact('batch','course','student_registers'));*/
            return view('reporting.entry_exam_list', compact('data'));
        }
    }


    public function entryExamsList(Request $request)
    {
    
        $course = Course::where('id', '=', $request->course)
            ->with('active_batch','course_type')
            ->first();

        $batch = Batch::where('id','=',$request->batch)->first();   
        $exam_departments = ExamDepartment::get();
        $modules = Module::get();
        return view('reporting.current_entry_exam_list',compact('course','batch','exam_departments','modules'));

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
