<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherRegister extends Model
{
    public function student_info(){
        return $this->belongsTo(StudentInfo::class,'id','teacher_id');
    }

    public function school(){
        return $this->hasOne(SchoolRegister::class,'id','school_id');
    }
    
}
