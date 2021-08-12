<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPAFF extends Model
{
    //
    protected $fillable = ['student_info_id','cpa','ra','foreign_degree','cpa_part_2','qt_pass','cpa_certificate','mpa_mem_card',
    'nrc_front','nrc_back','cpd_record','passport_image','accepted_date','renew_file','renew_micpa','renew_cpd','renew_cpaff_reg','renew_status','renew_accepted_date'];
    
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
