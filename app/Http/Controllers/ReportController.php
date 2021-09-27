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

    // public function showRegistrationList(Request $request)
    // {
        
    //     $current_course = Course::where('code',$request->code)->with('active_batch')->first();
        
    //     $student_infos = StudentRegister::where('form_type',$current_course->active_batch[0]->course->id)
    //                     ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
    //                     ->where('student_register.status',1)
    //                     ->orderBy('student_infos.name_mm','asc')
    //                     ->orderBy('student_register.type','asc')
    //                     ->with('student_info')
    //                     ->select('student_infos.name_mm','student_register.*')->get();
                                        
    //     // $student_infos  = $student_infos->select('type')->get();
    //       return DataTables::of($student_infos)
    //             ->addColumn('nrc', function ($infos){
    //                 $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
    //                 return $nrc_result;
    //             })
    //             ->make(true);
         

    // }
   
    public function attendAppList($code)  
    {
        $course = Course::where('code',$code)->with('active_batch','course_type')->first();
        $student_registers = StudentRegister::where('form_type',$course->active_batch[0]->course->id)
        ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
        ->where('student_register.status',1)
        ->orderBy('student_infos.name_mm','asc')
        ->orderBy('student_register.type','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','student_register.*')->get();
        
       
        return view('reporting.application_list',compact('course','student_registers'));
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

    public function cpa_ff_report1()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report1');
    }

    public function cpa_ff_report2()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report2');
    }
    
    public function cpa_ff_report3()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report3');
    }

    public function cpa_ff_report4()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report4');
    }

    public function cpa_ff_report5()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report5');
    }

    public function cpa_ff_report6()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report6');
    }

    public function cpa_ff_report7()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report7');
    }

    public function cpa_ff_report8()  
    {
        return view('reporting.cpa_ff_papp.cpa_ff_report8');
    }

    public function audit_firm_report1()  
    {
        return view('reporting.firm_name.audit_firm_report1');
    }

    public function audit_firm_report2()  
    {
        return view('reporting.firm_name.audit_firm_report2');
    }
    
    public function audit_firm_report3()  
    {
        return view('reporting.firm_name.audit_firm_report3');
    }

    public function audit_firm_report4()  
    {
        return view('reporting.firm_name.audit_firm_report4');
    }

    public function audit_firm_report5()  
    {
        return view('reporting.firm_name.audit_firm_report5');
    }

    public function naudit_firm_report1()  
    {
        return view('reporting.firm_name.naudit_firm_report1');
    }

    public function naudit_firm_report2()  
    {
        return view('reporting.firm_name.naudit_firm_report2');
    }
    
    public function naudit_firm_report3()  
    {
        return view('reporting.firm_name.naudit_firm_report3');
    }

    public function naudit_firm_report4()  
    {
        return view('reporting.firm_name.naudit_firm_report4');
    }

    public function naudit_firm_report5()  
    {
        return view('reporting.firm_name.naudit_firm_report5');
    }

    public function naudit_firm_report6()  
    {
        return view('reporting.firm_name.naudit_firm_report6');
    }

    public function cpa_report1()  
    {
        return view('reporting.cpa.cpa_report1');
    }

    public function cpa_report2()  
    {
        return view('reporting.cpa.cpa_report2');
    }

    public function cpa_report3()  
    {
        return view('reporting.cpa.cpa_report3');
    }

    public function cpa_report4()  
    {
        return view('reporting.cpa.cpa_report4');
    }

    public function cpa_report5()  
    {
        return view('reporting.cpa.cpa_report5');
    }

    public function cpa_report6()  
    {
        return view('reporting.cpa.cpa_report6');
    }

    public function cpa_report7()  
    {
        return view('reporting.cpa.cpa_report7');
    }

    public function cpa_report8()  
    {
        return view('reporting.cpa.cpa_report8');
    }

    public function cpa_report9()  
    {
        return view('reporting.cpa.cpa_report9');
    }

    public function cpa_report10()  
    {
        return view('reporting.cpa.cpa_report10');
    }

    public function firm_article_report1()  
    {
        return view('reporting.article.firm_article_report1');
    }

    public function firm_article_report2()  
    {
        return view('reporting.article.firm_article_report2');
    }

    public function firm_article_report3()  
    {
        return view('reporting.article.firm_article_report3');
    }

    public function firm_article_report4()  
    {
        return view('reporting.article.firm_article_report4');
    }


    public function firm_article_report5()  
    {
        return view('reporting.article.firm_article_report5');
    }

    public function gov_article_report1()  
    {
        return view('reporting.article.gov_article_report1');
    }

    public function gov_article_report2()  
    {
        return view('reporting.article.gov_article_report2');
    }

    public function gov_article_report3()  
    {
        return view('reporting.article.gov_article_report3');
    }

    public function gov_article_report4()  
    {
        return view('reporting.article.gov_article_report4');
    }

    public function gov_article_report5()  
    {
        return view('reporting.article.gov_article_report5');
    }

    public function mentor_report1()  
    {
        return view('reporting.mentor.mentor_report1');
    }
    
    public function mentor_report2()  
    {
        return view('reporting.mentor.mentor_report2');
    }
    
    public function mentor_report3()  
    {
        return view('reporting.mentor.mentor_report3');
    }

    public function mentor_report4()  
    {
        return view('reporting.mentor.mentor_report4');
    }

    public function mentor_report5()  
    {
        return view('reporting.mentor.mentor_report5');
    }

    public function mentor_report6()  
    {
        return view('reporting.mentor.mentor_report6');
    }

    public function s_t_report1()  
    {
        return view('reporting.school_teacher.s_t_report1');
    }

    public function s_t_report2()  
    {
        return view('reporting.school_teacher.s_t_report2');
    }

    public function s_t_report3()  
    {
        return view('reporting.school_teacher.s_t_report3');
    }
    
    public function da_report1()  
    {
        return view('reporting.da.da_report3');
    }

    public function da_report2()  
    {
        return view('reporting.da.da_report2');
    }

    public function da_report3()  
    {
        return view('reporting.da.da_report3');
    }

    public function da_report4()  
    {
        return view('reporting.da.da_report4');
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

    public function qualified_report1()  
    {
        return view('reporting.cpa.qualified_report1');
    }

    public function qualified_report2()  
    {
        return view('reporting.cpa.qualified_report2');
    }
}    
