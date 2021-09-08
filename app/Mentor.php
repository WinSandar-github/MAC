<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = ['current_check_service_id','name_mm','name_eng','nrc_state_region','nrc_township','nrc_citizen','nrc_number'
                            ,'race','religion','father_name_mm','father_name_eng','education','ra_cpa_suceess_year','ra_cpa_personal_no',
                            'cpa_reg_no','cpa_reg_date','ppa_reg_no','ppa_reg_date','date'];
    
                            public function student_info(){
        return $this->hasOne(StudentInfo::class,'id','student_info_id')->with('student_job','student_education_histroy');
    }
}
