<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','form_fee','registration_fee','exam_fee','tution_fee','registration_start_date','registartion_end_date','description','course_type_id','code'];

    public function course_type(){
        return $this->belongsTo(CourseType::class);
    }


    public function degree(){
        return $this->belongsTo(CourseFee::class);
    }
    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function active_batch(){
        $date = Date('Y-m-d');
       return  $this->hasMany(Batch::class)->whereDate('accept_application_start_date','<=',$date)
                        ->whereDate('accept_application_end_date','>=',$date);
       
      
        

    }
}
