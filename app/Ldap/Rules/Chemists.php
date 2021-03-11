<?php

namespace App\Ldap\Rules;

use LdapRecord\Laravel\Auth\Rule;
use App\Group;

class Chemists extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->user->groups()->exists(
            Group::findOrFail('cn=Help Desk,ou=Groups,dc=local,dc=com')
        );
    }
}
