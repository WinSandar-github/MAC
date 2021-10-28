<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = ['current_check_service_id','name_mm','name_eng','nrc_state_region','nrc_township','nrc_citizen','nrc_number'
                            ,'race','religion','father_name_mm','father_name_eng','education','ra_cpa_suceess_year','ra_cpa_personal_no',
                            'cpa_reg_no','cpa_reg_date','papp_reg_no','papp_reg_date','papp_attachment','attachment_file','date'];
    
                            public function student_info(){
        return $this->hasOne(StudentInfo::class,'id','student_info_id')->with('student_job','student_education_histroy');
    }

    public function nrcNumber(){
        return $this->nrc_state_region .'/'. $this->nrc_township .'('. $this->nrc_citizen .')'. $this->nrc_number;
    }

    public function serviceType(){
        $service_id = explode(',', $this->current_check_service_id);
        $arr = array();
        foreach($service_id as $id){
            $service_name = CurrentCheckService::where('id', $id)->first(['name']);
            array_push($arr, $service_name);
        }
        return $arr ;
    }

    public function papp(){

        return $this->hasOne(Mentor::class,'papp_reg_no','papp_reg_no');



    }

}
