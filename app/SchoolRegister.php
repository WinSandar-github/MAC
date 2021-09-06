<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRegister extends Model
{
    public function school_establishers()
    {
        return $this->hasMany(SchoolEstablishers::class,'school_id','id');
    }
    public function school_governs()
    {
        return $this->hasMany(SchoolGoverns::class,'school_id','id');
    }
    public function school_members()
    {
        return $this->hasMany(SchoolMembers::class,'school_id','id');
    }
    public function school_teachers()
    {
        return $this->hasMany(SchoolTeachers::class,'school_id','id');
    }
}
