<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpaTwoRegistration extends Model
{
    //
    protected $fillable = ['cpa_one_pass_date','cpa_one_access_no','cpa_one_success_no','enrol_no_exam',
    'attendance','fail_exam','resigned','batch_session_no','entrance_part','entrance_exam_no','cpa_two_type'];

}
