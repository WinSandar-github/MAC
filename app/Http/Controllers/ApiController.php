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

    public function generatePersonalNo($code)
    {
        
       
        $current_course = Course::where('code',$code)->with('active_batch','course_type')->first();
         $batch_id = $current_course->active_batch[0]->id;

        $student_registers = StudentRegister::where('form_type',$current_course->active_batch[0]->course->id)
        ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
        ->where('student_register.status',1)
        ->orderBy('student_infos.name_mm','asc')
        ->orderBy('student_register.type','asc')
        ->with('student_info')
        ->select('student_infos.name_mm','student_register.*')->get();
                        
        
        
        // $student_infos = StudentInfo::whereHas('student_course_regs', function ($query) use ($course) {
        //     $query->where('batch_id', $course->active_batch[0]->id);
        // })->with('student_course')->orderBy('name_mm','asc')->orderBy('->get();

        $count = 0;
        foreach($student_registers as $key => $student_register){
            // $stu_register = StudentRegister::where('id',$student_register->id)
            // ->where('form_type',$student_info->student_course->batch->course->id)
            // ->where('status',1)->first();

           
                $student_register->sr_no = ++$count;

                $student_register->save();
                
                $student_info = StudentInfo::where('id',$student_register->student_info_id)->first();
                if($current_course->course_type->course_code == "da"){

                    $student_info->personal_no = $batch_id.'('.$current_course->course_type->course_code.')/'.$student_register->sr_no;
                }else{
                    $student_info->cpersonal_no = $batch_id.'/'.$student_register->sr_no;
                } 
                $student_info->save();
              
            

        }
        return $student_register;
    }

    public function generateSrNo($code)
    {
        
        $course = Course::where('code',$code)->with('active_batch')->first();
        $student_registers = StudentRegister::where('form_type',$current_course->active_batch[0]->course->id)
        ->join('student_infos','student_infos.id','=','student_register.student_info_id')              
        ->where('student_register.status',1)
        ->orderBy('student_infos.name_mm','asc')
        ->orderBy('student_register.type','asc')
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
        
        $course = Course::where('code',$code)->with('active_batch')->first();
        
        
        
       
        $student_infos = StudentInfo::whereHas('student_course_regs', function ($query) use ($course) {
            $query->where('batch_id', $course->active_batch[0]->id);
        })->with('student_course')->orderBy('name_mm','asc')->get();
           
        $count = 0;
        foreach($student_infos as $key => $student_info){
           
            $exam_register = ExamRegister::where('student_info_id',$student_info->id)
                                    ->where('form_type',$course->active_batch[0]->id)
                                    ->where('status',1)
                                    ->where('exam_type_id','!=',3)
                                    ->first();

                if(!empty($exam_register)){
                    $exam_register->sr_no = ++$count;

                    $exam_register->save();
                
                }
            }
            
        
        return "Update Serial Number in Exam Registration form";
    }

    public function generateAppSrNo($code)
    {

        $course = Course::where('code',$code)->with('active_batch')->first();
        
        
        $student_infos = StudentInfo::whereHas('student_course_regs', function ($query) use ($course) {
            $query->where('batch_id', $course->active_batch[0]->id);
        })->with('student_course')->orderBy('name_mm','asc')->get();
        
       
        // $student_infos = StudentInfo::whereHas('student_course_regs', function ($query) use ($batch_id) {
        //     $query->where('batch_id', $batch_id);
        // })->with('student_course')->orderBy('name_mm','asc')->get();
        
        
        foreach($student_infos as $key => $student_info){
           
            $student_app = StudentCourseReg::where('student_info_id',$student_info->id)
                                    ->where('batch_id',$course->active_batch[0]->id)
                                    ->where('approve_reject_status',1)->first();
                if(!empty($student_app)){
                    $student_app->sr_no = ++$key;

                    $student_app->save();
                
                }
            }
            
        
        return "Update Serial Number in Application form";
    }

    

    
}
