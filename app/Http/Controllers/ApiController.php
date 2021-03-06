<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditFirmType;
use App\AuditStaffType;
use App\AuditTotalStaffType;
use App\TrainingGround;
use App\EducationLevel;
use App\LocalForeign;
use App\Module;
use App\NonAuditTotalStaffType;
use App\OrganizationStructure;
use App\TypeOfServiceProvided;
use App\StudentCourseReg;
use App\StudentRegister;
use App\ExamRegister;
use App\Course;
use App\StudentInfo;
use App\Http\Controllers\CustomClass\Helper;


class ApiController extends Controller
{
    public function audit_firm_type(){
        $audit_firm_type = AuditFirmType::get();
        return  response()->json([
            'data' => $audit_firm_type
        ],200);
    }

    public function audit_staff_type(){
        $audit_staff_type = AuditStaffType::get();
        return  response()->json([
            'data' => $audit_staff_type
        ],200);
    }

    public function audit_total_staff_type(){
        $audit__total_staff_type = AuditTotalStaffType::get();
        return  response()->json([
            'data' => $audit__total_staff_type
        ],200);
    }

    public function cpa_one_training_ground(){
        $training_ground = TrainingGround::get();
        return  response()->json([
            'data' => $training_ground
        ],200);
    }

    public function education_level(){
        $education_level = EducationLevel::get();
        return  response()->json([
            'data' => $education_level
        ],200);
    }

    public function local_foreign(){
        $local_foreign = LocalForeign::get();
        return  response()->json([
            'data' => $local_foreign
        ],200);
    }

    public function module(){
        $module = Module::get();
        return  response()->json([
            'data' => $module
        ],200);
    }

    public function non_audit_total_staff(){
         $non_audit_total_staff = NonAuditTotalStaffType::get();
        return  response()->json([
            'data' => $non_audit_total_staff
        ],200);
    }

    public function organization_structure(){
        $organization_structure = OrganizationStructure::get();
        return  response()->json([
            'data' => $organization_structure
        ],200);
    }

    public function type_service_provided(){
        $type_service_provided = TypeOfServiceProvided::get();
        return  response()->json([
            'data' => $type_service_provided
        ],200);
    }

    //update register sr no and personal number
    public function generatePersonalNo($code,$type)
    {

        $helper = new Helper;
      
       
        $current_course = Course::where('code',$code)->with('active_batch','course_type')->first();
         
        $batch_number = $current_course->active_batch[0]->number;

        if($current_course->course_type->course_code == "da" ){

            $last_personal_no = StudentRegister::where('batch_id',$current_course->active_batch[0]->id)
                            ->join('student_infos','student_infos.id','=','student_register.student_info_id')
                            ->where('student_infos.personal_no','!=',NULL)
                            ->orderByRaw('LENGTH(student_infos.personal_no) desc')->orderby('student_infos.personal_no','desc')
                            ->select('student_infos.personal_no')->first();
                            
            $sr_no = $last_personal_no  ?  substr($last_personal_no->personal_no, strpos($last_personal_no->personal_no, "/") + 1)
                                        : 0; 
         
                            
        }else{

            $last_personal_no = StudentRegister::where('batch_id',$current_course->active_batch[0]->id)
                                ->join('student_infos','student_infos.id','=','student_register.student_info_id')
                                ->where('student_infos.cpersonal_no','!=',NULL)
                                ->orderByRaw('LENGTH(student_infos.cpersonal_no) desc')->orderBy('student_infos.cpersonal_no','desc')
                                ->select('student_infos.cpersonal_no')->first();
                               
                                
            $sr_no = $last_personal_no   ? substr($last_personal_no->cpersonal_no, strpos($last_personal_no->cpersonal_no, "/") + 1) 
                                                : 0 ;
                                
                }
            $student_registers = StudentRegister::where('batch_id',$current_course->active_batch[0]->id)
            ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
            ->where('student_register.status',1)
            ->orderBy('student_register.type','desc')
            ->orderBy('student_infos.name_mm','asc')
            ->with('student_info','course')
            ->select('student_infos.name_mm','student_register.*');  
        
        $student_registers =  $type == 2 ? $student_registers->where('type',$type)->get() : $student_registers->where('type', '!=' , 2)->get();
        

        
        foreach($student_registers as $key => $student_register){
            
              
                
                $student_register->sr_no = ++$key;

                $student_register->save();
                
                $student_info = StudentInfo::where('id',$student_register->student_info_id)->first();

          
                    
                if($current_course->course_type->course_code == "da" ){
                     if($student_info->personal_no == null )
                     {
                         
                        ++$sr_no;
                      $student_info->personal_no = $batch_number.'(D)/'.$sr_no;
                    }
                    }else{
                        if($student_info->cpersonal_no == null){
                        ++$sr_no;
                        $student_info->cpersonal_no = $batch_number.'/'.$sr_no;
                    }
                } 
                $student_info->save();
                    
                    
                    
                    
            }
        return $student_registers;
    }

    public function generateSrNo($code)
    {
        
        $current_course = Course::where('code',$code)->with('active_batch')->first();
        $student_registers = StudentRegister::where('batch_id',$current_course->active_batch[0]->id)
        ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
        ->where('student_register.status',1)
        ->orderBy('student_register.type','desc')
        ->orderBy('student_infos.name_mm','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','student_register.*')->get();
        $count = 0;
        foreach($student_registers as $key => $student_register){
            // $stu_register = StudentRegister::where('id',$student_register->id)
            // ->where('form_type',$student_info->student_course->batch->course->id)
            // ->where('status',1)->first();

           
                $student_register->sr_no = ++$count;

                $student_register->save();
                
                

        }
                        
       
        return "Update Serial Number";
    }

    public function generateExamSrNo($code)
    {
      
        $current_course = Course::where('code',$code)->with('active_batch')->first();

        $exam_registers = ExamRegister::where('batch_id',$current_course->active_batch[0]->id)
        ->join('student_infos','student_infos.id','=','exam_register.student_info_id')              
        ->where('exam_register.status',1)
        ->where('exam_type_id','!=',3);
        
      
       
        $exam_registers = $current_course->course_type->course_code == "da" 
        ? $exam_registers->orderByRaw('LENGTH(student_infos.personal_no)','ASC')->orderBy('student_infos.personal_no','ASC')
        : $exam_registers->orderByRaw('LENGTH(student_infos.cpersonal_no)','ASC')->orderBy('student_infos.cpersonal_no','ASC');
        
        $exam_registers = $exam_registers->with('student_info','course')->select('exam_register.*')->get();
       
       
        
        foreach($exam_registers as $key => $exam_register){
                $exam_register->sr_no = ++$key;

                $exam_register->save();
            
            }
            
        
        return "Update Serial Number in Exam Registration form";
    }

    //generate Application Sr No
    public function generateAppSrNo($code)
    {

        $current_course = Course::where('code',$code)->with('active_batch')->first();
        
      
        // $student_infos = StudentInfo::whereHas('student_course_regs', function ($query) use ($course) {
        //     $query->where('batch_id', $course->active_batch[0]->id);
        // })->with('student_course')->select('name_mm')->orderBy('name_mm','asc')->get();

        $student_apps = StudentCourseReg::where('batch_id',$current_course->active_batch[0]->id)
        ->where('student_course_regs.approve_reject_status',1)
        ->where('student_course_regs.qt_entry',0)
        ->join('student_infos','student_infos.id','=','student_course_regs.student_info_id')              
        ->orderBy('student_course_regs.type','desc')
        ->orderBy('student_infos.name_mm','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','student_course_regs.*')
        ->get();
      
            
        foreach($student_apps as $key => $student_app){
           
           
                    $student_app->sr_no = ++$key;

                    $student_app->save();
                
                
            }
            
        
        return "Update Serial Number in Application form";
    }

    public function generateEntranceExamSrNo($batch)
    {
        // return $batch;
        // $course = Course::where('code',$code)->with('active_batch')->first();
         
        $student_infos = ExamRegister::where('batch_id',$batch)
        ->where('exam_register.status',1)
        ->where('exam_register.exam_type_id','=',3)
        ->join('student_infos','student_infos.id','=','exam_register.student_info_id')              
        ->orderBy('student_infos.name_mm','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','exam_register.*')
        ->get();

       

        $count = 0;
        foreach($student_infos as $key => $student_info){
            
                    $student_info->sr_no = ++$count;
                    $student_info->save();
            }
            
        
        return "Update Serial Number in Entrance Exam  form";
    }

      public function generateExamResult($code)
    {
        $course = Course::where('code', $code)->with('active_batch')->first();
        // return $course->active_batch[0]->id;
         $student_infos = ExamRegister::with('student_info', 'course')
            ->where('batch_id', $course->active_batch[0]->id)
            ->where('status', 1)
            ->where('grade',1)
            ->orderBy('is_full_module', 'desc')
            ->orderby('total_mark', 'desc')
            ->whereNotNull('sr_no')
            // ->select('total_mark','is_full_module','passed_level')
            ->get();
        // return $student_infos;
        foreach($student_infos  as $key => $student_info)
        {
             

            $student_info->passed_level = ++$key;
 
            $student_info->passed_date = date('d-M-Y');
            $student_info->save();

        }
     
        return "Update Grade";
    }

    

    
}
