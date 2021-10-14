<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRegister extends Model
{
    public function school_establishers()
    {
        return $this->hasMany(SchoolEstablisher::class,'school_id','id');
    }
    public function school_governs()
    {
        return $this->hasMany(SchoolGovern::class,'school_id','id');
    }
    public function school_members()
    {
        return $this->hasMany(SchoolMember::class,'school_id','id');
    }
    public function school_teachers()
    {
        return $this->hasMany(SchoolTeacher::class,'school_id','id');
    }
    public function student_info(){
        return $this->belongsTo(StudentInfo::class,'id','school_id');
    }
    public function school_branch(){
        return $this->hasMany(tbl_branch_school::class,'school_id','id');
    }
    public function bulding_type(){
        return $this->hasMany(tbl_bulding_type::class,'school_id','id');
    }
    public function classroom(){
        return $this->hasMany(tbl_classroom::class,'school_id','id');
    }
    public function toilet_type(){
        return $this->hasMany(tbl_toilet_type::class,'school_id','id');
    }
    public function manage_room_numbers(){
        return $this->hasMany(tbl_manage_room_numbers::class,'school_id','id');
    }
    
}
