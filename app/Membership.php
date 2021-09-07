<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = ['membership_name','requirement_id','descirption_id','form_fee','registration_fee','yearly_fee','renew_fee','late_fee'];

    public function requirements()
    {
        return $this->hasMany(Requirement::class,'id','requirement_id');

    }

    public function descriptions()
    {
        return $this->hasMany(Description::class,'id','description_id');

    }
}
