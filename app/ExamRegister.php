<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamRegister extends Model
{
    protected $table = 'exam_register';

    protected $fillable = ['student_info_id','date','invoice_date','private_school_id','private_school_name','grade','batch_id','is_full_module','exam_type_id','status'];

    public function course(){
        return $this->belongsTo(Course::class,'form_type','id');
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id');
    }
}
