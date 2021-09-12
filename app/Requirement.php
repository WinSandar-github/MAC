<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = ['requirement_name','require_exam','requirement_id'];
    public function course(){
        return $this->hasMany(Course::class);
    }
      
}