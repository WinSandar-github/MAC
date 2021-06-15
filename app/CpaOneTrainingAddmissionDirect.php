<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaOneTrainingAddmissionDirect extends Model
{
    protected $fillable = ['photo','name','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name','birth_date','birth_date','address','contact_address','telephone','email','occupation',
            'position','organization','salary','ofice_address','civil_servant','degree','university','major','graduation_time','seat_no','diplo_second_pass_year','diplo_second_pass_month','diplo_second_pass_seat_no',
        'training_ground_id','acca','cima','acca_cima_pass_level','acca_cima_exam_year','aca_cima_exam_month','acc_cima_reg_no'];

public function training_ground(){
return $this->belongsTo(CpaOneTrainingGround::class); 
}      
}
