<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave_request extends Model
{
    protected $fillable = ['id','student_info_id','form_type','start_date','end_date','total_leave','remark'];
}
