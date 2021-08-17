<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = ['name','require_exam','course_id'];

    public function course(){
        return $this->belongsTo(Course::class);
    }

   
}
