<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaOneRegSelfLearner extends Model
{
    protected $fillable = ['academic_year','photo','name_mm','name_en','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name_mm','father_name_en','race_religion','birth_date','education','position','department',
    'office_area','civil_servant','address','contact_address','phone','email','direct_access','direct_access_no','enrol_no_exam','entrance_success_no','attendance','fail_exam','resigned','batch_session_no','module_id'];

    public function module(){
        return $this->belongsTo(Module::class); 
    }     
}
