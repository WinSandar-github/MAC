<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForeignDegree extends Model
{
    protected $fillable = ['cpa_full_form_id','country','organization','year','month','seat_num'];
}
