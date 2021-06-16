<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaTwoExamReg extends Model
{
    protected $fillable = ['exam_center','photo','name_mm','name_en','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name_mm','father_name_en','birth_date','personal_no','birth_date','phone','email',
    'account_council','private_training','self_learner','private_training_name','last_exam_no','last_exam_time','last_exam_module_one','last_exam_module_two','moudle_id'];

    public function module(){
        return $this->belongsTo(Module::class); 
    }  
}
