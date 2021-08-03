<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['name','from','to','course_id','moodle_course_id','publish_status','accept_application_start_date','accept_application_end_date','entrance_pass_start_date','entrance_pass_end_date'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
