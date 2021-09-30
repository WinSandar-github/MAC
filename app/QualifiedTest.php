<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualifiedTest extends Model
{
    public function studentinfo()
    {
        return $this->hasOne(StudentInfo::class,'id','student_info_id');
    }
}
