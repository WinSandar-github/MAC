<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table = 'exam_result';

    protected $fillable = ['student_info_id','registeration_id','result','date'];

    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id');
    }

    public function exam_register(){
        return $this->belongsTo(ExamRegister::class,'registeration_id','id');
    }
}
