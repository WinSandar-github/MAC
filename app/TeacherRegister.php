<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherRegister extends Model
{
    public function student_info(){
        return $this->belongsTo(StudentInfo::class,'id','teacher_id');
    }
    public function teacher_renew()
    {
        return $this->hasMany(teacher_renew::class,'teacher_id','id');
    }
}
