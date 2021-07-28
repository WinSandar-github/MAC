<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = ['name_mm','name_eng','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name_mm','father_name_eng','race','religion',
    'date_of_birth','address','current_address','phone','gov_staff','image','registration_no','date','approve_reject_status','email','password'];

      
    public function student_job()
    {
        return $this->hasOne(StudentJobHistroy::class,'student_info_id','id');
    }

    public function student_education_histroy()
    {
        return $this->hasOne(EducationHistroy::class,'student_info_id','id');
    }

    public function student_course()
    {
        return $this->hasOne(StudentCourseReg::class,'student_info_id','id');
    }

    public function student_self_study()
    {
        return $this->hasOne(registration_self_study::class,'student_info_id','id');
    }

    public function student_private_school()
    {
        return $this->hasOne(registration_private_school::class,'student_info_id','id');
    }

    public function student_mac()
    {
        return $this->hasOne(registration_mac::class,'student_info_id','id');
    }

    public function student_register()
    {
        return $this->hasOne(StudentRegister::class,'student_info_id','id');
    }

    public function exam_register()
    {
        return $this->hasOne(ExamRegister::class,'student_info_id','id');
    }

    public function cpa_ff(){
        return $this->hasOne(CPAFF::class,'student_info_id','id');
    }
    public function papp(){
        return $this->hasOne(Papp::class,'student_id','id');
    }

    public function cpa_one_direct(){
        return $this->hasOne(CpaOneTrainingAddmissionDirect::class,'student_info_id','id');
        
    }
}  
