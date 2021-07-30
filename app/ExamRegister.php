<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamRegister extends Model
{
    protected $table = 'exam_register';

    protected $fillable = ['student_info_id','date','invoice_image','invoice_date','private_school_name','grade','batch_id','is_full_module','exam_type_id','status'];

    public function course(){
        return $this->belongsTo(Course::class,'exam_type_id','id');
    }
}
