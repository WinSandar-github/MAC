<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprenticeAccountant extends Model
{
    protected $fillable = ['id','student_info_id','article_form_type','apprentice_exp','apprentice_exp_file','gov_staff','gov_position'
                            ,'gov_joining_date','request_papp','mentor_id','exam_pass_date','exam_pass_batch','ex_papp','exp_start_date','exp_end_date',
                            'accept_policy'];
    
    public function student_info(){
        return $this->hasOne(StudentInfo::class,'id','student_info_id')->with('student_job','student_education_histroy','student_register','qualified_test','leave_requests','invoice');
    }

    public function mentor(){
        return $this->hasOne(Mentor::class,'id','mentor_id')->with('papp');

    }

}
