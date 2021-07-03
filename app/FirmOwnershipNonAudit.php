<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirmOwnershipNonAudit extends Model
{
    protected $fillable = ['name','pass_csc_inco','accountancy_firm_info_id'];
}
