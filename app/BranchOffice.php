<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    protected $fillable = ['branch_name','township','postcode','city','state_region',
                            'phones','email','website','accountancy_firm_info_id'];
}
