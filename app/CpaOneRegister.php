<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaOneRegister extends Model
{
    protected $fillable = ['academic_year','photo','name_mm','name_en','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name_mm','father_name_en','birth_date','education','position','department',
                            'race_religion','office_area','civil_servant','address','phone','email','direct_access_no','entry_success_no','gov_department','personal_acc_training','after_second_exam','good_morale_file','no_crime_file','module_id'];

    public function module(){
        return $this->belongsTo(Module::class); 
    }                        
}
