<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','course_fee_id','degree_id'];

    public function course_fee(){
        return $this->belongsTo(CourseFee::class);
    }

    public function degree(){
        return $this->belongsTo(CourseFee::class);
    }

    public function batch(){
        return $this->hasMany(Batch::class);
    }
}
