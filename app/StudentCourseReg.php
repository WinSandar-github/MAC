<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourseReg extends Model
{
   
    protected $fillable = ['student_info_id','batch_id','status','date','qt_entry'];
    
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
