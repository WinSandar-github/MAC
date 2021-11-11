<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject_name','course_id','module_id','sr_no'];
    
    public function module(){
        return $this->belongsTo(Module::class,'module_id','id');
    }
}
