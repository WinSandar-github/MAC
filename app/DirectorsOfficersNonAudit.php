<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectorsOfficersNonAudit extends Model
{
    protected $filable = ['name','position','passport','csc_no','accountancy_firm_info_id'];
}
