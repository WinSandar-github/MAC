<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaOneRegistration extends Model
{
    //
    protected $fillable = ['private_school_name','academic_year','photo','name_mm','name_en','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name_mm','father_name_en','birth_date','education','position','department',//15
                            'race','religion','office_area','civil_servant','address','current_address','phone','email','direct_access_no','entry_success_no','gov_department','personal_acc_training','after_second_exam','good_morale_file','no_crime_file','module_id',//31
                        'enrol_no_exam','attendance','fail_exam','resigned','batch_session_no',
                    'entrance_part','entrance_exam_no','cpa_one_type'];

    public function module(){
        return $this->belongsTo(Module::class); 
    }
}
