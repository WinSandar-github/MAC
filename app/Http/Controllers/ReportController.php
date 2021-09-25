<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\StudentInfo;
use App\StudentRegister;
use App\ExamRegister;



use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function showExamList(Request $request)
    {
         
        $current_course = Course::where('code',$request->code)->with('active_batch')->first();
      
        $student_infos = ExamRegister::where('form_type',$current_course->active_batch[0]->course->id)
                        ->join('student_infos', 'student_infos.id', '=', 'exam_register.student_info_id')
                        ->where('exam_type_id','!=',3)
                        ->where('status',1)
                        ->with('student_info')
                        ->orderBy('student_infos.name_mm','asc')->select('exam_register.*');

        $
        $request->grade && $student_infos =  $student_infos->Where('grade',$request->grade);
        $request->exam_type_id &&  $student_infos =  $student_infos->Where('exam_type_id',$request->exam_type_id);

         $student_infos =  $student_infos->get(); 
       
 
          return DataTables::of($student_infos)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->make(true);
         

    }

    public function showRegistrationList(Request $request)
    {
        
        $current_course = Course::where('code',$request->code)->with('active_batch')->first();
      
        
        $student_infos = StudentRegister::where('form_type',$current_course->active_batch[0]->course->id)
                        ->join('student_infos','student_infos.id','=','student_registers.student_info_id')
                        ->with('student_info')->where('status',1)
                        ->orderBy('student_infos.name_mm','asc')
                        ->orderBy('type','asc')->select('student_register.*')->get();

     
          return DataTables::of($student_infos)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->make(true);
         

    }
   
    public function attendAppList($code)  
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.application_list',compact('course'));
    }
    public function attendExamList($code)  
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.exam_list',compact('course'));
    }

    public function currentEntryExamList($code)  
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.current_entry_exam_list',compact('course'));
    }
    public function  examResultList($code)  
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.exam_result_list',compact('course'));
    }
}    
