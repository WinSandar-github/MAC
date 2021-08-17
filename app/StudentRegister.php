<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $table = 'student_register';

    protected $fillable = ['student_info_id','date','reg_reason','invoice_id','invoice_date','type','status'];

    public function student_info()
    {
        return $this->belongsTo(StudentInfo::class,'student_info_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'id');
    }
}
