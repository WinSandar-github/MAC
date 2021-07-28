<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table = 'exam_result';

    protected $fillable = ['student_info_id','registeration_id','subject_name','mark','grade','date'];
}
