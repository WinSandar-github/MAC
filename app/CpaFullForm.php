<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaFullForm extends Model
{
    protected $fillable = ['name','nrc_state_region','nrc_township','nrc_citizen','nrc_number','father_name',
    'education_level_id','cpa_no','address','phone','email','local_degree','foreign_degree'];

    
    public function edu_lvl()
    {
        return $this->belongsTo(EducationLevel::class,'education_level_id','id');
    }
    
    public function local_degree()
    {
        return $this->hasOne(LocalDegree::class,'cpa_full_form_id','id');
    }

    public function foreign_degree()
    {
        return $this->hasOne(ForeignDegree::class,'cpa_full_form_id','id');
    }

    public function cpa_ff_file()
    {
        return $this->hasOne(CpaFfFile::class,'cpa_full_form_id','id');
    }



}
