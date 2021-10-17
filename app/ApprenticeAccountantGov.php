<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprenticeAccountantGov extends Model
{
    protected $table = 'apprentice_accountants_gov';
    protected $fillable = ['id','student_info_id','labor_registration_no','father_job','father_address','married','married_name'
                            ,'married_job','home_address','current_address','address','tempory_address','permanent_address','labor_registration_attach',
                            'recommend_attach','police_attach','accept_policy'];
    
    public function student_info(){
        return $this->hasOne(StudentInfo::class,'id','student_info_id')->with('student_job','student_education_histroy','student_register','leave_requests');
    }
}
