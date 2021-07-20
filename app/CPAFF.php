<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPAFF extends Model
{
    //
    protected $fillable = ['student_info_id','cpa','ra','foreign_degree','cpa_part_2','qt_pass','cpa_certificate','mpa_mem_card',
    'nrc_front','nrc_back','cpd_record','passport_image'];

}
