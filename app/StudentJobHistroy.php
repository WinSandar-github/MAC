<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentJobHistroy extends Model
{
    protected $table = 'student_job_histroys';
    protected $fillable = ['student_info_id','name','position','department','organization','company_name','salary','office_address'];
}
