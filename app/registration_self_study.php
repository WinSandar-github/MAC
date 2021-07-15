<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registration_self_study extends Model
{
    public function student_info()
    {
        return $this->hasOne(StudentInfo::class,'id','student_info_id');
    }
}
