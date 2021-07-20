<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    protected $table = 'student_register';

    protected $fillable = ['student_info_id','date','reg_reason','invoice_id','invoice_date','type','status'];
}
