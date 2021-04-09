<?php

namespace App\MoodleModel;

use Illuminate\Database\Eloquent\Model;

class MdlUser extends Model
{
    protected $table = 'mdl_user';

    public $timestamps = false;

    const CREATED_AT = "timecreated";

    const UPDATED_AT = "timemodified";

    protected $hidden = [
        'password'
    ];

    protected $nullable = [

    ];
}
