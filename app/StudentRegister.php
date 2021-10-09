<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $table = 'student_register';

    protected $fillable = ['student_info_id','date','reg_reason','invoice_id','invoice_date','type','batch_no','part_no','personal_no','status'];

    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id')->with('student_job','student_education_histroy','student_course_regs');
    }

     

    public function course()
    {
        return $this->belongsTo(Course::class,'form_type','id');
    }
}
