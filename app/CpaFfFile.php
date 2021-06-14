<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaFfFile extends Model
{
    protected $fillable = ['cpa_full_form_id','cpa','mpa_member_card','nrc','cdp_record','passport_photo'];
}
