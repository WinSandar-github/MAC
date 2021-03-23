<?php

namespace App;

use LdapRecord\Laravel\LdapImportable;
use LdapRecord\Laravel\ImportableFromLdap;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Group extends Authenticatable implements LdapImportable
{
    use ImportableFromLdap;

    protected $fillable = [
        'name', 'guid', 'domain'
    ];
}