<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\StudentInfo;
use App\StudentRegister;
use App\ExamRegister;
use App\Module;
use App\ExamDepartment;
use Illuminate\Support\Str;
use LdapRecord\Query\Events\Read;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {

        $courses = Course::all();
        $batches = Batch::all();
        // return $courses;
        return view('pages.reporting_list', compact('batches', 'courses'));
    }

    public function showExamList(Request $request)
    {
         
        $batch = Batch::where('id',$request->batch_id)->with('course')->first();

        $student_infos = ExamRegister::where('batch_id',$request->batch_id)
                        ->join('student_infos', 'student_infos.id', '=', 'exam_register.student_info_id')
                        ->where('exam_type_id','!=',3)
                        ->where('status',1) 
                        ->orderBy('is_full_module','asc')
                        ->with('student_info')->select('exam_register.*');

                     
        if($request->grade != 1)
        {
            $student_infos = $batch->course->course_type->course_code == "da" 
            ? $student_infos->orderByRaw('LENGTH(student_infos.personal_no)','ASC')->orderBy('student_infos.personal_no','ASC')
            : $student_infos->orderByRaw('LENGTH(student_infos.cpersonal_no)','ASC')->orderBy('student_infos.cpersonal_no','ASC');
        }
        else{
            
            $student_infos = $student_infos->orderby('total_mark', 'asc')->where('grade',$request->grade);
        }

        if($request->module)
        { 
            $student_infos = $student_infos->where('is_full_module',$request->module);
        }else if($request->pass_module){
            $student_infos = $student_infos->where('pass_module',$request->pass_module);

        }



  
        if($request->exam_department)
        {
            
            $student_infos = $student_infos->where('exam_department',$request->exam_department);
        }

        
        
        $request->exam_type_id &&  $student_infos =  $student_infos->Where('exam_type_id',$request->exam_type_id);

        $student_infos =  $student_infos->get();
 
          return DataTables::of($student_infos)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('cpersonal_no', function ($infos){
                    $cpersonal_no = $infos->course->course_type->course_code == "da" 
                    ? $infos->student_info->personal_no
                    : $infos->student_info->cpersonal_no;
                    return $cpersonal_no;
                })
                ->addColumn('module', function ($infos) {
                    if ($infos->is_full_module == 1) {
                        return "Module 1";
                    } else if ($infos->is_full_module == 2) {
                        return "Module 2";
                    } else if ($infos->is_full_module == 3){
                        return "All Module";
                    }else {
                        return "-";
                    }
                })
                
                ->addColumn('pass_module', function ($infos) {
                    if ($infos->pass_module == 1) {
                        return "Module 1";
                    } else if ($infos->pass_module == 2) {
                        return "Module 2";
                    } else if ($infos->pass_module == 3){
                        return "All Module";
                    }else {
                        return "-";
                    }
                })
                ->addColumn('age', function ($infos) {
                    return Carbon::parse($infos->student_info->date_of_birth)->age;
                })
                ->addColumn('gender', function ($infos) {
                    return  $infos->student_info->gender == "Male" ? 'ကျား' : 'မ';
                })
                ->addColumn('gov_staff', function ($infos) {
                    return  $infos->student_info->gov_staff == 1 ? 'ဟုတ်' : 'မဟုတ်';
                })
                ->addColumn('remark', function ($infos) {
                    $type = $infos->student_info->student_register[0]->type;
                    switch($type){
                        case 0:
                            return "self";
                            break;
                        case 1:
                            return "private";
                        break;
                        case 2:
                           return "mac";
                        break;
                    }
            
            
                    // return  $infos->student_info->gov_staff == 1 ? 'ဟုတ်' : 'မဟုတ်';
                })
                ->rawColumns(['action','nrc','cpersonal_no','module','course_name','age','gender','gov_staff','remark','pass_module'])
                ->make(true);


    }

    //show reporting page ဝင်ခွင့်ရသူများစာရင်း
    public function showEntranceExamList(Request $request)
    {

        $current_course = Course::where('code',$request->code)->with('active_batch')->first();

        $student_infos = ExamRegister::where('batch_id',$current_course->active_batch[0]->id)
                        ->join('student_infos', 'student_infos.id', '=', 'exam_register.student_info_id')
                        ->where('exam_type_id','=',3)
                        ->where('status',1)
                        ->with('student_info')
                        ->orderBy('student_infos.name_mm','asc')->select('exam_register.*');
 
        if($request->batch)
        {  
            $student_infos = $student_infos->where('batch_id',$request->batch);
        }


        $request->grade && $student_infos =  $student_infos->Where('grade',$request->grade);
        $request->exam_type_id &&  $student_infos =  $student_infos->Where('exam_type_id',$request->exam_type_id);

         $student_infos =  $student_infos->get();


          return DataTables::of($student_infos)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
            })
                ->addColumn('status', function ($infos) {
                    if ($infos->status == 0) {
                        return "PENDING";
                    } else if ($infos->status == 1) {
                        return "APPROVED";
                    } else {
                        return "REJECTED";
                    }
                })
                ->addColumn('course_name', function ($infos) {
                    if ($infos->course->code == 'da_1') {
                        return "ဒီပလိုမာစာရင်းကိုင် (ပထမပိုင်း)";
                    }else if ($infos->course->code == 'da_2') {
                        return "ဒီပလိုမာစာရင်းကိုင် (ဒုတိယပိုင်း)";
                    }else if ($infos->course->code == 'cpa_1') {
                        return "လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း)";
                    }else{
                         return "လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ဒုတိယပိုင်း)";
                    }
                })
                ->addColumn('age', function ($infos) {
                    return Carbon::parse($infos->student_info->date_of_birth)->age;
                })
                ->addColumn('gender', function ($infos) {
                    return  $infos->student_info->gender == 1 ? 'ကျား' : 'မ';
                })
                ->addColumn('gov_staff', function ($infos) {
                    return  $infos->student_info->gov_staff == 1 ? 'ဟုတ်' : 'မဟုတ်';
                })
               
                ->rawColumns(['action','nrc','course_name','age','gender','gov_staff'])
                ->make(true);
    }

    
    public function showRegistrationList(Request $request)
    {
        
        $current_course = Course::where('code',$request->code)->with('active_batch')->first();
        
        $student_infos = StudentRegister::where('batch_id',$current_course->active_batch[0]->course->id)
                        ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
                        ->where('student_register.status',1)
                        ->orderBy('student_register.type','desc')
                        ->orderBy('student_infos.name_mm','asc')
                        ->with('student_info','course')
                        ->select('student_infos.name_mm','student_register.*');

         if($request->module)
        {
            
            $student_infos = $student_infos->where('student_register.module',$request->module);
        }

        if($request->student_type !== 'select_type')
        {
        
            $student_infos = $student_infos->where('student_register.type',$request->student_type);
        }                
                                        
        $student_infos  = $student_infos->get();
          return DataTables::of($student_infos)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('cpersonal_no', function ($infos){
                    $cpersonal_no = $infos->course->course_type->course_code == "da" 
                    ? $infos->student_info->personal_no
                    : $infos->student_info->cpersonal_no;
                    return $cpersonal_no;
                })
                ->make(true);
         

    }
   
    public function attendAppList($code)  
    {
        $course = Course::where('code',$code)->with('active_batch','course_type')->first();
        $modules = Module::get();
        // $student_registers = StudentRegister::where('batch_id',$course->active_batch[0]->id)
        // ->join('student_infos','student_infos.id','=','student_register.student_info_id')
        // ->where('student_register.status',1)
        // ->orderBy('student_register.type','desc')
        // ->orderBy('student_infos.name_mm','asc')
        // ->with('student_info')
        // ->select('student_infos.name_mm','student_register.*')->get();
        
        
        return view('reporting.application_list',compact('course','modules'));
    }

    public function attendExamList($code)
    {
        $course = Course::where('code',$code)->first();
        $modules = Module::get();
        $exam_departments = ExamDepartment::get();

        return view('reporting.exam_list',compact('course','modules','exam_departments'));
    }

    public function currentEntryExamList($code)
    {
        $course = Course::where('code',$code)->with('batches')->first();
       
        
        return view('reporting.current_entry_exam_list',compact('course'));
    }

    public function  examResultList($code)
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.exam_result_list',compact('course'));
    }

    public function  publishesEntranceExamResult($code)
    {
        $course = Course::where('code',$code)->first();
        return view('reporting.publishes_entrance_exam_result',compact('course'));
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

    public function qualified_report1()
    {
        return view('reporting.cpa.qualified_report1');
    }

    public function qualified_report2()
    {
        return view('reporting.cpa.qualified_report2');
    }
}
