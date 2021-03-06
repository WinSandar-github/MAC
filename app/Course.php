<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'form_fee', 'registration_fee', 'exam_fee', 'tution_fee', 'registration_start_date', 'registartion_end_date', 'description', 'course_type_id', 'code', 'requirement_id'];

    public function course_type()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function requirement()
    {
        return $this->hasMany(Requirement::class, 'id', 'requirement_id');
    }

    public function degree()
    {
        return $this->belongsTo(CourseFee::class);
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function active_batch()
    {
        $date = Date('Y-m-d');
        return $this->hasMany(Batch::class)->whereDate('acdm_year_start_date', '<=', $date)
            ->whereDate('acdm_year_end_date', '>=', $date)->with('course');
    }

     
 
}
