<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaFullForm extends Model
{
    protected $fillable = ['student_info_id','cpa','ra','foreign_degree','cpa_part_2','qt_pass','cpa_certificate','mpa_mem_card',
    'nrc_front','nrc_back','cpd_record','passport_image'];

    
    // public function edu_lvl()
    // {
    //     return $this->belongsTo(EducationLevel::class,'education_level_id','id');
    // }
    
    // public function local_degree()
    // {
    //     return $this->hasOne(LocalDegree::class,'cpa_full_form_id','id');
    // }

    // public function foreign_degree()
    // {
    //     return $this->hasOne(ForeignDegree::class,'cpa_full_form_id','id');
    // }

    // public function cpa_ff_file()
    // {
    //     return $this->hasOne(CpaFfFile::class,'cpa_full_form_id','id');
    // }



}
