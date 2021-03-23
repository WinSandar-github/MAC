<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $guarded = [];

    public function job_region(){
        return $this->belongsTo(Region::class , 'current_job_region' , 'id');
    }

    public function training_class(){
        return $this->belongsTo(TrainingClass::class , 'training_class_id' , 'id');
    }

    public function educations(){
        return $this->hasMany(Education::class , 'user_profile_id' , 'id');
    }

    public function stepbystep_positions(){
        return $this->hasMany(StepbyStepPosition::class , 'user_profile_id' , 'id');
    }
    
    public function central_staffes(){
        return $this->hasMany(CentralStaff::class , 'user_profile_id' , 'id');
    }
    
    public function pension_officers(){
        return $this->hasMany(PensionOfficer::class , 'user_profile_id' , 'id');
    }
    
    public function foreign_conditions(){
        return $this->hasMany(ForeignCondition::class , 'user_profile_id' , 'id');
    }
    
    // public function login_admin_account(){
    //     return $this->hasOne(User::class , 'id' , 'login_admin');
    // }
}
