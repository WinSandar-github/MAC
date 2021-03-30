<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $guarded = [];
    public function training_classes(){
        return $this->hasOne(TrainingClass::class,'id','training_id');
    }
}
