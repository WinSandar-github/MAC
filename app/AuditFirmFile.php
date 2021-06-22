<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditFirmFile extends Model
{
    protected $filable = ['accountancy_firm_info_id','ppa_certificate','representative','certi_or_reg','deeds_memo','certificate_incor','form6_form26_from_e','form_a1','tax_reg_certificate'];
}
