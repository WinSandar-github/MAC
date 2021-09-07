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
    
}
