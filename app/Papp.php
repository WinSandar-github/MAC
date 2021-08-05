<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papp extends Model
{
    //
    protected $fillable = ['student_id','cpa','ra','foreign_degree','papp_date','use_firm','firm_name','firm_type',
    'firm_step','staff_firm_name','cpa_ff_recommendation','recommendation_183','not_fulltime_recommendation','work_in_myanmar_confession',
    'rule_confession','cpd_record','tax_free_recommendation','accepted_date','status','renew_file','renew_papp_reg','renew_micpa',
    'renew_cpd','renew_183_recomm','renew_not_fulltime_recomm','renew_rule_confession','renew_accepted_date','renew_status'];

    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_id','id');
    }

    public function student_job()
    {
        return $this->belongsTo(StudentJobHistroy::class,'student_id','id');
    }

    public function student_education_histroy()
    {
        return $this->belongsTo(EducationHistroy::class,'student_id','id');
    }

}
