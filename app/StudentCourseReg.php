<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourseReg extends Model
{
   
    protected $fillable = ['student_info_id','type','batch_id','status','date','qt_entry'];
    
    public function batch(){
        return $this->belongsTo(Batch::class)->with('course');
    }

    public function student_info(){
        return $this->hasOne(StudentInfo::class,'id','student_info_id')->with('student_job','student_education_histroy');
    }



    

    
}
