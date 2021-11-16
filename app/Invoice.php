<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    
    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id')->with('student_job','student_education_histroy','student_register');
    
}
