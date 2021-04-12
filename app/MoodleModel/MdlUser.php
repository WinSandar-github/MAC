<?php

namespace App\MoodleModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;

class MdlUser extends Authenticatable implements LdapAuthenticatable
{
    use Notifiable, AuthenticatesWithLdap;

    protected $table = 'mdl_user';

    public $timestamps = false;

    const CREATED_AT = "timecreated";

    const UPDATED_AT = "timemodified";

    protected $hidden = [
        'password'
    ];
}
