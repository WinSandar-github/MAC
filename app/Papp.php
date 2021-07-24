<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papp extends Model
{
    //
    protected $fillable = ['student_id','cpa','ra','foreign_degree','papp_date','use_firm','firm_name','firm_type',
    'firm_step','staff_firm_name','cpa_ff_recommendation','recommendation_183','not_fulltime_recommendation','work_in_myanmar_confession',
    'rule_confession','cpd_record','tax_free_recommendation'];

    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id');
    }

    public function student_job()
    {
        return $this->belongsTo(StudentJobHistroy::class,'student_info_id','id');
    }

    public function student_education_histroy()
    {
        return $this->belongsTo(EducationHistroy::class,'student_info_id','id');
    }

}
