<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationHistroy extends Model
{
    protected $table = 'education_histroys';
    protected $fillable = ['student_info_id','university_name','degree_id','degree_name','certificate','qualified_date','roll_number'];

    public function degree()
    {
        return $this->hasOne(Degree::class,'id','degree_id');
    }
}
